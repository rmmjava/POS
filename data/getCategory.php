<?php
    include('include/connect.php');
    $q = "select * from category_tbl order by Category asc";
    $getcat1 = mysql_query($q);
    $getcat2 = mysql_query($q);
?>