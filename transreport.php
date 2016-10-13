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
                            Transaction Reports
                        </h1>


                    </div>
                    <div class="col-lg-2">


                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <form action="transreport.php" method="get">
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
  $getRes = mysql_query("SELECT * FROM ztbltransactions  where DATE(transDate)>='".$_GET['datefrom']."%'  and DATE(transDate)<='".$_GET['dateTo']."%'   order by transDate");
$range="datefrom={$_GET['datefrom']}&dateto={$_GET['dateTo']}";
}else{
  $getRes = mysql_query("SELECT * FROM ztbltransactions   order by transDate");
$range="non";
}
?>

                              <button  type="button" class="btn btn-info fa fa-print pull-right" onclick="AddFriends();"> PRINT</button>

                                <br>
                                  <br>

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
                                        <tr><td class="text-danger text-center" colspan="7"><strong>*** EMPTY ***</strong></td></tr>
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
<script language="JavaScript">
function AddFriends()
{

win1 = window.open('print_transreport.php?<?=$range?>', 'newwindow', config='height=580, width=950, left=10, top=60, toolbar=no, scrollbars=yes, resizable=yes')
win1.focus();
}
</SCRIPT>
