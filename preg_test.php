<?php
$html = "int1)(0";

preg_match_all("/\((\d+)\)/", $html, $matches, PREG_SET_ORDER);
var_dump($matches);
?>
