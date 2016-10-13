<?php
	session_start();
	include ("../connect.php");


	if (isset($_POST['submit'])) {
		$supplier_name = mysql_real_escape_string($_POST['supname']);
		$email=mysql_real_escape_string($_POST['email']);
		$supplier_address = mysql_real_escape_string($_POST['address']);
		$supplier_contact1 = mysql_real_escape_string($_POST['contact']);
		$contact_person = mysql_real_escape_string($_POST['conperson']);
		$date = date('m/d/Y H:i');



		$inserting = mysql_query("INSERT INTO supliers (`supplier_name`, `supplier_address`, `supplier_contact`,  `contact_person`,`email`,`date`) VALUES ('".$supplier_name."', '".$supplier_address."',  '".$supplier_contact1."', '".$contact_person."', '".$email."', '".$date."')") or die(mysql_error());
			 header('location:../supplier.php?msg=added');
		}
?>
