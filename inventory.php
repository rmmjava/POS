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
                    <div class="col-lg-8">
                        <h1 class="page-header">
                            Inventory
                        </h1>

                    </div>
                    <div class="col-lg-2">
                        <br>
                          <a href="addStock.php" type="button"   style="margin-top:20px;" class="btn btn-info btn-block" ><i class="fa fa-stack-overflow" aria-hidden="true"></i> Add Stock </a>


                    </div>
                    <div class="col-lg-2">
                        <br>
                        <button type="button"   style="margin-top:20px;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Product </button>


                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['msg'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                          <?php
                          if($_GET['msg']=="updated"){
                            echo "<b>Item successfully updated!</b>";
                          }
                          if($_GET['msg']=="deactive"){
                            echo "<b>Item successfully arhived!</b>";
                          }
                          if($_GET['msg']=="added"){
                            echo "<b>Item successfully added!</b>";
                          }

                           ?>

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
								  <h3 class="modal-title"><center>Add Product</center></h3>
								</div>
								<div class="modal-body">

                              <table class="table table-hover">
                                            <tr>
                                                <td><label> Barcode : </label></td>
                                                <td><input type="text" class="form-control"  name="bar_code" required=""></td>
                                            </tr>
                                            <tr>
                                            <td><label> Product Name : </label></td>
                                            <td><input type="text" class="form-control"  name="pro_name" required=""></td>
                                            </tr>

                                            <tr>
                                                <td><label> Category :</label></td>

                                                <td>
                                                <select class="form-control"  name="pro_cat" required="">
                                                      <?php while($row = mysql_fetch_array($getcat1)): ?>
                                                     <option> <?php echo $row['Category'];?></option>
                                                     <?php endwhile; ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label> Quantity : </label></td>
                                                <td><input type="text" class="form-control"  id="quantity" name="pro_quantity" required=""></td>
                                            </tr>
                                             <tr>
                                            <td><label>Re Order: </label></td>
                                            <td><input type="text" class="form-control"  name="critical" id="price" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><label> Unit Measure : </label></td>
                                                <td><select class="form-control">
                                                        <option>PCS</option>
                                                        <option>PACK</option>
                                                        <option>BOX</option>
                                                        
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><label> Supplier : </label></td>
                                                <td>
                                                <select name="supplier_name" id="supplier" class="form-control" required="">
                                                   <?php while($row = mysql_fetch_array($getsupplier)): ?>
                                                     <option><?php echo $row['supplier_name'];?></option>
                                                     <?php endwhile; ?>
                                                </select>

                                            <tr>
                                                <td> <label> Price </label></td>
                                                <td> <input type="text" class="form-control"  name="selling_price" id="price" required=""></td>

                                            </tr>
                                        </table>

								</div>



                <div class="modal-footer ">
								  <input type="submit" class="btn btn-block btn-success" name ="submit" value = "SAVE"><i class="" aria-hidden="true"></i>
								</div>

                                 </form>
                          	  </div>

							</div>
						  </div>

						  <!-- EDIT MODAL -->

						  <div class="modal fade" id="editInventory" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->




							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title"><h3><center> Edit Product </center></h3>
								</div>
                    <form role="form" action="include/function.php?p=updateitem" method="POST">
								<div class="modal-body">
									<div class="table-responsive">
										<table class="table table-hover">
                      <?php
                      $getRes = mysql_query("SELECT * FROM product_tbl WHERE Serial_number='{$_GET['edit']}'");
                      while($row = mysql_fetch_array($getRes)){
                        $sn=$row['Serial_number'];
                        $pn=$row['Product_Name'];
                        $cat=$row['Category'];
                        $sup=$row['Supplier'];
                        $cl=$row['Critical'];
                        $um=$row['UM'];
                        $pp=$row['selling_price'];
                      }

                       ?>
                                            <tr>
                                                <td><label> Barcode: </label></td>
                                                <td><input type="text" class="form-control" style="" name="barcode" value="<?=$sn?>" disabled="disabled">
                                                <input type="hidden" class="form-control" style="height:30px;" name="bar_code" value="<?=$sn?>"></td>
                                            </tr>
                                            <tr>
                                            <td><label> Product Name : </label></td>
                                            <td><input type="text" class="form-control"  name="pro_name" value="<?=$pn?>" required=""></td>
                                            </tr>

                                            <tr>
                                                <td><label> Category :</label></td>

                                                <td>
                                                  <select class="form-control"  name="pro_cat" required="">
                                                    <option  value='<?=$cat?>' selected><?=$cat?></option>
                                                        <?php
                                                        $getc = mysql_query("SELECT * FROM category_tbl");
                                                         while($row = mysql_fetch_array($getc)){

                                                               echo "<option  value='{$row['Category']}' >".$row['Category']."</option>";


                                                       }?>
                                                  </select>
                                                </td>
                                            </tr>

                                            <tr>
                                            <td><label> Re-Order: </label></td>
                                                     <td> <input type="text" class="form-control"  name="critical" id="price" value="<?=$cl?>" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><label> Unit Measure : </label></td>
                                                <td><input type="" class="form-control"  name="unit_measure" id="unit" value="<?=$um?>" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><label> Supplier : </label></td>
                                                <td>

                                                <select class="form-control" name="supplier_name" required="">
                                                  <option  value='<?=$sup?>' selected><?=$sup?></option>
                                                      <?php
                                                      $gets = mysql_query("SELECT * FROM supliers");
                                                       while($row = mysql_fetch_array($gets)){

                                                             echo "<option value='{$row['supplier_name']}'>".$row['supplier_name']."</option>";


                                                     }?>
                                                </select>

                                                </td>
                                            </tr>




                                            <tr>
                                                <td><label> Price</label> </td>
                                                <td> <input type="text" class="form-control"  name="selling_price"  value="<?=$pp?>" id="price" required=""></td>

                                            </tr>
                                        </table>
									</div>

								</div>
								<div class="modal-footer ">
								  <input type="submit" class="btn btn-block btn-success"  name ="submit" value = "UPDATE"><i class="" aria-hidden="true"></i>

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
                            <th> Barcode: </th>
        										<th> Product Name </th>
        										<th> Category </th>
        										<th> Quantity </th>
                            <th> Critical </th>
        										<th> Unit Measure </th>
        										<th> Supplier </th>
                            <th>Price</th>
                            <th width="120">Action</th>
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

    <script id="template" type="text/html">
      <tr id='pen{{record.transID}}'>
        <td>{{record.sn}}</td>
        <td>{{record.pn}}</td>
        <td>{{record.cat}}</td>
        <td>{{record.qty}}</td>
        <td>{{record.crit}}</td>
        <td>{{record.um}}</td>
        <td>{{record.sup}}</td>
        <td>{{record.sp}}</td>


        <td>
        <a href="inventory.php?edit={{record.sn}}" title = "Edit" type="button"  class="" ><i class="fa fa-pencil-square-o  fa-lg" aria-hidden="true"></i> </a>

        <a href="BarcodeV1.php?barcode={{record.sn}}&qty=1" title = "Generate Barcode" type="button" class=""><i class="fa fa-barcode fa-lg" aria-hidden="true" style = "color:green;"></i></a>
        <a href="include/function.php?p=deactive&barcode={{record.sn}}" title = "Archive" type="button" class=""><i class="fa fa-trash-o fa-lg" aria-hidden="true" style="color:red;"></i></a>

    </td>


      </tr>
    </script>


    <?php if(isset($_GET['edit'])){
      ?>
    <script type="text/javascript">
    $( document ).ready(function() {
       $('#editInventory').modal('show');
      $('#editInventory').on('show.bs.modal.sm', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever');
        var modal = $(this);
      $("#recipient-name").val(recipient);
      });
    });

    </script>
    <?php
  }
      ?>
