<?php include('connect.php');
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php');?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Supplier Record
                        </h1>

                    </div>
                    <div class="col-lg-2">
                      <button type="button"  style="margin-top:20px;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Supplier </button>


                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['msg'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                          <?php
                          if($_GET['msg']=="updated"){
                            echo "<b>Supplier successfully updated!</b>";
                          }
                          if($_GET['msg']=="del"){
                            echo "<b>Supplier successfully delete!</b>";
                          }
                          if($_GET['msg']=="added"){
                            echo "<b>Supplier successfully added!</b>";
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
                              <form role ="form" action="PHP/savesupplierq.php" method="POST">



							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Add Supplier</h4>
								</div>
								<div class="modal-body">
									<div class="table-responsive">
										<table class="table table-hover">
											<tr>
											<td><label> Supplier Name : </label></td>
											<td><input type="text" class="form-control" name="supname"></td>
											</tr>
											<tr>
											<td><label> Supplier E-mail : </label></td>
											<td><input type="text" class="form-control" name="email"></td>
											</tr>
											<tr>
											<td><label> Contact Person : </label></td>
											<td><input type="text" class="form-control" name="conperson"></td>
											</tr>
											<tr>
												<td><label> Contact No. : </label></td>
												<td><input type="text" class="form-control" name="contact"></td>
											</tr>
											<tr>
												<td><label> Address : </label></td>
												<td><input type="" class="form-control"  name="address" /></td>
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
   <form method="post" action="PHP/savesupplier.php">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><h3><center> Edit Supplier </center></h3>
                </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <?php
                        $getRes = mysql_query("SELECT * FROM supliers WHERE supplier_id='{$_GET['edit']}'") or die(mysql_error());

                        while ($row = mysql_fetch_assoc($getRes)) {
                          $sn=$row['supplier_name'];
                          $sa=$row['supplier_address'];
                          $sc=$row['supplier_contact'];
                          $cp=$row['contact_person'];
                          $em=$row['Email'];
                        }
                        ?>
                        <tr>
                          <td><label> Supplier Name : </label></td>
                          <td><input type="text" class="form-control"  name="supname" value="<?=$sn?>" required></td>
                        </tr>

                        <tr>
                          <td><label> Contact Person : </label></td>
                          <td><input type="text" class="form-control" name="conperson"  value="<?=$cp?>" required></td>
                        </tr>
                        <tr>
                          <td><label> Contact No. : </label></td>
                          <td><input type="text" class="form-control"  name="contactno"  value="<?=$sc?>" required></td>
                        </tr>

                        <tr>
                          <td><label> Address : </label></td>
                          <td><input type="" class="form-control"  name="address"  value="<?=$sa?>" required/></td>
                        </tr>
                        <tr>
                          <td><label> Supplier E-mail : </label></td>
                          <td><input type="text" class="form-control"  name="email"  value="<?=$em?>" required></td>
                          <input type="hidden" name="testayd" value="<?php echo $_GET['edit'] ?>">
                        </tr>
                      </table>
                    </div>

                  </div>
                  <div class="modal-footer ">
                    <input type="submit" class="btn btn-block btn-success"  name ="updateme" id="submit" value = "Save">
                  </div>
                </form>
                </div>

              </div>
              </div>


                                    <?php $getRes = mysql_query("SELECT * FROM supliers order by supplier_id") or die(mysql_error());
                                    $ctr=0;
                                    $content="";
                                    while ($row = mysql_fetch_assoc($getRes)) {
                                      $ayd = $row['supplier_id'];
                                     $_SESSION['id'] = $row['supplier_id'];

                                      if($ctr==0){
                                        $content=$content."{si:'".$row['supplier_id']."',sn:'".$row['supplier_name']."',em:'".mysql_real_escape_string($row['Email'])."',cp:'".$row['contact_person']."',sc:'".$row['supplier_contact']."'
                                          ,sa:'".$row['supplier_address']."'}";
                                      }else{
                                        $content=$content.",{si:'".$row['supplier_id']."',sn:'".$row['supplier_name']."',em:'".mysql_real_escape_string($row['Email'])."',cp:'".$row['contact_person']."',sc:'".$row['supplier_contact']."'
                                          ,sa:'".$row['supplier_address']."'}";

                                      }
                                      $ctr++;


                                                    }
                                            ?>





                        <a href="#" class='record_count'>Records <span class="badge"></span></a>
                        <span id="found" class="label label-info" ></span>
                        <table id="stream_table" class='table table-bordered'>
                        <thead style="font-weight:bolder;">
                          <tr>
                            <th> Supplier Name </th>
        										<th> E-mail </th>
        										<th> Contact Person </th>
        										<th> Contact No. </th>
        										<th> Address </th>
        										<th width="70px"> Action</th>
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

    </div>
    <!-- /#wrapper -->


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
    <td>{{record.em}}</td>
    <td>{{record.cp}}</td>
    <td>{{record.sc}}</td>
    <td>{{record.sa}}</td>



    <td>
      <a  href="supplier.php?edit={{record.si}}" title = "Edit" type="button" class="" ><i class="fa fa-pencil-square-o  fa-lg" aria-hidden="true" ></i></a>

      <a href="PHP/delsupplier.php?id={{record.si}}" title = "Archive" type="button" class=""><i class="fa fa-archive fa-lg" aria-hidden="true" style="color:red;"></i></a>

</td>


  </tr>

</script>


<?php if(isset($_GET['edit'])){
  ?>
<script type="text/javascript">
$( document ).ready(function() {
   $('#editSupplier').modal('show');
  $('#editSupplier').on('show.bs.modal.sm', function (event) {
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
