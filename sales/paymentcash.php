<?php
session_start();
$con = mysql_connect("localhost","root");
		if(!$con) {die("could not connect");}
		mysql_select_db("mimbo_db",$con);

$trend = $_POST['amtender'];
$totsales =$_POST['totAmtdaw'];
$trans=$_POST['trans'];
$position = $_SESSION['acc_type'];




if($trend >= $totsales){


$barya=$trend-$totsales;

$sql2 = ("SELECT *, SUM(prodQty) AS Qty FROM ztblpresales WHERE transID='{$trans}' GROUP BY prodCode") or die(mysql_error());
$ss2 = mysql_query($sql2);
$totAmt=0;
$tblcon="";
$totItem=0;
while($row2=mysql_fetch_array($ss2)){

	$getRes = mysql_query("SELECT * FROM product_tbl WHERE Serial_number='{$row2['prodCode']}'") or die(mysql_error());

	if(mysql_num_rows($getRes)>0){
	$row=mysql_fetch_array($getRes);
	$otQty =$row['Quantity'];
}
echo $otQty."1<br>";
$otQty-=$row2['Qty'];
echo $otQty;
$totItem+=$row2['Qty'];
echo $row2['Qty'];
	$sql3 = ("UPDATE product_tbl SET 	Quantity=".$otQty." WHERE Serial_number='{$row2['prodCode']}'") or die(mysql_error());
echo $sql3;
$ss3 = mysql_query($sql3) or die(mysql_error());
}
$sql2 = mysql_query("UPDATE ztblpresales SET saleFlag=1 WHERE transID='{$trans}'") or die(mysql_error());
	$ss2 = mysql_query($sql3) or die(mysql_error());
//`transID`, `client`, `saleAmount`, `Tendered`, `Discount`, `chAmt`, `VAT`, `totalItems`, `transType`, `transDate`, `transBy`
$sql="INSERT INTO ztbltransactions VALUES
('{$trans}','','{$totsales}','{$trend}','','{$barya}','','{$totItem}','',Now(),'')";
	$ss = mysql_query($sql) or die(mysql_error());

	header("Location:trans_exec.php?chg={$barya}&oldtrans={$trans}");
}else{
echo "re11";

if ($position = "cashier"){
			header("Location:../salesCashier.php?stat=insufficientfund");

}else{
		header("Location:../sales.php?stat=insufficientfund");
	}
}
?>
