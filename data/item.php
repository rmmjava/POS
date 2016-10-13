<?php
    
    $p = isset($_GET['p']) ? $_GET['p']:'error';
    
    $dataitem = new Itemdata();
    
    $dataitem->$p();   
    class Itemdata {
        
        function logs($operation){    
            include('db.php');            
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }
        
        function additem(){
            include('db.php');
            $name = $_POST['name'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unit = $_POST['unit'];
            $unitsign = $_POST['unitsign'];
            $remarks = $_POST['remarks'];
            $supplier = $_POST['supplier'];
            $image = $name.'-'.$_FILES["image"]["name"];
            $date = date('m/d/Y H:i');
            $createdBy = $_SESSION['fullname'];
            $image_size= getimagesize($_FILES['image']['tmp_name']);
            if ($image_size==FALSE) {
                $image = 'default.jpg';
            }else{
                move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $image);
            }
            echo $q = "insert into product_tbl values(null,'$name','$description','$qty','$unit','$unitsign','$remarks','$image','$supplier','$date','','$createdBy','')";
            mysql_query($q);
            $op = "added $qty product_tbl ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=item&&msg=added");
        }
        
        function updateitem(){
            include('db.php');
            $name = $_POST['name'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unit = $_POST['unit'];
            $unitsign = $_POST['unitsign'];
            $remarks = $_POST['remarks'];
            $supplier = $_POST['supplier'];
            $image = $name.'-'.$_FILES["image"]["name"];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            $image_size= getimagesize($_FILES['image']['tmp_name']);            
            $id = $_GET['id'];
            if($image == $name.'-'){
                $q = "UPDATE product_tbl set name='$name', description='$description', qty='$qty', unit='$unit', unitsign='$unitsign', remark='$remarks', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";
            }else{
                if ($image_size==FALSE) {
                    $image = 'default.jpg';
                }else{
                    move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" .$image);   
                }
                $q = "UPDATE items set name='$name', description='$description', qty='$qty', unit='$unit', unitsign='$unitsign', remark='$remarks',image='$image', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";
            }
           
            mysql_query($q);
            $op = "updated $qty item ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=item&&msg=updated"); 
        }
        function getitems(){            
           $q = "select * from product_tbl order by Product_Name asc";
            $result = mysql_query($q);
            return $result;
        }
        
        function getitembyid($id){
            
            $q = "select * from product_tbl where id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchitem(){
            include('db.php');
            
            $search = $_POST['search'];
            $q = "SELECT * FROM product_tbl where name like '%$search%' order by Product_Name asc";
            $result = mysql_query($q);
            
            if(mysql_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysql_fetch_array($result)):
            if($row['remark']=='Functional'){
                $class = "fa fa-thumbs-o-up fa-lg text-success";
                $op = 'disable';
            }else{
                $class = "fa fa-thumbs-o-down fa-lg text-danger";
                $op = 'enable';
            }
            echo '  <tr>
                    <td><a href="edititem.php?id='.$row['id'].'">'.$row['name'].'</a></td>
                    <td class="text-center">
                        <a href="data/item.php?p=updateqty&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>&nbsp; 
                        '.$row['qty'].'
                        &nbsp;<a href="data/item.php?p=updateqty&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a></td>
                    <td class="text-center">
                        <a href="data/item.php?p=updateunit&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>
                        &nbsp; '.$row['unit'].' '.$row['unitsign'].' &nbsp;
                        <a href="data/item.php?p=updateunit&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a>
                        </td>
                        <td class="text-center">  
                        <a href="data/item.php?p=updateremark&op='.$op.'&id='.$row['id'].'"<i class="'.$class.'"></i>
                        </td>
                </tr>';
            endwhile;
        }
        
        function updateqty(){
            include('db.php');
            $id = $_GET['id'];
            $q = "select * from product_tbl where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'plus'){
                $qty = $row['qty'] + 1;
            }else{
                $qty = $row['qty'] - 1;
            }
            if($qty == -1){
                $qty = 0;   
            }
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            $initial = $row['qty'];
            mysql_query("Update product_tblproduct_tbl set qty='$qty', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated quantity from $initial to $qty of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=quantity");
        }
        
        function updateunit(){
            include('db.php');
            $id = $_GET['Product_ID'];
            $q = "select * from product_tbl where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'plus'){
                $unit = $row['unit'] + 1;
            }else{
                $unit = $row['unit'] - 1;
            }
            if($unit == -1){
                $unit = 0;   
            }
            $initial = $row['unit'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysql_query("Update product_tbl set unit='$unit',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated unit from $initial to $unit of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=unit");
        }
        
        function updateremark(){
            include('db.php');
            $id = $_GET['id'];
            $q = "select * from product_tbl where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'enable'){
                $remark = 'Functional';
            }else{
                $remark = 'Not Functional';
            }
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysql_query("Update product_tbl set remark='$remark',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated item to $remark of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=");
        }
        
        
        function error(){
            //header("location:index.php");   
        }
    }
?>