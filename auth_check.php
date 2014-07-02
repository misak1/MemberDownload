<?php
//echo "hogehoge<br/>";
$d_path = dirname($_SERVER['SCRIPT_FILENAME']);
$f_name =basename($_SERVER['SCRIPT_FILENAME']);

header('Content-type: image/jpeg');
readfile($d_path.'/'.$f_name);
//echo ($d_path.'/'.$f_name);

exit(0);


