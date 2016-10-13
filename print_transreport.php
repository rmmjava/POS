
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
<center><h3><b>Transaction Report</b></h3></center>
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
                          $getRes = mysql_query("SELECT * FROM ztbltransactions  where DATE(transDate)>='".$_GET['datefrom']."%'  and DATE(transDate)<='".$_GET['dateTo']."%'   order by transDate");

                        }else{
                          $getRes = mysql_query("SELECT * FROM ztbltransactions   order by transDate");

                        }
                        ?>


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                      <th> Transaction ID </th>
                                      <th>Client</th>
                                      <th>Sale Amount</th>
                                      <th>Tendered</th>
                                      <th>Change</th>
                                        <th>Total Items</th>
                                      <th>DATE</th>

                                    </tr>
                                </thead>
                                <tbody>
                              
                                    <?php if(mysql_num_rows($getRes)==0){ ?>
                                        <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                    <?php } ?>
                                    <?php while($row = mysql_fetch_array($getRes)){
                                      if($row['client']==''){
                                        $cl='WALKIN';
                                      }else{
                                        $cl=$row['client'];
                                      }
                                      ?>
                                        <tr>
                                            <td><?php echo $row['transID']; ?></td>
                                            <td class="text-center"><?php echo $cl; ?></td>
                                            <td class="text-right"><?php echo $row['saleAmount']; ?></td>
                                            <td class="text-right"><?php echo $row['Tendered']; ?></td>
                                            <td class="text-right"><?php echo $row['chAmt']; ?></td>
                                              <td class="text-right"><?php echo $row['totalItems']; ?></td>
                                                <td class="text-center"><?php echo $row['transDate']; ?></td>

                                        </tr>
                                    <?php } ?>
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
