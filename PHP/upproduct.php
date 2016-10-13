<?php
	session_start();
	include ("../connect.php");




		$supplier_name = mysql_real_escape_string($_POST['supname']);
		$supplier_address = mysql_real_escape_string($_POST['address']);

		$contact_person = mysql_real_escape_string($_POST['conperson']);
		$contact_no = mysql_real_escape_string($_POST['contactno']);
		$email = mysql_real_escape_string($_POST['email']);
		

		$edit = "UPDATE supliers SET supplier_name = '".$supplier_name."', contact_person ='".$contact_person."', supplier_contact='".$contact_no."',supplier_address='".$supplier_address."',Email='".$email."' WHERE supplier_id = '".$testid."' ";
		$quer = mysql_query($edit)or die(mysql_error($con));
		echo $testid;
		header("location: ../supplier.php");
		}
