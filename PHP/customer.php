<?php
	session_start();
	include ("../connect.php");


	if (isset($_POST['submit'])) {
		$supplier_name = mysql_real_escape_string($_POST['bar_code']);
		$supplier_address = mysql_real_escape_string($_POST['pro_name']);
		$supplier_contact = mysql_real_escape_string($_POST['pro_categ']);
		$contact_person = mysql_real_escape_string($_POST['pro_quantity']);
		$note = mysql_real_escape_string($_POST['unit_measure']);


		$inserting = mysql_query("INSERT INTO supliers (`supplier_name`, `supplier_address`, `supplier_contact`,  `contact_person`,`note`) VALUES ('".$barcode."', '".$pro_name."',  '".$category."', '".$quantity."', '".$unit."', '".$supplierName."', '".$arrival_dates."', '".$selling_price."' )");
			 header('location:../inventory.php');
		}
?>
