<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include("include/connect.php"); ?>

<?php
    include('data/getsupplier.php');
    include('data/getcategory.php');
    include('include/function.php');
     $dataitem = new Itemdata();
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                  <form method="post" action="PHP/addCriticalstock.php">
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">
                           Critical Stock
                        </h1>

                    </div>
                    <div class="col-lg-2">
      								<button type="submit"  style="margin-top:40px;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Stock </button>
      							</div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                             Successfully Update Stock!
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">

						<hr>


                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
									<tr>
										<th> Barcode </th>
										<th> Product Name </th>
										<th> Category </th>
										<th> Quantity </th>

										<th> Unit Measure </th>
										<th> Supplier </th>

                                        <th>Price</th>

                                        <th width="120">No. of Stock to ADD</th>


									</tr>
								</thead>
                                <tbody>
                                <?php $item = $dataitem->getcriticalStock(); ?>
                                        <?php if(mysql_num_rows($item)==0): ?>
                                            <tr><td class="text-danger text-center" colspan="8"><strong>*** EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php
                                        $ctr=0;
                                        while($row = mysql_fetch_array($item)):
                                          $ctr++;
                                          ?>

                                    <tr>

                                        <td><?=$row['Serial_number']?></td>
                                        <td><?=$row['Product_Name']?></td>
                                        <td><?=$row['Category']?></td>
                                        <td><?=$row['Quantity']?></td>

                                        <td><?=$row['UM']?></td>
                                        <td><?=$row['Supplier']?></td>

                                        <td><?=$row['selling_price']?></td>

                                        <td>
                                          		<input type="number" class="form-control" name="stockN<?=$ctr?>" value="0" >
                                              <input type="hidden" class="form-control" name="pid<?=$ctr?>" value="<?=$row['Serial_number']?>">
                                        </td>

                                    </tr>

                                <?php endwhile;


                                 ?>
                                   <input type="hidden" class="form-control" name="bilang" value="<?=$ctr?>">
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include('include/footer.php'); ?>
