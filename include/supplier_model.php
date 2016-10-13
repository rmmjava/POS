<?php
    
    $p = isset($_GET['p']) ? $_GET['p']:'error';
    
    $datasupplier = new Supplier_data();
    
    $datasupplier->$p();   
    class Supplier_data {
        
        function logs($operation){    
            include('connect.php');            
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }
        
        function addsupplier(){
            include('connect.php');
            $name = $_POST['name'];
            $contactp = $_POST['contactp'];
            $contactn = $_POST['contactn'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $date = date('m/d/Y H:i');
            $createdBy = $_SESSION['fullname'];
            echo $q = "insert into suplier values(null,'$name','$address','$contactn','$contactp','$email','$date','','$createdBy','')";
            mysql_query($q);
            $op = "added $qty supplier ($name)";
            $this->logs($op);
            header("Location:supplier.php?cat=supplier&&msg=added");
        }
        
        function updatesupplier(){
            include('db.php');
            $name = $_POST['name'];
            $company = $_POST['company'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];        
            $id = $_GET['id'];

            echo $q = "UPDATE suplier set name='$name', company='$company', contact='$contact', email='$email', address='$address', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";

            mysql_query($q);
            $op = "updated suplier ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=supplier&&msg=updated"); 
        }
        
        function getsuppliers(){            
           $q = "select * from suplier order by supplier_name asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getsupplierbyid($id){
            
            $q = "select * from suplier where id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchsupplier(){
            include('connect.php');
            
            $search = $_POST['search'];
            $q = "SELECT * FROM suplier where supplier_name like '%$search%' or contactp like '%$search%' order by suppleir_name asc";
            $result = mysql_query($q);
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysql_fetch_array($result)):
                echo '
                    <tr>
                        <td><a href="editsupplier.php?id='.$row['id'].'">'.$row['name'].'</a></td>
                        <td class="text-center">'.$row['company'].'</td>
                        <td class="text-center">'.$row['contact'].'</td>
                        <td class="text-center">'.$row['email'].'</td>

                    </tr>
            ';
            
            endwhile;
        }

        function error(){
            //header("location:index.php");   
        }
    }
?>