<?php
	session_start();
	include ("../connect.php");


if (isset($_GET['id'])) {
		echo $id = mysql_real_escape_string($_GET['id']);

		$edit = "UPDATE customer set 	customerflag='1' WHERE membership_number = '{$id}'";
		$quer = mysql_query($edit)or die(mysql_error($con));

	
		header("location: ../customer.php?msg=del");
		}
?>
