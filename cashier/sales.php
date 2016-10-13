<?php include('../connect.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/sidebar.php'); ?>

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
$finalcode='RS-'.createRandomPassword();
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Sales 
                        </h1>
                        
                    </div>
                </div>

				<!--Hanngang dito-->
				
                
                <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
					<div class="col-lg-7">
						<div class="form-group">
						<form action="PHP/additem.php" method="post" >                                        
							<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
							<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
							<select name="pd1" class="form-control" required>
								<option>Select Product</option>
									<?php 
										$sql = 'Select * From product_tbl';
										$ss = mysql_query($sql);
										while($row=mysql_fetch_array($ss)){
										$ex = $row[0]." ".$row[2];
										echo "<option id={$ex} name={$ex} value={$ex}>{$row[2]} {$row[3]}</option>";
										}
										?>
							</select>
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
							<th> Category </th>
							<th> Price </th>
							<th> Qty </th>
							<th> Amount </th>
						
							<th> Action </th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql2 = ("SELECT * FROM sales_order") or die(mysql_error());
					$ss2 = mysql_query($sql2);
					while($row2=mysql_fetch_array($ss2)){
					echo "<tr><td>{$row2[0]}</td>
					<td>{$row2[1]}</td>
					<td>{$row2[2]}</td><td>{$row2[3]}</td>
					<td>{$row2[4]}</td>
					<td><a href='del1.php?id={$row2[0]}'>[X]</a></td>
					</tr>";
					}
					?>
			<tr>
				<th> </th>
				<th>  </th>
				<th>  </th>
				<th>  </th>
				<th>  </th>
				<td>  </td>
		
				<th> 
				<button type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</th>
			</tr>
           
        
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
								<div>
								<label>Discount</label>
								</div>
								
								<div>
								<tr>
                                    <th width="50%"><label> Total Amount : </label></th>
									
								
								</tr>
								<tr>
									<th width="50%">₱ 0.00</th>
									
								</tr>
								</div>
							</table>
								<div>
								<label> Add Payment </label><br>
								<button type="button" class="btn btn-sm btn-default">Cash</button>
								<button type="button" class="btn btn-sm btn-default">Check</button>
								</div><br>
								<div class="form-group input-group">
                                <input type="text" class="form-control" placeholder="₱ 0.00" style="height:50px;">
                                <span class="input-group-addon"><a href="#"><i class="fa fa-money" aria-hidden="true"></i> Complete Sale </a></span>
								</div>
							
								
								
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
								
						</div>
		</div>
                               

                                
                    
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
<?php include('../include/footer.php'); ?>