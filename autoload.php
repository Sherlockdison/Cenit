<?php
	require_once 'config.php';

	// Classes
	require_once 'classes/RegisterFormValidator.php';
	require_once 'classes/LoginFormValidator.php';
	require_once 'classes/SaveImage.php';
	require_once 'classes/User.php';
	require_once 'classes/DBJson.php';
	require_once 'classes/Auth.php';

	$db = new DBJson('data/users.json');
	$auth = new Auth();
