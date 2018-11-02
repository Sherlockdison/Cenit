<?php
	require_once 'config.php';

	// Classes
	require_once 'classes/RegisterFormValidator.php';
	require_once 'classes/LoginFormValidator.php';
	require_once 'classes/SaveImage.php';
	require_once 'classes/User.php';
	require_once 'classes/DBJson.php';
	require_once 'classes/DBMysql.php';
	require_once 'classes/Auth.php';
	require_once 'classes/connection.php';

	$db = new DBMysql('data/cenitsite.sql');
	$auth = new Auth();
