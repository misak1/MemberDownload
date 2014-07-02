<?php
// ユーザーがログイン中である場合、ログアウト処理を実行
if ($myAuth->checkAuth()){
    $myAuth->logout();
}
?>
