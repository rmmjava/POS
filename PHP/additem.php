<?php
session_start();
include "../connect.php";
echo $_POST['pd1'];
echo $_POST['qtt1'];

$sql1 = "INSERT INTO  sales_tbl VALUES ('',(Select transaction_id from sales_order ),'".$_POST['pd1']."',(Select product_name from product_tbl where Product_ID='".$_POST['pd1']."'),'".$_POST['qtt1']."',(Select selling_price from product_tbl where Product_ID='".$_POST['pd1']."'),((Select selling_price from product_tbl where Product_ID='".$_POST['pd1']."')*".$_POST['qtt1']."),Now(),'11','0')";
//$ss1 = mysql_query($sql1);
echo mysql_query($sql1);
	 header("Location:../sales.php");
?>