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
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Service
                        </h1>

                    </div>
                    <div class="col-lg-2">

                          <button type="button"  style="margin-top:40px;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Service </button>


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




						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->
                              <form role ="form"action="include/servicefunction.php?p=addservice" method="POST">



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
											<td><input type="text" class="form-control" name="service_id" value="<?php echo $finalcodeSE; ?>" readonly required></td>
											</tr>
											<tr>
											<div class="form-group">
												<td><label>Description</label></td>
												<td><textarea class="form-control"  name="description" rows="3"></textarea></td>
											</div>
											</tr>
											<tr>
												<td><label> Customer : </label></td>
												<td><input type="text" class="form-control" name="customer"></td>
											</tr>
											<tr>
												<td><label> Contact No. : </label></td>
												<td><input type="text" class="form-control"  name="contact"></td>
											</tr>


										</table>


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

            <div class="modal fade" id="editService" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
                            <form role ="form"action="include/servicefunction.php?p=addservice" method="POST">



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
                    <td><input type="text" class="form-control" name="service_id" value="<?php echo $finalcodeSE; ?>" readonly required></td>
                    </tr>
                    <tr>
                    <div class="form-group">
                      <td><label>Description</label></td>
                      <td><textarea class="form-control"  name="description" rows="3"></textarea></td>
                    </div>
                    </tr>
                    <tr>
                      <td><label> Customer : </label></td>
                      <td><input type="text" class="form-control" name="customer" readonly></td>
                    </tr>
                    <tr>
                      <td><label> Contact No. : </label></td>
                      <td><input type="text" class="form-control"  name="contact"></td>
                    </tr>


                  </table>


              </div>
              <div class="modal-footer ">
                    <input type="submit" class="btn btn-block btn-success fa fa-floppy-o" name="submit" value="Save">
              </div>
                              </form>
              </div>

            </div>
            </div>

          </div>

                         <?php $service = $dataservice->getservice(); ?>
                                        <?php if(mysql_num_rows($service)==0): ?>
                                            <tr><td class="text-danger text-center" colspan="6"><strong>***EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php
                                        $ctr=0;
                                        $content="";
                                        while($row = mysql_fetch_array($service)):

                                          if($ctr==0){
                                            $content=$content."{ctr:'".$row['service_id']."',des:'".$row['description']."',cus:'".$row['customer']."',cont:'".$row['contact']."',stat:'".$row['status']."',}";
                                          }else{
                                            $content=$content.",{ctr:'".$row['service_id']."',des:'".$row['description']."',cus:'".$row['customer']."',cont:'".$row['contact']."',stat:'".$row['status']."',}";

                                          }
                                          $ctr++;

                                           ?>


                                           <?php endwhile; ?>



                        <a href="#" class='record_count'>Records <span class="badge"></span></a>
                        <span id="found" class="label label-info" ></span>
                        <table id="stream_table" class='table table-bordered'>
                        <thead style="font-weight:bolder;">
                          <tr>
                            <th> Service ID </th>
        										<th> Description </th>
        										<th> Customer </th>
        										<th> Contact No. </th>
        										<th> Status </th>
        										<th width="90px"> Action</th>
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
    <td>{{record.ctr}}</td>
    <td>{{record.des}}</td>
    <td>{{record.cus}}</td>
    <td>{{record.cont}}</td>
    <td>{{record.stat}}</td>


    <td>
    <a title = "Edit" type="button"  class="" data-toggle="modal" data-target="#editService"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> </a>
    <a title = "Archive" type="button" class="" href = "include/servicefunction.php?p=archiveitem&id={{record.ctr}}"><i class="fa fa-archive fa-lg" style="color:red;"aria-hidden="true"></i></a>
    <a title = "Payout" type="button"  class="" data-toggle="modal" data-target="#editService"><i class="fa fa-money fa-lg" aria-hidden="true" style="color:green;"></i> </a>
</td>


  </tr>
</script>


<?php if(isset($_GET['edit'])){
  ?>
<script type="text/javascript">
$( document ).ready(function() {
   $('#editStaff').modal('show');
  $('#editStaff').on('show.bs.modal.sm', function (event) {
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


