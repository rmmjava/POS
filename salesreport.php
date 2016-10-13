<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php
    include('include/function.php');
    $dataitem = new Itemdata();

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Sales Reports
                        </h1>


                    </div>
                    <div class="col-lg-2">


                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <form action="salesreport.php" method="get">
                    <div class="col-lg-10">
                        <div class="form-group input-group">
                            <span class="input-group-addon">From</span>
                            <input type="date" placeholder="mm/dd/yyyy" name="datefrom" class="form-control" id="dateFrom">

                            <span class="input-group-addon">To</span>
                            <input type="date" placeholder="mm/dd/yyyy" name="dateTo" class="form-control" id="dateTo">
                        </div>
                      </div>
                        <div class="col-lg-2">
                        <div class="form-group">
                            <button type="submit" class="btnreport btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                  </form>
                </div>
                <!-- /.row -->
                <hr/>
                 <div class="row">
                    <div class="col-lg-12">
                      <div class="reports table-responsive">
  <?php
if(isset($_GET['datefrom'])){
  ?>
  Transaction DATE: (<?=$_GET['datefrom']?> TO <?=$_GET['dateTo']?>)
  <?php
 $getRes = mysql_query("SELECT prodCode, prodDesc, SUM(prodQty) as QTY, sellAmount FROM ztblpresales where saleFlag=1  and DATE(sellDate)>='".$_GET['datefrom']."'  and DATE(sellDate)<='".$_GET['dateTo']."' Group by prodCode");
$range="datefrom={$_GET['datefrom']}&dateto={$_GET['dateTo']}";
}else{
  $getRes = mysql_query("SELECT prodCode, prodDesc, SUM(prodQty) as QTY, sellAmount FROM ztblpresales where saleFlag=1 Group by prodCode");
$range="non";
}
?>

                              <button  type="button" class="btn btn-info fa fa-print pull-right" onclick="AddFriends();"> PRINT</button>

                                <br>
                                  <br>

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
<script language="JavaScript">
function AddFriends()
{

win1 = window.open('print_salesreports.php?<?=$range?>', 'newwindow', config='height=580, width=950, left=10, top=60, toolbar=no, scrollbars=yes, resizable=yes')
win1.focus();
}
</SCRIPT>
