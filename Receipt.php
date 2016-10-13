<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$_GET['trans']?></title>
<link rel="stylesheet" href="print.css" type="text/css" media="print">
<script type='text/javascript'>

	$(document).ready(function() {
   $("body").keydown(function(event) {
    var link = "#inline";

      if(event.keyCode == 67) link += 1;

      if(link != "#inline") $(link).trigger("click");
	  /*if(event.preventDefault) {
            event.preventDefault();
        } */
        //return false;

   });
});



			function ClosesMe(){parent.jQuery.fancybox.close(parent.location.reload(true)); }


</script>

</head>

<body  onload='window.print()'>

<div id="catchers">


<div id="tops">
<div align="center">
  <span id="buss"><B>Mimbo Bytes Gen. Merchandizing</B></span></div>
<div align="center"><span id="details">Lucero St., San Fernando City, La Union</span></div>
<div align="center"><span id="details">ROMMEL S. TUAZON -- Prop.</span></div>
<div align="center"><span id="details">Non Vat Reg. TIN: 928-026-471-000</span></div>



</div>

<div align="center" id="holder">
<table width="400" border=0  cellpadding="1" cellspacing="1" id="printerPOS">

<?php

				include "connect.php";   /////////DATABASE



		//////////////END OF COPY///////////////////

						/*$q=20;
						$s=86400;
						$r=$q*$s;*/
						$timestamp=time(); //current timestamp
						/*$tm=$timestamp+$r; // Will add 2 days to the $timestamp*/
						$da=date("m/d/Y", $timestamp);
						/*
						echo "Current time string: $da <br>";
						$da1=date("F j, Y", $tm);
						echo "Modified time: $da1 <br>";*/


					if(isset($_GET['trans']))

					{
						$transcode = ($_GET['trans']);
						date_default_timezone_set("Asia/Hong_Kong");
						$today = date('M d, Y');
						$timer = date('h:i A');
				?>
                		 <tr>

							        <td colspan="5" align="left" style="font-size: 10pt;">
                            			<h4>&nbsp; <?=$transcode?></h4>
                            			<h4>&nbsp; <?=($today)?>&nbsp;&nbsp;&nbsp;<?=($timer)?>&nbsp;&nbsp;&nbsp;</h4>
                            		</td>

                                    <!----------END OF COPY----------------------------->
                            </tr>

                <?php

					$queryrec = "SELECT DISTINCT prodDesc FROM ztblpresales WHERE transID = '".$transcode."' ORDER BY salesID";
					$exegetrec = mysql_query($queryrec,$con);

					if(mysql_num_rows($exegetrec)>0)
					{

					while($rowget = mysql_fetch_array($exegetrec))
					{
					$field1 = mysql_real_escape_string($rowget['prodDesc']);
					?>

                    <tr>
						<td align="left" colspan="3" id="descr"><?=$field1?>1</td>
					</tr>

                    <tr>

						<td align="center" colspan="2" id="product"><?php $Qtycount = "SELECT SUM(prodQty) AS sumQty FROM ztblpresales  WHERE prodDesc='$field1' AND transID = '$transcode'";
								$execount = mysql_query($Qtycount,$con) or die(mysql_error($con));
								$setCount = mysql_fetch_array($execount);


									echo" ".$setCount['sumQty']." "; ?>
                         </td>
						<td align="left" id="namer" colspan="2">@<?php $peritem = "SELECT sellAmount AS perItem FROM ztblpresales WHERE prodDesc='".$field1."' AND transID = '$transcode'";
								$exeitem = mysql_query($peritem,$con) or die(mysql_error($con));
								$setperItem = mysql_fetch_array($exeitem);
								echo" ".$setperItem['perItem'].""; ?>
                                </td>
						<td width="20" align="left" id="product"><?php $Qtycount = "SELECT SUM(subTot) AS sale FROM ztblpresales WHERE prodDesc='".$field1."' AND transID = '$transcode'";
								$execount = mysql_query($Qtycount,$con) or die(mysql_error($con));
								$setCount = mysql_fetch_array($execount);


									echo" ".$setCount['sale'].""; ?>
                                    </td>

					</tr>




					<?php


					}




}
?>
						<?php

						$qtransact = "SELECT * FROM ztbltransactions WHERE transID = '".$transcode."'";
						$exeTRANS = mysql_query($qtransact,$con) or die(mysql_error());
						$getTrans = mysql_fetch_array($exeTRANS);
						$totalAmt = $getTrans['saleAmount'];
						//$VAT = $totalAmt * 0.12;

						//////////COPY FROM THIS POINT/////////////////

						?>
						 	<tr>
									<td colspan="4" align="left" id="namer">Cash: &nbsp;&nbsp;</td><td align="left" colspan="1" id="price"> <?php echo $getTrans['Tendered'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
									<td colspan="4" align="left" id="namer">Change: &nbsp;&nbsp; </td><td align="left" colspan="1" id="price"><?php echo"(".$getTrans['chAmt'].")"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                            		<td colspan="5" align="left" id="product">&nbsp;</td>
                            </tr>
                            <tr>
                            		<td colspan="4" align="left" id="namer">Total Invoice: &nbsp;&nbsp;</td><td align="left" colspan="1" id="price"> <?php echo $totalAmt; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                            		<td colspan="5" align="left" id="product">&nbsp;</td>
                            </tr>

                            <?php

							$discshow = $getTrans['Discount'];
							if($discshow == 0)
							{
							echo '';

							}

							else{
							?>

                            <tr>
									<td colspan="4" align="left" id="namer">Discount: &nbsp;&nbsp; </td>
                                    <td align="left" colspan="1" id="price">
									<?php echo $getTrans['Discount'] ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>


                            <?php }
							?>


                            <tr>
									<td colspan="5" align="left" id="product">&nbsp;
                                    </td>
                            </tr>

                            <tr>
									<td colspan="4" align="left" id="namer">Total Sale &nbsp;&nbsp; </td>
                                    <td align="left" colspan="1" id="price">
									<?php
									$net = $totalAmt - $getTrans['VAT'];

									echo $net; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                            </tr>
                            <tr>
									<td colspan="4" align="left" id="namer">VAT &nbsp;&nbsp; </td>
                                    <td align="left" colspan="1" id="price">
									<?php echo $getTrans['VAT'] ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                            </tr>
                            <tr>
									<td colspan="4" align="left" id="namer">Amount Due &nbsp;&nbsp; </td>
                                    <td align="left" colspan="1" id="price">
									<?php echo $totalAmt; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                            </tr>
														<tr>
									<td colspan="5" align="center" id="namer">
											<img height="100%" alt="TESTING" src="barcode.php?codetype=Code128&size=40&text=<?=$transcode?>" />
                                    </td>
                            </tr>




<?php
					}

?>
<input type="button" hidden="hidden" id="inline1" tabindex="4" accesskey="c" onclick="ClosesMe();" value="" />

</table>
</div>
</div>

</body>
</html>
