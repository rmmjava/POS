<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include("include/connect.php"); ?>

<?php
    include('include/function.php');
     $dataitem = new Itemdata();
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="page-header">
                            Expense
                        </h1>

                    </div>
                    <div class="col-lg-2">
                        <br>
                        


                    </div>
                    <div class="col-lg-2">
                        <br>
                        <button type="button"   style="margin-top:20px;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Expense </button>


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

						<div class="container">

						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->

							  <div class="modal-content">

                                <form role="form" action="include/function.php?p=additem" method="post">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h3 class="modal-title"><center>Add Expense</center></h3>
								</div>
								<div class="modal-body">

                              <table class="table table-hover">
                                            <tr>
                                                <td><label> Date : </label></td>
                                                <td><input type="date" class="form-control" style="width:265px; height:30px;" name="date" required=""></td>
                                            </tr>
											<tr>
                                                <td><label> Staff :</label></td>

                                                <td>
												<?php$q = "select * from expense";
												$result = mysql_query($q);
												return $result;?>
                                                <select class="form-control" style="width:265px; height:30px;" name="staff" required="">
                                                      <?php while($row = mysql_fetch_array($getcat1)): ?>
                                                     <option> <?php echo $row['Category'];?></option>
                                                     <?php endwhile; ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td><label> Deposit Charge : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="deposit_charge" required=""></td>
                                            </tr>

                                            
                                            <tr>
                                                <td><label> Office Supply : </label></td>
                                                <td><input type="text" class="form-control" style="width:265px; height:30px;" id="quantity" name="office_supply" required=""></td>
                                            </tr>
                                             <tr>
                                            <td><label> Travel Allowance : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="travel_allowance" id="price" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><label> Purchases : </label></td>
                                                <td><input type="" class="form-control" style="width:265px; height:30px;" name="purchases" id="unit" required=""></td>
                                            </tr>

                                             <tr>
                                                <td> <label> Deposit </label></td>
                                                <td> <input type="text" class="form-control" style="width:265px; height:30px;" name="deposit" id="price" required=""></td>

                                            </tr>
											<tr>
                                                <td><label> Permits : </label></td>
                                                <td><input type="" class="form-control" style="width:265px; height:30px;" name="permits" id="unit" required=""></td>
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

						  <!-- EDIT MODAL -->

						  <div class="modal fade" id="editExpense" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->
                              <<form role ="form"action="PHP/savesupplier.php" method="POST">



							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title"><h3><center> Edit Expense </center></h3>
								</div>
								<div class="modal-body">
									<div class="table-responsive">
										<table class="table table-hover">
                                            <tr>
                                                <td><label> Date : </label></td>
                                                <td><input type="date" class="form-control" style="width:265px; height:30px;" name="date" required=""></td>
                                            </tr>
											<tr>
                                                <td><label> Staff :</label></td>

                                                <td>
                                                <select class="form-control" style="width:265px; height:30px;" name="staff" required="">
                                                      <?php while($row = mysql_fetch_array($getcat1)): ?>
                                                     <option> <?php echo $row['Category'];?></option>
                                                     <?php endwhile; ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td><label> Deposit Charge : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="deposit_charge" required=""></td>
                                            </tr>

                                            
                                            <tr>
                                                <td><label> Office Supply : </label></td>
                                                <td><input type="text" class="form-control" style="width:265px; height:30px;" id="quantity" name="office_supply" required=""></td>
                                            </tr>
                                             <tr>
                                            <td><label> Travel Allowance : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="travel_allowance" id="price" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><label> Purchases : </label></td>
                                                <td><input type="" class="form-control" style="width:265px; height:30px;" name="purchases" id="unit" required=""></td>
                                            </tr>

                                             <tr>
                                                <td> <label> Deposit </label></td>
                                                <td> <input type="text" class="form-control" style="width:265px; height:30px;" name="deposit" id="price" required=""></td>

                                            </tr>
											<tr>
                                                <td><label> Permits : </label></td>
                                                <td><input type="" class="form-control" style="width:265px; height:30px;" name="permits" id="unit" required=""></td>
                                            </tr>
                                        </table>
									</div>

								</div>
								<div class="modal-footer ">
								  <input type="button" class="btn btn-block btn-success" data-dismiss="modal" name ="submit" value = "Save"><i class="" aria-hidden="true"></i>
								</div>
                                </form>
							  </div>

							</div>
						  </div>

						  <!-- END MODAL -->

						</div>


                                <?php $item = $dataitem->getitems();
                                if(mysql_num_rows($item)==0):
                                endif;
                                $ctr=0;
                                $content="";
                                while($row = mysql_fetch_array($item)):

                                          if($ctr==0){
                                            $content=$content."{sn:'".$row['Serial_number']."',pn:'".mysql_real_escape_string($row['Product_Name'])."',cat:'".$row['Category']."',qty:'".$row['Quantity']."'
                                              ,crit:'".$row['Critical']."',um:'".$row['UM']."',sup:'".$row['Supplier']."',sp:'".$row['selling_price']."'}";
                                          }else{
                                            $content=$content.",{sn:'".$row['Serial_number']."',pn:'".mysql_real_escape_string($row['Product_Name'])."',cat:'".$row['Category']."',qty:'".$row['Quantity']."'
                                              ,crit:'".$row['Critical']."',um:'".$row['UM']."',sup:'".$row['Supplier']."',sp:'".$row['selling_price']."'}";

                                          }
                                          $ctr++;

                                          ?>



                                <?php endwhile; ?>




                        <a href="#" class='record_count'>Records <span class="badge"></span></a>
                        <span id="found" class="label label-info" ></span>
                        <table id="stream_table" class='table table-bordered'>
                        <thead style="font-weight:bolder;">
                          <tr>
                            <th> ID </th>
        										<th> Staff </th>
												<th> Type of Expenses </th>
        										<th> Amount </th>
												<th> Date </th>
        										
                            
                            <th width="70">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                      <div id="summary" >

                        <div>
                      </div>
                      </div>

                    </div>

                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include('include/footer.php'); ?>

    <script src="vendors/mustache.js" type="text/javascript"></script>
    <script src="vendors/stream_table.js" type="text/javascript"></script>
    <script type="text/javascript">

    var Movies0 = [<?=$content?>];

    var Movies = [Movies0];

    </script>
    <script src="vendors/index.js" type="text/javascript"></script>

		<td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
		
	
   <script id="template" type="text/html">
      <tr id='pen{{record.transID}}'>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
		<td></td>
    


        <td><center>
        <a href="expense.php?edit={{record.sn}}" title = "Edit" type="button"  class="" ><i class="fa fa-pencil-square-o  fa-lg" aria-hidden="true"></i> </a>
        <a href="include/function.php?p=deactive&barcode={{record.sn}}" title = "Archive" type="button" class=""><i class="fa fa-trash-o fa-lg" aria-hidden="true" style="color:red;"></i></a>

    </center></td>


      </tr>
    </script>
