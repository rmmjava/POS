<?php
    include('../data/db.php');
    $from = strtotime($from);
    $to = strtotime($to);
    $datefrom = date('m/d/y',$from);
    $dateto = date('m/d/y',$to);
    
    $q = "SELECT * FROM supplier WHERE (dateCreated BETWEEN '$datefrom' AND '$dateto') order by dateCreated desc";
    
    $result = mysql_query($q) or die('unable to query');
    
?>
<h3>
    REPORTS: SUPPLIERS
    <a href="print.php?report=suppliers&from=<?php echo $datefrom;?>&to=<?php echo $dateto;?>" target="_blank" class="btn btn-warning pull-right">View Full Report</a>
</h3>
<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Supplier Name</th>
            <th>Company</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysql_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="5"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysql_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td class="text-center"><?php echo $row['company']; ?></td>
                <td class="text-center"><?php echo $row['contact']; ?></td>
                <td class="text-center"><?php echo $row['email']; ?></td>                
                <td class="text-center"><?php echo $row['address']; ?></td>                
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>