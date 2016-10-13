<?php
    include('include/connect.php');
    $q = "select * from supliers order by supplier_name asc";
    $getsupplier = mysql_query($q);
    $getsupplier2 = mysql_query($q);
?>