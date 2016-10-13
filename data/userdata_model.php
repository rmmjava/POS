<?php
    
    $p = isset($_GET['p']) ? $_GET['p']:'error';
    
    $datauser = new User_data();
    
    $datauser->$p();   
    class User_data {
        
        function logs($operation){    
            include('db.php');            
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }
        
        function adduser(){
            include('db.php');
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $date = date('m/d/Y H:i');
            echo $q = "insert into staff values(null,null,'$fname','$lname','$contact','$address','$date','')";
            mysql_query($q);
            $op = "added $fname $lastname";
            $this->logs($op);
            header("Location:../success.php?cat=user&&msg=added");
        }
        
        function updateuser(){
            include('db.php');
             $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $date = date('m/d/Y H:i');      
            $id = $_GET['id'];

            echo $q = "UPDATE userdata set fname='$fname',lname='$lname',username='$username',password='$password', contact='$contact', email='$email', address='$address', dateUpdated='$date' where id=$id";

            mysql_query($q);
            $op = "updated $fname $lname";
            $this->logs($op);
            header("Location:../success.php?cat=user&&msg=updated"); 
        }
        
        function getusers(){            
           $q = "select * from staff order by FName asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getuserbyid($id){
            
            $q = "select * from staff where id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchuser(){
            include('db.php');
            
            $search = $_POST['search'];
            $q = "SELECT * FROM staff where fname like '%$search%' or lname like '%$search%' or username like '%$search%' order by fname asc";
            $result = mysql_query($q);
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            while($row = mysql_fetch_array($result)):
               echo ' <tr>
                    <td class="text-center"><a href="edituserdata.php?id='.$row['id'].'">'.$row['fname'].'</a></td>
                    <td class="text-center">'.$row['Lname'].'</td>
                    <td class="text-center">'.$row['username'].'</td>
                    <td class="text-center">'.$row['contact'].'</td>
                    <td class="text-center">'.$row['email'].'</td>                                                
                </tr>';
            endwhile;
        }

        function error(){
            //header("location:index.php");   
        }
    }
?>