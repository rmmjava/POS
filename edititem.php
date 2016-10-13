<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php 
    include('data/item.php');    
    include('data/getsupplier.php');    
    $dataitem = new Itemdata();
?>         
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Item
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li><a href="items.php">Item</a></li>
                            <li class="active">Edit Item</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-content">                              
                        <?php $id = $_GET['id']; ?>
                        <?php $item = $dataitem->getitembyid($id); ?>
                        <?php while($row = mysql_fetch_array($item)): ?>
                        <form action="data/item.php?p=updateitem&id=<?php echo $id;?>" enctype="multipart/form-data" method="POST">
                        <div class="modal-body">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Item Name</span>
                                <input type="text" autofocus name="name" class="form-control" value="<?php echo $row['name'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="ckeditor" name="description"><?php echo $row['description'];?></textarea>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Quantity</span>
                                <input type="number" min="0" name="qty" value="<?php echo $row['qty'];?>" class="form-control"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Units</span>
                                <input type="number" min="0" name="unit" value="<?php echo $row['unit'];?>" class="form-control"/>
                                <span class="input-group-addon">
                                    
                                    <select name="unitsign">
                                        <option <?php  if($row['unitsign'] == 'Pcs') echo "selected"?>>Pcs.</option>
                                        <option <?php  if($row['unitsign'] == 'Box') echo "selected"?>>Box</option>
                                    </select>
                                </span>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Remarks</span>
                                <select name="remarks" class="form-control">
                                    <option <?php  if($row['remark'] == 'Functional') echo "selected"?>>Functional</option>
                                    <option <?php  if($row['remark'] == 'Not Functional') echo "selected"?>>Not Functional</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Supplier</span>
                                <select name="supplier" class="form-control">
                                    <?php while($r = mysql_fetch_array($getsupplier)): ?>
                                        <?php $select = ($r['name']==$row['supplier']) ? "selected=selected" : null; ?>
                                        <option <?php echo $select; ?>><?php echo $r['name'];?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <input type="file" name="image">
                            </div>
                            <div class="col-sm-6">
                                
                                <img src="<?php echo 'upload/'.$row['image']; ?>" class="img-responsive">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="items.php">Cancel</a>
                            <a href="data/data.php?p=delete&table=items&id=<?php echo $row['id'];?>" class="confirmation btn btn-danger">Delete</i></a>
                            <input type="submit" value="Update" class="btn btn-success">                
                        </div>
                        </form>
                        <?php endwhile; ?>
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

<?php include('include/footer.php'); ?>
