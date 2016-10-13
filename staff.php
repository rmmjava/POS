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
                            Staff Record
                        </h1>

                    </div>
                    <div class="col-lg-2">
                      <button type="button"  style="margin-top:20px;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Staff </button>


                    </div>
                </div>
                <!-- /.row -->
             <?php if(isset($_GET['msg'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                          <?php
                          if($_GET['msg']=="updated"){
                            echo "<b>Staff successfully updated!</b>";
                          }
                          if($_GET['msg']=="del"){
                            echo "<b>Staff successfully delete!</b>";
                          }
                          if($_GET['msg']=="added"){
                            echo "<b>Staff successfully added!</b>";
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
                                  <h3 class="modal-title"><center>Add Staff</center></h3>
                                </div>
                               
                                 <form action="include/staff_model.php?p=adduser" method="POST" >
                                <div class="modal-body">
                                    <div class="table-responsive">
                                      <table class="table table-hover">
                                            <tr>
                                            
                                            <td><label> Staff ID : </label></td>
                                            <td><input type="text" class="form-control" style="width:265px; height:30px;" name="empID" value="<?=$_SESSION['staffayd']?>" readonly></td>
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
                                       <input name='ayd' id="inputlg" type="hidden" value="<?=$_SESSION['staffayd']?>">
                                </div>
                                  </form>
                              </div>
                            
                            </div>
                          </div>
                          
                        </div>

						<!-- end modal -->
              <div class="modal fade" id="editStaff" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <form role ="form"action="PHP/savestaff.php" method="POST">
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><h3><center> Edit Staff </center></h3>
                </div>

                <div class="modal-body">
                  <table class="table table-hover">
                   <?php
                        $getRes = mysql_query("SELECT * FROM staff WHERE Staff_ID='{$_GET['edit']}'") or die(mysql_error());

                        while ($row = mysql_fetch_assoc($getRes)) {
                          $sn=$row['Staff_ID'];
                          $sa=$row['FName'];
                          $sc=$row['LName'];
                          $cp=$row['Contact'];
                          $em=$row['Address'];
                        }
                        ?>
                     
                     <input type="hidden" class="form-control"  name="empID" value="<?=$sn?>"readonly>
                     
                      <tr>

                      <td><label> First Name : </label></td>
                      <td><input type="text" class="form-control"  name="fname" value="<?=$sa?>"></td>
                      </tr>
                      <tr>
                      <td><label> Last Name : </label></td>
                      <td><input type="text" class="form-control"  name="lname" value="<?=$sc?>"></td>
                      </tr>
                      <tr>
                        <td><label> Contact No. : </label></td>
                        <td><input type="text" class="form-control" name="contact" value="<?=$cp?>"></td>
                      </tr>
                      <tr>
                        <td><label> Address : </label></td>
                        <td><input type="" class="form-control" name="address" value="<?=$em?>"/></td>
                      </tr>
                
                    </table>
                  </div>
                  <div class="modal-footer ">
                  <input type="submit" class="btn btn-block btn-success"  name ="UPDATE" value = "Save"><i class="" aria-hidden="true"></i>
                </div>
                </div>
                
                </form>
                </div>

              </div>
              </div>



                                    <?php $getRes = mysql_query("SELECT * FROM staff where staffflag = '0' order  by Staff_ID") or die(mysql_error());
                                    $ctr=0;
                                    $content="";
                                           $ayd = $row['Staff_ID'];
                                       $_SESSION['id'] = $row['Staff_ID'];
                                    while ($row = mysql_fetch_assoc($getRes)) {

                                      if($ctr==0){
                                        $content=$content."{sn:'".$row['Staff_ID']."',em:'".$row['FName']."',cp:'".$row['LName']."',sc:'".$row['Contact']."'
                                          ,sa:'".$row['Address']."'}";
                                      }else{
                                        $content=$content.",{sn:'".$row['Staff_ID']."',em:'".$row['FName']."',cp:'".$row['LName']."',sc:'".$row['Contact']."'
                                          ,sa:'".$row['Address']."'}";

                                      }
                                      $ctr++;


                                                    }
                                            ?>





                        <a href="#" class='record_count'>Records <span class="badge"></span></a>
                        <span id="found" class="label label-info" ></span>
                        <table id="stream_table" class='table table-bordered'>
                        <thead style="font-weight:bolder;">
                              <tr>
                    <th>Staff ID</th>
                    <th> Name </th>
                    <th> Contact No. </th>
                    <th> Address </th>
                    <th width="80px" > Action</th>
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
    <td>{{record.em}} {{record.cp}}</td>
    <td>{{record.sc}}</td>
    <td>{{record.sa}}</td>
     


    <td>
      <a  href ="staff.php?edit={{record.sn}}" title ="Edit" type="button" class="" data-toggle="modal"><i class="fa fa-pencil-square-o  fa-lg" aria-hidden="true" style=""></i></a>
      <a href="PHP/delstaff.php?id={{record.sn}}" title = "Delete"type="button" class="" ><i onClick="confirm('Are you sure you want to delete this user?')" class="fa fa-archive fa-lg" aria-hidden="true" style="color:red;"></i></a>
      
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

