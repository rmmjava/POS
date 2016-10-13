
<?php
session_start();
include('../include/connect.php');
$getRes = mysql_query("SELECT * FROM ztblstaff") or die(mysql_error());
			while ($row = mysql_fetch_assoc($getRes)) {
			 $curCode=$row['inicode'];
			}

				if($curCode>999){
					$nextCoder= 0;
					$upcode = mysql_query("UPDATE ztblstaff SET inicode = '".$nextCoder."'") or die(mysql_error());
					$curCode++;
				}
  				else
				{
					$curCode++;
				}
				$upcode = mysql_query("UPDATE ztblstaff SET inicode = '".$curCode."'") or die(mysql_error());

				$fgh='0'.$curCode;
				$finalcode='MB'.date("Y-$fgh");
		
				$_SESSION['staffayd']=$finalcode;


	if(isset($_GET['oldayd'])){
	header("location: ../staff.php?&oldayd={$_GET['oldayd']}");
}else{	
	header("location: ../staff.php");
}

		
			//

?>