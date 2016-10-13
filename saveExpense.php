<?php
	session_start();
	include ("../connect.php");


	if (isset($_POST['submit'])) {
		$date = date('m/d/Y H:i');
		$staff = mysql_real_escape_string($_POST['staff']);
		$deposit_charge = mysql_real_escape_string($_POST['deposit_charge']);
		$office_supply = mysql_real_escape_string($_POST['office_supply']);
		$travel_allowance = mysql_real_escape_string($_POST['travel_allowance']);
		$purchases = mysql_real_escape_string($_POST['purchases']);
		$deposit = mysql_real_escape_string($_POST['deposit']);
		$permits = mysql_real_escape_string($_POST['permits']);
		



		$inserting = mysql_query("INSERT INTO supliers (`date`,`staff`, `deposit_charge`, `office_supply`, `travel_allowance`, `purchases`, `deposit`, `permits`) VALUES ('".$date."', '".$staff."',  '".$deposit_charge."', '".$office_supply."', '".$travel_allowance."', '".$purchases."', '".$deposit."', '".$permits."')") or die(mysql_error());
			 header('location:../expense.php');
		}
?>