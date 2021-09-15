<?php

	$dsn = 'mysql:host=mastercode17924133.ipagemysql.com;dbname=france123';
	$user = 'france123123';
	$pass = 'France@123';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);
	try {
		$con = new PDO($dsn, $user, $pass, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}