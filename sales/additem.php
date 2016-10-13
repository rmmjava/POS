<?php
session_start();
$con = mysql_connect("localhost","root");
		if(!$con) {die("could not connect");}
		mysql_select_db("mimbo_db",$con);

$bar = $_POST['barcode'];
 $qty=$_POST['qty'];
$getRes = mysql_query("SELECT * FROM product_tbl WHERE Serial_number='{$bar}'") or die(mysql_error());

if(mysql_num_rows($getRes)>0){
	$row=mysql_fetch_array($getRes);
	$tots =$qty*$row['selling_price'];
	$prod=mysql_real_escape_string($row['Product_Name']);
echo	$otQty =$row['Quantity'];
if($otQty==0 ){
	header("Location:../sales.php?stat=OutofStack");
}else if($otQty<$qty){
	header("Location:../sales.php?stat=lack");
}else{
	$getRes2 = mysql_query("SELECT * FROM ztblpresales WHERE transID='{$_SESSION['transcode']}' and prodCode='{$bar}'") or die(mysql_error());
	if(mysql_num_rows($getRes2)>0){
		$row=mysql_fetch_array($getRes2);
		$sID =$row['salesID'];
	echo	$tQty =$row['prodQty'];
		$tots =$qty*$row['sellAmount'];
		$ss=$qty+$tQty;
		if($otQty==$tQty){
			echo "tae";
				header("Location:../sales.php?stat=OutofStack");
		}else if($otQty<$ss){
			header("Location:../sales.php?stat=lack");
		}else{
		$sql1 = "UPDATE ztblpresales SET prodQty=prodQty+{$qty},subTot=subTot+{$tots} WHERE salesID='{$sID}'";
	}
	}else{
		$sql1 = "INSERT INTO  ztblpresales VALUES ('','{$_SESSION['transcode']}','{$bar}','{$prod}',
		'{$qty}','{$row['selling_price']}','{$tots}','',Now(),'','','','')";
	}


	 mysql_query($sql1) or die(mysql_error());
	header("Location:../sales.php");
 }

}else{

	header("Location:../sales.php?stat=NotFound");
}
//


?>
