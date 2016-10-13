<?php

include('connect.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

<?php


$sql2 = ("SELECT *, SUM(prodQty) AS Qty FROM ztblpresales WHERE transID='{$_SESSION['transcode']}' GROUP BY prodCode") or die(mysql_error());
$ss2 = mysql_query($sql2);
$totAmt=0;
$tblcon="";
while($row2=mysql_fetch_array($ss2)){
  $tAmt=$row2['Qty']*$row2['sellAmount'];
  $totAmt+=$tAmt;
$tblcon .= "<tr><td>{$row2['prodCode']}</td>
<td>{$row2['prodDesc']}</td>

<td>{$row2['sellAmount']}</td>
<td>{$row2['Qty']}</td>
<td>{$tAmt}</td>
<td><a href='php/del1.php?id={$row2['salesID']}' type='button' class='btn btn-xs btn-danger'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
</tr>";
}
$totAmtnof=$totAmt;
$totAmt = number_format($totAmt, 2, '.', ',');
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="page-header">
                            Sales
                        </h1>

                    </div>
                    <div class="col-lg-4">
                      <div class="panel panel-green">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                  <div class="huge">₱</div>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge"><?=$totAmt?></div>
                                      <div>TOTAL AMOUNT</div>
                                  </div>
                              </div>
                          </div>
                          <a href="#">
                              <div class="panel-footer">
                                  <span class="pull-left">Invoice: <?=$_SESSION['transcode']?></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>

                      </div>

                    </div>
                </div>

				<!--Hanngang dito-->


                <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
					<div class="col-lg-7">
						<div class="form-group">
						<form action="sales/additem.php" method="post" >
							<input type="text" class="form-control" name="barcode" value="" autofocus="autofocus" />


						</div>
					</div>

					<div class="col-lg-1">
					<input type="number" class="form-control" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" />
					</div>
                    <div class="col-lg-4">
                        <input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
                        <!--<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />-->
						<Button type="submit" class="btn btn-primary btn-block" /><i class="fa fa-plus"></i> Add </button>

                    </form>
					</div>
				</div>
			</div>
			<div class="col-lg-8">

				<div class="table-responsive">
				<table class="table table-bordered" id="resultTable" data-responsive="table">
					<thead>
						<tr>
							<th> Serial number </th>
							<th> Product Name </th>
							<th> Price </th>
							<th> Qty </th>
							<th> Amount </th>

							<th> Action </th>
						</tr>
					</thead>
					<tbody>
					<?php
          echo $tblcon;
           ?>
</tbody>
</table>
</div>
</div>
		<div class="col-lg-4">
						<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" placeholder="Type customer name...">
								</div>

							</table>
								<div>
								<label> Add Payment </label><br>
								<button type="button" class="btn btn-default btn-lg btn-block" accesskey="F7" data-toggle="modal" data-target="#cash" ><i class="fa fa-money"></i> Cash</button>
						<!--		<button type="button" class="btn btn-default btn-lg" accesskey="F8" data-toggle="modal" data-target="#check" ><i class="fa fa-file-o fa-rotate-90"></i> Check</button> -->

              	</div><br>


						</div>
		</div>





                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

					<!-- CASH MODAL -->
						  <div class="modal fade" id="cash" role="dialog">
							<div class="modal-dialog">

							  <!-- Modal content-->

							  <div class="modal-content">
								<div class="modal-header">
                  <form method="POST" action="sales/paymentcash.php">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <div class="modal-title"><h3><center><B>TOTAL AMOUNT</B></center></h3>
									</div>
								<div class="modal-body">
                  <div class="panel panel-green">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                              <div class="huge">₱</div>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><?=$totAmt?></div>
                                  <div></div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left" ><h4>Amount Tender:</h4></span><span class="pull-right"><input name='amtender' class="form-control input-lg pull-left" id="inputlg" type="text"></span>
                              <input name='trans' id="inputlg" type="hidden" value="<?=$_SESSION['transcode']?>">
                              <input name='totAmtdaw'id="inputlg" type="hidden" value="<?=$totAmtnof?>">
                              <div class="clearfix"></div>
                          </div>
                      </a>

                  </div>

								</div>
								<div class="modal-footer ">
								      <input type="submit" class="btn btn-block btn-success fa fa-floppy-o" name="submit" value="OK">
								</div>
              </form>
							  </div>

							</div>
						  </div>
						</div>

						  <!-- END CASH MODAL -->

						  <!-- CHECK MODAL -->
						 <div class="modal fade" id="check" role="dialog">
							<div class="modal-dialog">


							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <div class="modal-title"><h3><center><B>TOTAL AMOUNT</B></center></h3>
									</div>
								<div class="modal-body">
<div class="panel panel-green">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                              <div class="huge">₱</div>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge"><?=$totAmt?></div>
                                  <div></div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left" ><h4>Amount Tender: </h4></span><span class="pull-right"><input name='amtender' class="form-control input-lg pull-left" id="inputlg" type="text"></span>
                              <input name='trans' id="inputlg" type="hidden" value="<?=$_SESSION['transcode']?>">
                              <input name='totAmtdaw'id="inputlg" type="hidden" value="<?=$totAmtnof?>">
                              <div class="clearfix"></div>
                          </div>
                      </a>

                  </div>
								<div class="modal-footer ">
								      <input type="submit" class="btn btn-block btn-success fa fa-floppy-o" name="submit" value="OK">
								</div>

							  </div>

							</div>
						  </div>
						</div>
          </div>

						  <!-- END CHECK MODAL -->

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">

                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">CHANGE:</h4>
                    </div>
                    <div class="modal-body">
                      <div class="panel panel-green">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                  <div class="huge">₱</div>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge"><?=number_format($_GET['chg'], 2, '.', ',')?></div>
                                      <div></div>
                                  </div>
                              </div>
                          </div>
                          <a href="#">

                          </a>

                      </div>



                      <div class="modal-footer ">

                            <button type="submit" class="btn btn-lg  btn-info fa fa-print" name="submit" value="PRINT" onClick='AddFriends()'> PRINT</button>
                      </div>
                    </div>



                    </div>

                  </div>
                  </form>
                </div>


                <div class="modal fade" id="NF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog" role="document">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"><b>WARNING!!!</b></h4>
                      </div>
                      <div class="modal-body">
                        <?php
                        if($_GET['stat']=="OutofStack"){
                            echo "<center><H3 style='color:red;'><b>OUT OF STOCK!!!</b></H3></center>";
                        }
                        if($_GET['stat']=="NotFound"){
                            echo "<center><H3 style='color:red;'><b>PRODUCT NOT FOUND!!!</b></H3></center>";
                        }
						           if($_GET['stat']=="lack"){
                            echo "<center><H3 style='color:red;'><b>Insufficient stocks!!!</b></H3></center>";
                        }
                        if($_GET['stat']=="insufficientfund"){
                            echo "<center><H3 style='color:red;'><b>Insufficient money!!!</b></H3></center>";
                        }
                         ?>

                      </div>
                    </div>

                    </div>

                  </div>
              </div>

<?php include('include/footer.php'); ?>

<?php if(isset($_GET['oldtrans'])){
  ?>
  <script type="text/javascript">
  $(document).ready(function() {
     $('#exampleModal').modal('show');
    $('#exampleModal').on('show.bs.modal.sm', function (event) {
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
 <?php if(isset($_GET['stat'])){
   ?>
   <script type="text/javascript">
   $( document ).ready(function() {
      $('#NF').modal('show');
     $('#NF').on('show.bs.modal.sm', function (event) {
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
  <script language="JavaScript">
  function AddFriends()
  {
     $('#exampleModal').modal('hide');
  win1 = window.open('Receipt.php?trans=<?=$_GET['oldtrans']?>', 'newwindow', config='height=580, width=950, left=10, top=60, toolbar=no, scrollbars=yes, resizable=yes')
  win1.focus();
  }
  </SCRIPT>
