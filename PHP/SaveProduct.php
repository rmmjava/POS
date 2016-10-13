<?php
	session_start();
	include ("inlcude/connect.php");



	$dateformat = date("m/d/Y");

	if (isset($_POST['submit'])) {
		$barcode = mysql_real_escape_string($_POST['bar_code']);
		$pro_name = mysql_real_escape_string($_POST['pro_name']);
		$category = mysql_real_escape_string($_POST['pro_categ']);
		$quantity = mysql_real_escape_string($_POST['pro_quantity']);
		$unit = mysql_real_escape_string($_POST['unit_measure']);
		$supplierName = mysql_real_escape_string($_POST['supplier_name']);
		$arrival_dates = mysql_real_escape_string($_POST['arrival_date']);
		$selling_price = mysql_real_escape_string($_POST['selling_price']);


		$inserting = mysql_query("INSERT INTO product_tbl (`Serial_number`, `Product_Name`, `Category`,  `Quantity`,`UM`,`Supplier`,`Arival_Date`,`selling_price` ) VALUES ('".$barcode."', '".$pro_name."',  '".$category."', '".$quantity."', '".$unit."', '".$supplierName."', '".$arrival_dates."', '".$selling_price."' )");
			 header('location:../inventory.php');
		}
?>
