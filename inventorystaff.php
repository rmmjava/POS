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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Inventory
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            Item <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
                        </div>  
                    </div>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group input-group">
									<input type="text" class="form-control" placeholder="Search Product...">
									<span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
								</div>
							</div>
							<div class="col-lg-4">
								<button type="button"  class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Product </button>
							</div>
						</div>
						<hr>
						<div class="container">
						
						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
                          
							  <div class="modal-content">

                                <form role="form" action="include/function.php?p=additem" method="post">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h3 class="modal-title"><center>Add Product</center></h3>
								</div>
								<div class="modal-body">
									
                              <table class="table table-hover">
                                            <tr>
                                                <td><label> Serial No. : </label></td>
                                                <td><input type="text" class="form-control" style="width:265px; height:30px;" name="bar_code" required=""></td>
                                            </tr>
                                            <tr>
                                            <td><label> Product Name : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="pro_name" required=""></td>
                                            </tr>

                                            <tr>
                                                <td><label> Category :</label></td>
                                                
                                                <td>
                                                <select class="form-control" style="width:265px; height:30px;" name="pro_cat" required="">
                                                      <?php while($row = mysql_fetch_array($getcat1)): ?>
                                                     <option> <?php echo $row['Category'];?></option>
                                                     <?php endwhile; ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label> Quantity : </label></td>
                                                <td><input type="text" class="form-control" style="width:265px; height:30px;" id="quantity" name="pro_quantity" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><label> Unit Measure : </label></td>
                                                <td><input type="" class="form-control" style="width:265px; height:30px;" name="unit_measure" id="unit" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><label> Supplier : </label></td>
                                                <td>
                                                <select name="supplier_name" id="supplier" class="form-control" style="width:265px; height:30px; "required="">
                                                   <?php while($row = mysql_fetch_array($getsupplier)): ?>
                                                     <option><?php echo $row['supplier_name'];?></option>
                                                     <?php endwhile; ?>
                                                </select>
                                                
                                                </td>
                                                <td><button type="button" class="btn btn-default fa fa-plus-square fa-1x icon-plus-square blackiconcolor" data-dismiss="modal"></button></td>
                                            </tr>
                                            
                                            
                                            
                                            <tr>
                                            <td><label>Arrival Date : </label></td>
                                            <td><input type="date" class="form-control" style="width:265px; height:30px;" name="arrival_date" id="arrival" /></td>
                                            </tr>
                                            <tr>
                                                <td> Price </td>
                                                <td> <input type="text" class="form-control" style="width:265px; height:30px;" name="selling_price" id="price" required=""></td>

                                            </tr>
                                        </table>
      		  
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
										<th> Serial No. </th>
										<th> Product Name </th>
										<th> Category </th>
										<th> Quantity </th>
										<th> Unit Measure </th>
										<th> Supplier </th>
										<th> Date Received </th>
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
                                    <form method="post" action="">
                                        <td><?=$row['Serial_number']?></td>
                                        <td><?=$row['Product_Name']?></td>
                                        <td><?=$row['Category']?></td>
                                        <td><?=$row['Quantity']?></td>
                                        <td><?=$row['UM']?></td>
                                        <td><?=$row['Supplier']?></td>
                                        <td><?=$row['Arival_Date']?></td>
                                        <td><?=$row['selling_price']?></td>
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

    <?php include('include/footer.php'); ?>

