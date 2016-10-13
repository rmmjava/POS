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
                 
                    $fname = mysql_real_escape_string($_POST['fname']);
                     $lname = mysql_real_escape_string($_POST['lname']);
                    $address = mysql_real_escape_string($_POST['address']);
                    $contact = mysql_real_escape_string($_POST['contact']);
                     $memberID = mysql_real_escape_string($_POST['ayd']);
                    $email = mysql_real_escape_string($_POST['email']);
                    $agency = mysql_real_escape_string($_POST['agency']);
                    $date = date('m/d/Y H:i');
            $q = "INSERT INTO customer VALUES('','{$fname}','{$lname}','{$address}','{$contact}','{$agency}','{$memberID}','{$email}','{$date}','')";
          mysql_query($q);
            $op = "added $fname $lastname";
            $this->logs($op);
            header("Location:../sales/customerayd.php?custayd={$memberID}");
           
            //$op = "added $quantity item ($pro_name)";
          //  $this->logs($op);
        //    header("Location:../inventory.php?cat=item&&msg=added");
        }
        
        
        function updateuser(){
             $fname = mysql_real_escape_string($_POST['fname']);
           $lname = mysql_real_escape_string($_POST['lname']);
            $address = mysql_real_escape_string($_POST['address']);
            $contact = mysql_real_escape_string($_POST['contact']);
            $memberID = mysql_real_escape_string($_POST['mID']);
             $email = mysql_real_escape_string($_POST['email']);
             $agency = mysql_real_escape_string($_POST['agency']);
             $date = date('m/d/Y H:i');
    

             $q = "UPDATE customer set customer_name='$fname',customer_Lname='$lname',contact='$contact',agency='$agency' ,email='$email', address='$address' where membership_number='$memberID'";

            mysql_query($q);
               
          $op = "updated $fname $lname";
           $this->logs($op);
            header("Location:../customer.php?cat=user&msg=updated"); 
        }
        
        function getusers(){            
           $q = "select * from userdata order by fname asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getuserbyid($id){
            
            $q = "select * from userdata where id=$id";
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