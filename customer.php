<?php include('connect.php');
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Customer Record
                        </h1>

                    </div>
                    <div class="col-lg-2">
                      <button type="button"  style="margin-top:20px;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer </button>


                    </div>
                </div>
                <!-- /.row -->

                      <?php if(isset($_GET['msg'])): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center alert alert-success">
                                              <?php
                                              if($_GET['msg']=="updated"){
                                                echo "<b>Customer successfully updated!</b>";
                                              }
                                              if($_GET['msg']=="del"){
                                                echo "<b>Customer successfully delete!</b>";
                                              }
                                              if($_GET['msg']=="added"){
                                                echo "<b>Customer successfully added!</b>";
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
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="mID" value="<?=$_SESSION['customerayd']?>" readonly></td>
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
                                      <input name='ayd' id="inputlg" type="hidden" value="<?=$_SESSION['customerayd']?>">
                                </div>
                                  </form>
                              </div>
                            
                            </div>
                          </div>
                          <div class="modal fade" id="editcustomer" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                    
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h3 class="modal-title"><center>Edit Customer</center></h3>
                                </div>
                               
                                 <form action="PHP/savecustomer.php" method="POST" >
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                           <?php
                                          $getRes = mysql_query("SELECT * FROM customer WHERE customer_id='{$_GET['edit']}'");
                                          while($row = mysql_fetch_array($getRes)){
                                            $mi =$row['membership_number'];
                                            $cn=$row['customer_name'];
                                            $cl=$row['customer_Lname'];
                                            $ca=$row['address'];
                                            $cc=$row['contact'];
                                            $ca=$row['agency'];
                                            $em=$row['email'];
                                     
                                          }

                                           ?>
                                           <tr>
                                            <td><label> Membershi ID : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="mID" value="<?=$mi?>" readonly></td>
                                            </tr>
                                            <tr>
                                            <td><label> First Name : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="fname" value="<?=$cn?>"></td>
                                            </tr>
                                            <tr>
                                            <td><label> Last Name : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="lname" value="<?=$cl?>"></td>
                                            </tr>

                                            <tr>
                                                <td><label> Address : </label></td>
                                                <td><input type="text" class="form-control" style="width:265px; height:30px;" name="address" value="<?=$ca?>"></td>
                                            </tr>
                                            <tr>
                                                <td><label> Company/ Agency: </label></td>
                                                <td><input type="text" class="form-control" style="width:265px; height:30px;" name="agency" value="<?=$cc?>"></td>
                                            </tr>
                                            <tr>
                                                <td><label> Contact No. : </label></td>
                                                <td><input type="inte" class="form-control" style="width:265px; height:30px;" name="contact" value="<?=$ca?>"></td>
                                            </tr>
                                                    <tr>
                                                <td><label> Email. : </label></td>
                                                <td><input type="email" class="form-control" style="width:265px; height:30px;" name="email" value="<?=$em?>"></td>
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

						<!-- end modal -->


                                    <?php $getRes = mysql_query("SELECT * FROM customer where customerflag = '0'order by customer_id") or die(mysql_error());
                                    $ctr=0;
                                    $content="";
                                       $ayd = $row['membership_number'];
                                       $_SESSION['id'] = $row['membership_number'];
                                    while ($row = mysql_fetch_assoc($getRes)) {

                                      if($ctr==0){
                                        $content=$content."{sn:'".$row['customer_name']."',ln:'".$row['customer_Lname']."',em:'".mysql_real_escape_string($row['email'])."',cp:'".$row['contact']."',sc:'".$row['address']."'
                                          ,cmi:'".$row['membership_number']."',ca:'".$row['agency']."',ci:'".$row['customer_id']."'}";
                                      }else{
                                        $content=$content.",{sn:'".$row['customer_name']."',ln:'".$row['customer_Lname']."',em:'".mysql_real_escape_string($row['email'])."',cp:'".$row['contact']."',sc:'".$row['address']."'
                                          ,cmi:'".$row['membership_number']."',ca:'".$row['agency']."',ci:'".$row['customer_id']."'}";

                                      }
                                      $ctr++;


                                                    }
                                            ?>





                        <a href="#" class='record_count'>Records <span class="badge"></span></a>
                        <span id="found" class="label label-info" ></span>
                        <table id="stream_table" class='table table-bordered'>
                        <thead style="font-weight:bolder;">
                          <tr>           
                                        <th> Membership ID</th>
                                        <th> Name </th>
                                        <th> Contact No. </th>
                                        <th> Address </th>
                                        <th> Company/ Agency </th>    
                                        <th> E-mail </th>
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
  <td>{{record.cmi}}</td>
    <td>{{record.sn}}  {{record.ln}}</td>
   
    <td>{{record.cp}}</td>
    <td>{{record.sc}}</td>
    
    <td>{{record.ca}}</td>
     <td>{{record.em}}</td>


    


    <td>
   
      <a  href="customer.php?edit={{record.ci}}" title = "Edit" type="button" class="" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" ></i></a>
      
      <a href="PHP/delcustomer.php?id={{record.cmi}}" title = "Delete"type="button" class=""><i onClick="confirm('Are you sure you want to delete this user?')" class="fa fa-trash-o fa-lg" aria-hidden="true" style="color:red;"></i></a>
     
</td>


  </tr>
</script>

<?php if(isset($_GET['edit'])){
  ?>
<script type="text/javascript">
$( document ).ready(function() {
   $('#editcustomer').modal('show');
  $('#editcustomer').on('show.bs.modal.sm', function (event) {
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
