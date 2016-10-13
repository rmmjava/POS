<?php
    include('../data/db.php');
    $from = strtotime($from);
    $to = strtotime($to);
    $datefrom = date('m/d/y',$from);
    $dateto = date('m/d/y',$to);
    
    $q = "SELECT * FROM items WHERE (dateIn BETWEEN '$datefrom' AND '$dateto') order by dateIn desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3>
    REPORTS: ITEMS
    <a href="print.php?report=items&from=<?php echo $datefrom;?>&to=<?php echo $dateto;?>" target="_blank" class="btn btn-warning pull-right">View Full Report</a>
</h3>
<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Remarks</th>
            <th>Stock In</th>
            <th>Stock Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysql_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="6"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysql_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td class="text-center"><?php echo $row['qty']; ?></td>
                <td class="text-center"><?php echo $row['unit'].' '.$row['unitsign']; ?></td>
                <td class="text-center"><?php echo $row['remark']; ?></td>                
                <td class="text-center"><?php echo $row['dateIn']; ?></td>                
                <td class="text-center"><?php echo $row['dateUpdated']; ?></td>                
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>