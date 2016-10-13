<?php
    include('../data/db.php');
    $from = strtotime($from);
    $to = strtotime($to);
    $datefrom = date('m/d/y',$from);
    $dateto = date('m/d/y',$to);
    
    $q = "SELECT * FROM logs WHERE (date BETWEEN '$datefrom' AND '$dateto') order by date desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3>
    REPORTS: LOGS
    <a href="print.php?report=logs&from=<?php echo $datefrom;?>&to=<?php echo $dateto;?>" target="_blank" class="btn btn-warning pull-right">View Full Report</a>
</h3>
<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Operator</th>
            <th>Transaction</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysql_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="3"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysql_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row['user']; ?></td>
                <td><?php echo $row['operation']; ?></td>
                <td class="text-center"><?php echo $row['date']; ?></td>               
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>