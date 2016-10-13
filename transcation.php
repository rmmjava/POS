<?php include('connect.php');
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Transcation Record
                        </h1>

                    </div>

                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

						<div class="container">

						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->
                              <form role ="form"action="PHP/savesupplier.php" method="POST">



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
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="supname"></td>
											</tr>
											<tr>
											<td><label> Supplier E-mail : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="email"></td>
											</tr>
											<tr>
											<td><label> Contact Person : </label></td>
											<td><input type="text" class="form-control" style="width:265px; height:30px;" name="conperson"></td>
											</tr>
											<tr>
												<td><label> Contact No. : </label></td>
												<td><input type="text" class="form-control" style="width:265px; height:30px;" name="contact"></td>
											</tr>
											<tr>
												<td><label> Address : </label></td>
												<td><input type="" class="form-control" style="width:265px; height:30px;" name="address" /></td>
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


                                    <?php $getRes = mysql_query("SELECT * FROM `ztbltransactions`  order by transDate") or die(mysql_error());
                                    $ctr=0;
                                    $content="";
                                    while ($row = mysql_fetch_assoc($getRes)) {
                                      if($row['client']==''){
                                        $cl='WALKIN';
                                      }else{
                                        $cl=$row['client'];
                                      }
                                      if($ctr==0){
                                        $content=$content."{tID:'".$row['transID']."',cl:'".$cl."',sa:'".$row['saleAmount']."',ten:'".$row['Tendered']."'
                                          ,ch:'".$row['chAmt']."',ti:'".$row['totalItems']."',td:'".$row['transDate']."'}";
                                      }else{
                                        $content=$content.",{tID:'".$row['transID']."',cl:'".$cl."',sa:'".$row['saleAmount']."',ten:'".$row['Tendered']."'
                                          ,ch:'".$row['chAmt']."',ti:'".$row['totalItems']."',td:'".$row['transDate']."'}";

                                      }
                                      $ctr++;


                                                    }
                                            ?>





                        <a href="#" class='record_count'>Records <span class="badge"></span></a>
                        <span id="found" class="label label-info" ></span>
                        <table id="stream_table" class='table table-bordered'>
                        <thead style="font-weight:bolder;">
                          <tr>
                            <th> Transaction ID </th>
        										<th>Client</th>
        										<th>Sale Amount</th>

        										<th>Tendered</th>
        										<th>Change</th>
                            	<th>Total Items</th>
                            <th>DATE</th>
        										<th width="120px"> Action</th>
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
  <tr>
    <td>{{record.tID}}</td>
    <td>{{record.cl}}</td>
    <td>{{record.sa}}</td>
    <td>{{record.ten}}</td>
    <td>{{record.ch}}</td>
    <td>{{record.ti}}</td>
    <td>{{record.td}}</td>



    <td>
      <a  title = "Print Receipt" type="button" class="btn btn-xs btn-info" onclick="AddFriends('{{record.tID}}');"><i class="fa fa-print" aria-hidden="true" ></i> Receipt</a>


</td>


  </tr>
</script>


<script language="JavaScript">
function AddFriends(laman)
{

win1 = window.open('Receipt.php?trans='+laman, 'newwindow', config='height=580, width=950, left=10, top=60, toolbar=no, scrollbars=yes, resizable=yes');
win1.focus();
}
</SCRIPT>
