<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>none</title>
<link rel="stylesheet" href="style.css" />
<meta name="generator" content="http://switchtohtml5.com">
</head>
<body>
<form method="post" action="">
<?php 
require_once('find.php');
//echo implode("<br/>", explode("\n", SystemCommand::find_extensions()));
$aryExtensions = explode("\n", SystemCommand::find_extensions());
$aryExtensions = array_filter($aryExtensions);
foreach($aryExtensions AS $v){
  echo '<p><label><input type="checkbox" value="'.$v.'"/>'.$v.'</label></p>'."\n";
}
?>
</form>
</body>
</html>
