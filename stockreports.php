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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Stock Reports
                        </h1>


                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
              
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="reports table-responsive">
                          <button  type="button" class="btn btn-info fa fa-print pull-right" onclick="AddFriends();"> PRINT</button>

                            <br>
                              <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                      <th>Serial No.</th>
                                        <th>Item Name</th>
                                          <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>

                                        <th>Price</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $item = $dataitem->getitems(); ?>
                                    <?php if(mysql_num_rows($item)==0): ?>
                                        <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                    <?php endif; ?>
                                    <?php while($row = mysql_fetch_array($item)): ?>
                                        <tr>
                                            <td><?php echo $row['Serial_number']; ?></td>
                                            <td><?php echo $row['Product_Name']; ?></td>
                                                <td class="text-center"><?php echo $row['Category']; ?></td>
                                            <td class="text-center"><?php echo $row['Quantity']; ?></td>
                                            <td class="text-center"><?php echo $row['UM']; ?></td>
                                              <td class="text-center"><?php echo $row['selling_price']; ?></td>



                                        </tr>
                                    <?php endwhile; ?>
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

win1 = window.open('print_stock.php', 'newwindow', config='height=580, width=950, left=10, top=60, toolbar=no, scrollbars=yes, resizable=yes')
win1.focus();
}
</SCRIPT>
