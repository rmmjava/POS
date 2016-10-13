<?php
	session_start();
	include ("../connect.php");


	if (isset($_POST['submit'])) {
		$cat = mysql_real_escape_string($_POST['cat']);
		



		$inserting = mysql_query("INSERT INTO category_tbl (`Category`) VALUES ('".$cat."')") or die(mysql_error());
			 header('location:../manageCat.php');
		}
?>
