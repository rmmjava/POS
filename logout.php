 <!--<?php
    include('data/db.php');
    $user = $_SESSION['fullname'];
    $date = date('m/d/Y h:i A');
    $operation = 'logged out';
    $q = "insert into logs values(null,'$user','$operation','$date')";
    mysql_query($q);
    unset($_SESSION['login']);
    unset($_SESSION['fullname']);
    unset($_SESSION['key']);
    header('location:login.php');
?> -->
<?php
    session_start();
    include_once("connect.php");
                $logout = mysql_query("SELECT login_flag FROM acc_tbl LIMIT 1") or die(mysql_error($con));
                if(mysql_num_rows($logout) == 1){       
                        $row = mysql_fetch_assoc($logout);
                        $stat = $row['login_flag'];
                        $out = mysql_query("UPDATE acc_tbl SET login_flag = '0' LIMIT 1 ") or die(mysql_error($con));
                    
                    if($stat == '1'){
                        $out;
                        header("location:../index.php?status=Log out");
                    }
                }
?>