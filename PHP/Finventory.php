<?php
session_start();
include "../connect.php";



	echo	$barcode = mysql_real_escape_string($_POST['bar_code']);
	echo		$pro_name = mysql_real_escape_string($_POST['pro_name']);
	echo	 $category = mysql_real_escape_string($_POST['pro_cat']);

	echo	 $unit = mysql_real_escape_string($_POST['unit_measure']);
		echo $critical = mysql_real_escape_string($_POST['critical']);
		echo $supplierName = mysql_real_escape_string($_POST['supplier_name']);

		 echo $selling_price = mysql_real_escape_string($_POST['selling_price']);
?>
