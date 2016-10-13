<?php include('connect.php');
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

<?php

    include('include/servicefunction.php');
     $dataservice = new servicedata();
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcodeSE='SE-'.createRandomPassword();
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Service
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
                 <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                           service<?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group input-group">
									<input type="text" class="form-control" placeholder="Search Service...">
									<span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
								</div>
							</div>
							<div class="col-lg-4">
								<button type="button"  class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Service </button>
							</div>
						</div>
						<hr>
						<div class="container">

						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->
                              <<form role ="form"action="include/servicefunction.php?p=addservice" method="POST">



							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title"><h3><center> Add Service </center></h3>
								</div>
								<div class="modal-body">
									<div class="table-responsive">
										<table class="table table-hover">
											<tr>
											<td><label> Service ID : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="service_id" value="<?php echo $finalcodeSE; ?>" readonly required></td>
											</tr>

											<tr>
											<td><label> Description : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="description"></td>
											</tr>
											<tr>
												<td><label> Customer : </label></td>
												<td><input type="text" class="form-control" style="width:265px; height:30px;" name="customer"></td>
											</tr>
											<tr>
												<td><label> Contact No. : </label></td>
												<td><input type="text" class="form-control" style="width:265px; height:30px;" name="contact"></td>
											</tr>
											<tr>
												<td><label> Status : </label></td>
												<td><input type="" class="form-control" style="width:265px; height:30px;" name="status" /></td>
											</tr>
											<tr>
											<td><label> Action : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name=""></td>
											</tr>
										</table>
									</div>

								</div>
								<div class="modal-footer ">
								      <input type="submit" class="btn btn-block btn-success fa fa-floppy-o" name="submit" value="Save">
								</div>
                                </form>
							  </div>

							</div>
						  </div>

						</div>

						<!-- end modal -->

						 <div class="modal fade" id="editSupplier" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->
                              <form role ="form"action="" method="POST">



							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title"><h3><center> Edit Service </center></h3>
								</div>

								<div class="modal-body">
									<div class="table-responsive">
										<table class="table table-hover">
											<tr>
											<td><label> Service ID : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="service_id"></td>
											</tr>

											<tr>
											<td><label> Description : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="description"></td>
											</tr>
											<tr>
												<td><label> Customer : </label></td>
												<td><input type="text" class="form-control" style="width:265px; height:30px;" name="customer"></td>
											</tr>
											<tr>
												<td><label> Contact No. : </label></td>
												<td><input type="text" class="form-control" style="width:265px; height:30px;" name="contact"></td>
											</tr>
											<tr>
												<td><label> Status : </label></td>
												<td><input type="" class="form-control" style="width:265px; height:30px;" name="status" /></td>
											</tr>
											<tr>
											<td><label> Action : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="action"></td>
											</tr>
										</table>
									</div>

								</div>
								<div class="modal-footer ">
								  <input type="button" class="btn btn-block btn-success" data-dismiss="modal" name ="submit" value = "Save"><i class="" aria-hidden="true"></i>
								</div>

							  </div>

							</div>
						  </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
									<tr>
										<th> Service ID </th>
										<th> Description </th>
										<th> Customer </th>
										<th> Contact No. </th>
										<th> Status </th>
										<th width="90px"> Action</th>
									</tr>
								</thead>      <?php $service = $dataservice->getservice(); ?>
                                        <?php if(mysql_num_rows($service)==0): ?>
                                            <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php while($row = mysql_fetch_array($service)): ?>

                                    <tr>
                                    <form method="post" action="">
                                        <td><?=$row['service_id']?></td>
                                        <td><?=$row['description']?></td>
                                        <td><?=$row['customer']?></td>
										<td><?=$row['contact']?></td>
                                        <td><?=$row['status']?></td>
                                        <th>
                                        <a title = "Edit" type="button"  class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editSupplier"><i class="fa fa-pencil-square" aria-hidden="true"></i> </a>
                                        <a title = "Archive" type="button" class="btn btn-xs btn-danger" href = "include/servicefunction.php?p=archiveitem&id=<?echo $row['service_id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
										</th>
                                        </tr>
                                    </form>
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
