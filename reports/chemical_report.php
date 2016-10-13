<?php
    include('../data/db.php');
    $from = strtotime($from);
    $to = strtotime($to);
    $datefrom = date('m/d/y',$from);
    $dateto = date('m/d/y',$to);
    
    $q = "SELECT * FROM chemicals WHERE (dateIn BETWEEN '$datefrom' AND '$dateto') order by dateIn desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3>
    REPORTS: CHEMICALS
    <a href="print.php?report=chemicals&from=<?php echo $datefrom;?>&to=<?php echo $dateto;?>" target="_blank" class="btn btn-warning pull-right">View Full Report</a>
</h3>
<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Chemical Name</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Stock In</th>
            <th>Stock Updated</th>
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
                <td class="text-center"><?php echo $row['dateUpdated']; ?></td>                
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>