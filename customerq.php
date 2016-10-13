<?php
 include('include/connect.php');

?>
<?php 
    include('include/customer_model.php');    
    $datauser = new User_data();
?>

<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Customer Record
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                    <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            User <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
                        </div>  
                    </div>
                </div>
                <?php endif; ?>
				
				<div class="row">
					<div class="col-lg-8">
						<div class="form-group input-group">
							<input type="text" class="form-control" placeholder="Search Customer...">
							<span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
						</div>
					</div>
					<div class="col-lg-4">
						<button type="button"  class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer </button>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-12">
						<div class="container">
						
						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <div class="modal-content">
                    
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h3 class="modal-title"><center>Add Customer</center></h3>
								</div>
                               
                                 <form action="include/customer_model.php?p=adduser" method="POST" >
								<div class="modal-body">
									<div class="table-responsive">
										<table class="table table-hover">
                                            <tr>
                                            <td><label> Membershi ID : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="mID"></td>
                                            </tr>
											<tr>
											<td><label> First Name : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="fname"></td>
											</tr>
                                            <tr>
                                            <td><label> Last Name : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="lname"></td>
                                            </tr>

											<tr>
												<td><label> Address : </label></td>
												<td><input type="text" class="form-control" style="width:265px; height:30px;" name="address"></td>
											</tr>
											<tr>
												<td><label> Company/ Agency: </label></td>
												<td><input type="text" class="form-control" style="width:265px; height:30px;" name="agency"></td>
											</tr>
											<tr>
												<td><label> Contact No. : </label></td>
												<td><input type="inte" class="form-control" style="width:265px; height:30px;" name="contact" /></td>
											</tr>
                                                    <tr>
                                                <td><label> Email. : </label></td>
                                                <td><input type="email" class="form-control" style="width:265px; height:30px;" name="email" /></td>
                                            </tr>
											
										</table>
									</div>
								  
								</div>
								<div class="modal-footer ">
								      <input type="submit" class="btn btn-sm btn-success fa fa-floppy-o" name="submit" value="Save"> 
								</div>
                                  </form>
							  </div>
							
							</div>
						  </div>
						  
						</div>
		
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
									<tr>
										<th> Name </th>
										<th> Address </th>
										<th> Company/ Agency </th>
										<th> Contact No. </th>
										<th> E-mail </th>
										<th width="90px"> Action</th>	
									</tr>
								</thead>
                                <tbody>
                                 <?php $getRes = mysql_query("SELECT * FROM customer ") or die(mysql_error());
                                    while ($row = mysql_fetch_assoc($getRes)) {
                            
                                    ?>
                                    <tr class="record">
                                    <td><?php echo $row['customer_name'] .'  ' .$row['customer_Lname']?></td>
                                    <td><?php echo $row['address']; ?></td>
									<td><?php echo $row['agency']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                             

                                   <th><center> <button type="button" class="btn btn-xs btn-info"title ="Title"><i class="fa fa-pencil-square" aria-hidden="true" title ="Title" ></i></button>
                                        <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </th>
                                    </center></tr>
                                        <?php
                                            }
                                        ?>
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