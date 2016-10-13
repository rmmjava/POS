<?php
session_start();
include "../connect.php";
$ctr = $_POST['bilang'];

for($i=1;$i<=$ctr;$i++){
	$qt = $_POST['stockN'.$i];
	$pid = $_POST['pid'.$i];
	if($qt<0){
		$qt=0;
	}
	$sql1 = "UPDATE product_tbl SET Quantity=Quantity+{$qt} WHERE Serial_number='{$pid}'";
	echo $ss1 = mysql_query($sql1);
}
	 header("Location:../addStock.php?q=OK");
?>
