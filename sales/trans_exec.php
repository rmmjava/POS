<?php
session_start();

$position=$_SESSION['acc_type'];


include('../include/connect.php');
$getRes = mysql_query("SELECT * FROM ztbltrans") or die(mysql_error());
			while ($row = mysql_fetch_assoc($getRes)) {
			 $curCode=$row['inicode'];
			}

				if($curCode>999){
					$nextCoder= 0;
					$upcode = mysql_query("UPDATE ztbltrans SET inicode = '".$nextCoder."'") or die(mysql_error());
					$curCode++;
				}
  				else
				{
					$curCode++;
				}
				$upcode = mysql_query("UPDATE ztbltrans SET inicode = '".$curCode."'") or die(mysql_error());

				$fgh='000'.$curCode;
				$finalcode=date("Y-m-$fgh").'-RO';
				//echo $fgh;
				$_SESSION['transcode']=$finalcode;

if(isset($_GET['oldtrans'])){
	if($position=='admin') {
		header("location: ../sales.php?chg={$_GET['chg']}&oldtrans={$_GET['oldtrans']}");
	}else{
	
	header("location: ../salesCashier.php?chg={$_GET['chg']}&oldtrans={$_GET['oldtrans']}");
}

}else{
	if($position=='cashier') {
		header("location: ../salesCashier.php?chg={$_GET['chg']}&oldtrans={$_GET['oldtrans']}");
	}else{

	header("location: ../sales.php");
}
}

			//

?>

