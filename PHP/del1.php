<?php
session_start();
$position = $_SESSION['acc_type'];
include "../connect.php";
$sql1 = "DELETE FROM ztblpresales WHERE salesID={$_GET['id']}";
$ss1 = mysql_query($sql1);

if($position = 'cashier'){

 header("Location:../salesCashier.php");

}else{
	 header("Location:../sales.php");
	}
?>
