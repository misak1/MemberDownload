<?php
require_once('/usr/share/pear/Auth/Container/PDO.php');
require_once('Auth.php');

// ログインフォームを生成するための関数
function loginFunc($usr, $status)
{
//	session_destroy(); // ログインフォームを呼び出す前にセッション情報をクリアする
	require_once('LoginForm.php');
}
// ログアウト時に呼び出されるコールバック関数
function logouted($usr, $auth)
{
//	session_destroy(); // ログアウト時にセッション情報をクリアする
	header('Location: http://' . $_SERVER['HTTP_HOST']);
}
// ログイン成功時に実行される関数
function loginSucceeded($usr, $auth)
{
//	session_start(); // セッションをスタートする
//	$_SESSION['userid'] = $usr; // ユーザIDをセッション変数に格納する
	printf("<strong>ユーザID「%s」でログインに成功しました</strong>", $usr);
}
// ログイン失敗時に実行される関数
function loginFailed($usr, $auth)
{
	if ( $auth->getStatus() == AUTH_WRONG_LOGIN )
	{
		$err = "ユーザ名／パスワードが間違っています。";
	}
	else
	{
		$err = "不明なエラーが発生しました。";
	}
	printf("<strong>%s</strong>", $err);
}
// データベースストレージを利用するためのパラメータを定義
$params = array(
    'dsn' => 'mysql:dbname=pdo_test;host=localhost',
	'db_user' => 'root',
	'db_password' => 'iwimagica',
	'table' => 'test',
	'usernamecol' => 'user_name',
	'passwordcol' => 'user_passwd'
);

$auth_container = new Auth_Container_PDO($params);
var_dump(auth_container);
$auth_obj = new Auth($auth_container);
echo "b";


// Authクラスをインスタンス化
//$myAuth = new Auth('MDB2', $params, 'loginFunc');
/*echo "aa";
$myAuth = new Auth('PDO', $params, 'loginFunc');
echo "bb";

// ログイン成功時のコールバック関数を設定
$myAuth->setLoginCallback('loginSucceeded');
// ログイン失敗時のコールバック関数を設定
$myAuth->setFailedLoginCallback('loginFailed');
// ログアウト時に呼び出すコールバック関数を設定
$myAuth->setLogoutCallback('logouted');
// フォーム認証を実行
$myAuth->start();
// カレントユーザが未認証の場合、以降の処理を中断
if ( !$myAuth->checkAuth() )
{
	exit();
}
*/
?>
