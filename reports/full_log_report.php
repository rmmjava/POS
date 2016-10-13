<?php

    $q = "SELECT * FROM logs WHERE (date BETWEEN '$datefrom' AND '$dateto') order by date desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3 class="text-center">
    INVENTORY REPORT<br />LOGS<br />
    <small class="text-center text-muted">Date Range: <?php echo $datefrom; ?> to <?php echo $dateto; ?></small>
</h3>

<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">Operator</th>
            <th class="text-center">Transactions</th>
            <th class="text-center">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysql_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="3"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysql_fetch_array($result)): ?>
            <tr>
                <td class="text-center"><?php echo $row['user']; ?></td>
                <td><?php echo $row['operation']; ?></td>
                <td class="text-center"><?php echo $row['date']; ?></td>                              
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>