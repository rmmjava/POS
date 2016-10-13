<?php

    $q = "SELECT * FROM items WHERE (dateIn BETWEEN '$datefrom' AND '$dateto') order by dateIn desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3 class="text-center">
    INVENTORY REPORT<br />ITEMS<br />
    <small class="text-center text-muted">Date Range: <?php echo $datefrom; ?> to <?php echo $dateto; ?></small>
</h3>

<hr />
<?php if(mysql_num_rows($result)==0): ?>
    <div class="alert alert-danger text-center"><strong>*** EMPTY ***</strong></div>
<?php endif; ?>
<?php while($row = mysql_fetch_array($result)): ?>
<div class="col-md-6">
    <img src="<?php echo 'upload/'.$row['image']; ?>" class="thumbnail pull-left" width="300" ?>
    
    <h4>Item Name: <strong><?php echo $row['name']; ?></strong></h4>
    <h5>Qty: <strong><?php echo $row['qty']; ?></strong></h5>
    <h5>Unit: <strong><?php echo $row['unit'].' '.$row['unitsign']; ?></strong></h5>
    <?php 
        if($row['remark'] == 'Functional'){
            $remark = 'Yes <i class="fa fa-thumbs-o-up fa-lg text-success"></i>';   
        }else{
            $remark = 'No <i class="fa fa-thumbs-o-down fa-lg text-danger"></i>';   
        }
    ?>
    <h5>Functional: <?php echo $remark;?></h5>    
    <div class="well"><strong>Description:</strong>: <br />
<?php echo $row['description']; ?></div>
    
    <h5>Supplier: <strong><?php echo $row['supplier']; ?></strong></h5>
    <h5>Stock In: <strong><?php echo $row['dateIn']; ?></strong></h5>
    <h5>Created By: <strong><?php echo $row['createdBy']; ?></strong></h5>
    <h5>Stock Updated: <strong><?php echo $row['dateUpdated']; ?></strong></h5>
    <h5>Updated By: <strong><?php echo $row['updatedBy']; ?></strong></h5>
    <hr />
</div>
<?php endwhile; ?>
<div class="clearfix"></div>