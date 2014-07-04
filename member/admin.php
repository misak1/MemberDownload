<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>Admin</title>
	</head>
	<body>
		<h1>Admin</h1>
		<?php
		if ($message != "") {
			print "<p class=\"message\">" . $message . "</p>\n";
		}
	?>
	<form action="../logout.php" method="post">
	<p>
		<button type="submit" name="logout" value="session_logout">
			logout
		</button>
		<button type="submit" name="logout" value="user_change">
			user change?
		</button>
	</p>
</form>
	</body>
</html>