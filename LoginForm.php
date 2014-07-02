<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML lang="ja">
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="Content-Script-Type" content="text/javascript">
<META http-equiv="Content-Style-Type" content="text/css">
<LINK rel="stylesheet" href="./design.css" type="text/css">
<TITLE>ログインページ</TITLE>
</HEAD>
<BODY lang="ja">

<h3>ユーザ専用ページ　ログイン画面</h3>

<form method="POST" action="<?php print(htmlspecialchars($_SERVER['PHP_SELF'])) ?>">
<table border="0">
	<tr>
	<th align="right">ユーザーID :</th>
	<td><input type="text" name="username" size="15" maxlength="20" /></td>
	</tr>
	<tr>
	<th align="right">パスワード :</th>
	<td><input type="password" name="password" size="15" maxlength="20" /></td>
	</tr>
	<tr>
	<td colspan="2"><input type="submit" value="ログイン" /></td>
	</tr>
</table>
<font color="red"><?php print($err) ?></font>
</form>

</BODY>
</HTML>
