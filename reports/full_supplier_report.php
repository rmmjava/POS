<?php

    $q = "SELECT * FROM supplier WHERE (dateCreated BETWEEN '$datefrom' AND '$dateto') order by dateCreated desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3 class="text-center">
    INVENTORY REPORT<br />SUPPLIERS<br />
    <small class="text-center text-muted">Date Range: <?php echo $datefrom; ?> to <?php echo $dateto; ?></small>
</h3>

<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">Supplier Name</th>
            <th class="text-center">Company</th>
            <th class="text-center">Contact</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            <th class="text-center">Created</th>
            <th class="text-center">Created By</th>
            <th class="text-center">Updated</th>
            <th class="text-center">Updated By</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysql_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="5"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysql_fetch_array($result)): ?>
            <tr>
                <td class="text-center"><?php echo $row['name']; ?></td>
                <td class="text-center"><?php echo $row['company']; ?></td>
                <td class="text-center"><?php echo $row['contact']; ?></td>
                <td class="text-center"><?php echo $row['email']; ?></td>                
                <td class="text-center"><?php echo $row['address']; ?></td>                
                <td class="text-center"><?php echo $row['dateCreated']; ?></td>                
                <td class="text-center"><?php echo $row['createdBy']; ?></td>                
                <td class="text-center"><?php echo $row['dateUpdated']; ?></td>                
                <td class="text-center"><?php echo $row['updatedBy']; ?></td>                
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>