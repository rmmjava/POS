<?php
	session_start();
	include ("../connect.php");


if (isset($_GET['id'])) {
		echo $id = mysql_real_escape_string($_GET['id']);

		$edit = "UPDATE staff set 	staffflag='1' WHERE Staff_ID = '{$id}'";
		$quer = mysql_query($edit)or die(mysql_error($con));

	
		header("location: ../staff.php?msg=del");
		}
?>
