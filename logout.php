<?php
define("PASSWORD", "pass");
if (isset($_POST['logout'])) {
	// セッション変数を全て解除する
	$_SESSION = array();
	// セッションを切断するにはセッションクッキーも削除する。
	// Note: セッション情報だけでなくセッションを破壊する。
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', 0, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		if ($_POST['logout'] === 'user_change') {
			// ログアウト クッキーデータ空
			setcookie("TEST_COOKIE", '', 0);
		}
	}
	//セッションを破壊してリダイレクト
	session_destroy();
	header("Location:login.php");
}
?>