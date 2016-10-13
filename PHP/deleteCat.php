

<?php
session_start();
include "../connect.php";
$id = $_GET['$delete'];

$sql1 = "DELETE FROM categoy_tbl WHERE catid=$id";
$ss1 = mysql_query($sql1) or die(mysql_error());
	 header('location:../manageCat.php');
?>
