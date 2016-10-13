<?php   
    include('db.php');    
    $data = new Data();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'verifylogin'){
        $data->verifylogin();
    }else if($p == 'delete'){
        $data->delete();   
    }else if($p == 'verifykey'){
        $data->verifykey();   
    }else if($p == 'verifyusername'){
        $data->verifyusername();   
    }
   
    class Data{
        
        function logs($operation){
            $user = isset($_SESSION['fullname']) ? $_SESSION['fullname']: 'System';
            $date = date('m/d/Y h:i A');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }
        function verifylogin(){
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            
            $q = "select * from userdata where username='$username' and password='$password'";
            $r = mysql_query($q);
           if($row = mysql_fetch_array($r)){
                echo '1';
                $_SESSION['login'] = 'yes';
                $_SESSION['fullname'] = $row['fname'].' '.$row['lname'];
                $_SESSION['key'] = 'admin';
                $op = 'logged in';
           }else{
                $op = 'someone wants to login but failed';   
           }
            
            $this->logs($op);
        }   
        
        function delete(){
            $id = $_GET['id'];
            $table = $_GET['table'];
            mysql_query("delete from $table where id=$id");
            $op = "deleted 1 data in $table";
            $this->logs($op);
            header("Location:../$table.php?q=deleted&cat=");
        }
        
        function verifykey(){
            $key = $_POST['key'];
            if($key == $_SESSION['key']){
                echo '1';   
            }else{
                echo '2';   
            }
        }
        
        function verifyusername(){
            $username = $_POST['username'];
            $q = "select * from userdata where username='$username'";
            $r = mysql_query($q);
            echo mysql_num_rows($r);
        }
                
    }
?>