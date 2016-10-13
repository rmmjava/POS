<?php
	session_start();
	include ("../connect.php");


echo "tea";
if (isset($_GET['id'])) {
$id = mysql_real_escape_string($_GET['id']);

		$edit = "DELETE FROM supliers  WHERE supplier_id = {$id} ";
		$quer = mysql_query($edit)or die(mysql_error($con));
		echo $testid;
		header("location: ../supplier.php?msg=del");
		}
?>
