<?php include('connect.php');
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

		   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Register
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
						
						<table class="table table-bordered table-hover table-striped">
						<tr>
						<th><label> Username : </label></th> 
						<th><input type="text" class="form-control" style="width:380px; height:30px;" name="supname"></th>
						</tr>
						<tr>
						<th><label> Password : </label></th> 
						<th><input type="password" class="form-control " style="width:380px; height:30px;" name="supname"></th>
						</tr>
						<tr>
						<th><label> Re-type Password : </label></th> 
						<th><input type="password" class="form-control " style="width:380px; height:30px;" name="supname"></th>
						</tr>
						
						</table>
						
						<input type="submit" class="btn btn-block btn-success fa fa-floppy-o" name="submit" value="SAVE">
								
						
                        
                    </div>
					
					
                    
                </div>
                

            </div>
            <!-- /.container-fluid -->




<?php include('include/footer.php'); ?>
