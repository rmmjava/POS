<?php
	session_start();
	include ("connect.php");


	if (isset($_POST['submit'])) {
		$ayd = mysql_real_escape_string($_POST['EmpID']);
		$first = mysql_real_escape_string($_POST['fname']);
		$last = mysql_real_escape_string($_POST['lname']);
		$contact = mysql_real_escape_string($_POST['contact']);
		$address = mysql_real_escape_string($_POST['address']);



		$inserting = mysql_query("INSERT INTO staff (`Staff_ID`, `FName`, `LName`,  `Contact`,'Address') VALUES ('".$ayd."', '".$first."',  '".$last."', '".$contact."', '".$address."')");
			 header('location:../staff.php');
		}
?>
