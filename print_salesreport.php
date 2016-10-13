
<?php
    include('include/function.php');
    $dataitem = new Itemdata();

?>
<title>MIMBO BYTES</title>
<link rel="shortcut icon" href="img/logo-icon.ico">

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<body  onload='window.print()'>
<div align="center">
  <span id="buss"><h2><B>Mimbo Bytes Gen. Merchandizing</B></h2></span></div>
<div align="center"><span id="details">Lucero St., San Fernando City, La Union (ROMMEL S. TUAZON -- Prop.)</span></div>
        <div id="page-wrapper">
<center><h3><b>Sales Report</b></h3></center>
            <div class="container-fluid">

                <!-- Page Heading -->

                <!-- /.row -->



                 <div class="row">
                    <div class="col-lg-12">
                        <div class="reports table-responsive">

                          <?php
                        if(isset($_GET['datefrom'])){
                          ?>
                          Transaction DATE: (<?=$_GET['datefrom']?> TO <?=$_GET['dateTo']?>)
                          <?php
                         $getRes = mysql_query("SELECT prodCode, prodDesc, SUM(prodQty) as QTY, sellAmount FROM ztblpresales where saleFlag=1  and DATE(sellDate)>='".$_GET['datefrom']."'  and DATE(sellDate)<='".$_GET['dateTo']."' Group by prodCode");

                        }else{
                          $getRes = mysql_query("SELECT prodCode, prodDesc, SUM(prodQty) as QTY, sellAmount FROM ztblpresales where saleFlag=1 Group by prodCode");

                        }
                        ?>


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <th>Serial No.</th>
                                  <th>Product Name</th>
                                  <th>Qty</th>
                                  <th>Price</th>
                                  <th>Subtotal</th>


                                </tr>
                            </thead>
                            <tbody>



                              <?php if(mysql_num_rows($getRes)==0){ ?>
                                    <tr><td class="text-danger text-center" colspan="7"><strong>*** EMPTY ***</strong></td></tr>
                                <?php } ?>
                                <?php
                                  $Gtotal=0;
                                while($row = mysql_fetch_array($getRes)){

                                  ?>
                                    <tr>
                                        <td><?php echo $row['prodCode']; ?></td>

                                        <td class="text-left"><?php echo $row['prodDesc']; ?></td>
                                        <td class="text-right"><?php echo $row['QTY']; ?></td>
                                        <td class="text-right"><?php echo  number_format($row['sellAmount'], 2, '.', ','); ?></td>
                                          <td class="text-right"><?php echo number_format(($row['QTY']*$row['sellAmount']), 2, '.', ','); ?></td>


                                    </tr>
                                <?php

                                    $Gtotal+=($row['QTY']*$row['sellAmount']);
                               } ?>
                                <tr>
                                    <td colspan="3"><?php echo $row['prodCode']; ?></td>


                                    <td class="text-right">TOTAL:</td>
                                      <td class="text-danger text-right"><b><?php echo number_format($Gtotal, 2, '.', ','); ?></b></td>


                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include('include/footer.php'); ?>
