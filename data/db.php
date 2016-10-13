<?php
    session_start();
    date_default_timezone_set('Asia/Manila'); 

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mimbo_db';

    $con = mysql_connect($host,$user,$pass) or die('Unable to connect');
    mysql_select_db($db) or die('Unable to Select DB');
?>