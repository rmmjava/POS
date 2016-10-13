<?php
	session_start();
	include ("../connect.php");


echo "tea";
if (isset($_POST['testayd'])) {
$testid = mysql_real_escape_string($_POST['testayd']);
		$supplier_name = mysql_real_escape_string($_POST['supname']);
		$supplier_address = mysql_real_escape_string($_POST['address']);
		//$supplier_contact1 = mysql_real_escape_string($_POST['contact']);
		$contact_person = mysql_real_escape_string($_POST['conperson']);
		$contact_no = mysql_real_escape_string($_POST['contactno']);
		$email = mysql_real_escape_string($_POST['email']);
		//$number = mysql_real_escape_string($_POST['supplier_id']);

		$edit = "UPDATE supliers SET supplier_name = '".$supplier_name."', contact_person ='".$contact_person."', supplier_contact='".$contact_no."',supplier_address='".$supplier_address."',Email='".$email."' WHERE supplier_id = '".$testid."' ";
		$quer = mysql_query($edit)or die(mysql_error($con));
		echo $testid;
		header("location: ../supplier.php?msg=updated");
		}
?>
