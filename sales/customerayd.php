
<?php
session_start();
include('../include/connect.php');
$getRes = mysql_query("SELECT * FROM ztblcustomer") or die(mysql_error());
			while ($row = mysql_fetch_assoc($getRes)) {
			 $curCode=$row['inicode'];
			}

				if($curCode>999){
					$nextCoder= 0;
					$upcode = mysql_query("UPDATE ztblcustomer SET inicode = '".$nextCoder."'") or die(mysql_error());
					$curCode++;
				}
  				else
				{
					$curCode++;
				}
				$upcode = mysql_query("UPDATE ztblcustomer SET inicode = '".$curCode."'") or die(mysql_error());

				$fgh='00'.$curCode;
				$finalcode='CUS'.date("Y-$fgh");
		
				$_SESSION['customerayd']=$finalcode;


	if(isset($_GET['custayd'])){
	header("location: ../customer.php?&custayd={$_GET['custayd']}");
}else{	
	header("location: ../customer.php");
}

		
			//

?>