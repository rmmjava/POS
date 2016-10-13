<?php

    $q = "SELECT * FROM chemicals WHERE (dateIn BETWEEN '$datefrom' AND '$dateto') order by dateIn desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3 class="text-center">
    INVENTORY REPORT<br />CHEMICALS<br />
    <small class="text-center text-muted">Date Range: <?php echo $datefrom; ?> to <?php echo $dateto; ?></small>
</h3>

<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">Chemical Name</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Unit</th>
            <th class="text-center">Stock In</th>
            <th class="text-center">Created By</th>
            <th class="text-center">Stock Updated</th>
            <th class="text-center">Updated By</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysql_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="5"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysql_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td class="text-center"><?php echo $row['qty']; ?></td>
                <td class="text-center"><?php echo $row['unit'].' grams'; ?></td>
                <td class="text-center"><?php echo $row['dateIn']; ?></td>                
                <td class="text-center"><?php echo $row['createdBy']; ?></td>                
                <td class="text-center"><?php echo $row['dateUpdated']; ?></td>                
                <td class="text-center"><?php echo $row['updatedBy']; ?></td>                
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>