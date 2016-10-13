<?php
session_start();
	require 'connect.php';
	require 'function.php';

	if (isset($_POST['submit'])) {
		$name = mysql_real_escape_string(trim($_POST['name']));
		$username = mysql_real_escape_string(trim($_POST['username']));
		$password = mysql_real_escape_string(trim($_POST['password']));

		if ($name == "" || strlen($name) < 2  && $username == "" || strlen($username) < 2 && $password == "" || strlen($password) < 2) {
			$_SESSION['status']['register']['error'][] = 'Please check if characters are less than 2 characters or blank.';
			header('location: ../index.php');
		}else if (name_exist($name) || username_exist($username)) {
			$_SESSION['status']['register']['error'][] = 'Username or Name already exist';
			header('location: ../index.php');
		}else{
			$hashed = encryptIt($password);
			register($name, $username , $hashed);
			$_SESSION['status']['register']['success'][] = 'Registered';
			header('location: ../index.php');
		}

	}	

?>