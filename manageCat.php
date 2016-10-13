<?php include('connect.php');
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

		   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Categry
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-5">

						<table class="table table-bordered table-hover table-striped">
						<form action="PHP/catsave.php" method="POST" >
						<tr>
						<th><label> New Category: </label></th>
						<th><input type="text" class="form-control " style="width:380px; height:30px;" name="cat"></th>
						</tr>

						</table>

						<input type="submit" class="btn btn-block btn-success fa fa-floppy-o" name="submit" value="SAVE">
						</form>
						 <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
									<tr>
										<th>Category</th>

									</tr>
								</thead>
                                        <tbody>
                                    <?php $getRes = mysql_query("SELECT * FROM category_tbl order by Category") or die(mysql_error());
                                    while ($row = mysql_fetch_assoc($getRes)){

                                     ?>

                                    <tr>

                                    <form method="post" action="">
                                        <td><?=$row['Category']?></td>

                                    </th>
                                    <th> <a title = "Delete"type="button" class="btn btn-xs btn-danger"  href="php/deleteCat.php?id=<?$row['catid']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button></th>
                                     <input type="hidden" name="delete" id="delete" value="<?php echo $row['catid']; ?>" />
                                        </tr
                                   
                                    </tr>
                                     </form>
                                            <?php
                                                    }
                                            ?>
                                </tbody>
                            </table>
                            </div>
                            </form>

                    </div>


                </div>


            </div>
            <!-- /.container-fluid -->




<?php include('include/footer.php'); ?>
