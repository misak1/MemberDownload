<?php

$dsn = 'mysql:dbname=pdo_test;host=localhost';
$user = 'root';
$password = 'iwimagica';
try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = 'select no, user_name, user_passwd, regist_date from user where user_name like ?';
    $stmt = $pdo->prepare($sql);
    $bool = $stmt->execute(array('%t%'));
//    $bool = $stmt->execute(array('%tt%'));
	// 実行確認
	var_dump($bool);
	$result = $stmt->fetchAll();
	$c = count($result);
	echo $c."count";
	echo "<pre>";
	print_r($result);
	echo "</pre>";
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

