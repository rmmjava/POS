<?php
    
    $p = isset($_GET['p']) ? $_GET['p']:'error';
    
    $datauser = new User_data();
    
    $datauser->$p();   
    class User_data {
        
        function logs($operation){    
            include('connect.php');            
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }
   
        function adduser(){
            include('connect.php');
                    $staffID = mysql_real_escape_string($_POST['ayd']);
                    $fname = mysql_real_escape_string($_POST['fname']);
                     $lname = mysql_real_escape_string($_POST['lname']);
                    $address = mysql_real_escape_string($_POST['address']);
                    $contact = mysql_real_escape_string($_POST['contact']);            
                    $date = date('m/d/Y H:i');
            $q = "INSERT INTO staff VALUES('','{$staffID}','{$fname}','{$lname}','{$contact}','{$address}','{$date}','')";
          mysql_query($q);
         
          $op = "added $fname $lastname";
            $this->logs($op);
            header("Location:../sales/staffayd.php?oldayd={$staffID}&msg=del");
            //$op = "added $quantity item ($pro_name)";
          //  $this->logs($op);
        //    header("Location:../inventory.php?cat=item&&msg=added");
        }
        
        
        function updateuser(){
           $staffID = mysql_real_escape_string($_POST['ayd']);
                    $fname = mysql_real_escape_string($_POST['fname']);
                     $lname = mysql_real_escape_string($_POST['lname']);
                    $address = mysql_real_escape_string($_POST['address']);
                    $contact = mysql_real_escape_string($_POST['contact']);            
                    $date = date('m/d/Y H:i');

           $q = "UPDATE staff set Staff_ID='$staffID', FName='$fname',  LName='$lname', Contact='$contact', Address='$address', date='$date' where staffID='$staffID'";
                    mysql_query($q);
            $op = "updated $fname $lname";
            $this->logs($op);
            header("Location:../success.php?cat=user&&msg=updated"); 
        }
        
        function getusers(){            
           $q = "select * from staff order by fname asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getuserbyid($id){
            
            $q = "select * from staff where Staff_ID=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchuser(){
            include('include/connect.php');
            
            $search = $_POST['search'];
            $q = "SELECT * FROM userdata where fname like '%$search%' or lname like '%$search%' or username like '%$search%' order by fname asc";
            $result = mysql_query($q);
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            while($row = mysql_fetch_array($result)):
               echo ' <tr>
                    <td class="text-center"><a href="edituserdata.php?id='.$row['id'].'">'.$row['fname'].'</a></td>
                    <td class="text-center">'.$row['lname'].'</td>
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