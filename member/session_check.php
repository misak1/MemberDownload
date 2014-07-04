<?php
define("PASSWORD", "pass");
$message = "hello";

session_start();

if (isset($_COOKIE["TEST_COOKIE"]) && $_COOKIE["TEST_COOKIE"] != "") {

	$_SESSION["TEST"] = $_COOKIE["TEST_COOKIE"];
}

if (isset($_SESSION["TEST"]) && $_SESSION["TEST"] != null && sha1(PASSWORD) === $_SESSION["TEST"]) {
	$message = "Login success";
} else {
	session_destroy();
	//セッション破棄
	header("Location:../login.php");
}
