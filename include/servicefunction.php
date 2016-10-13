<?php
    require 'connect.php';




 $p = isset($_GET['p']) ? $_GET['p']:'error';

    $dataservice = new servicedata();

    $dataservice->$p();
    class servicedata {

        function logs($operation){    
            include('connect.php');
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }

        function addservice(){
            include('connect.php');
            $service_id = mysql_real_escape_string($_POST['service_id']);
            $servicename = mysql_real_escape_string($_POST['service_name']);
            $customer = mysql_real_escape_string($_POST['customer']);
            $contact = mysql_real_escape_string($_POST['contact']);
            $status = mysql_real_escape_string($_POST['status']);
            $description = mysql_real_escape_string($_POST['description']);
            $date = date('m/d/Y H:i');
            echo $q = "INSERT INTO service VALUES ('$service_id','$description', '$customer','$contact','$status', '','$date' )";

            mysql_query($q);
            $op = "added new service($service_id)";
            $this->logs($op);
            header("Location:../service.php?cat=item&&msg=added");
        }

        function updateitem(){
            include('connect.php');
            $service_id = mysql_real_escape_string($_POST['service_id']);
            $servicename = mysql_real_escape_string($_POST['service_name']);
            $customer = mysql_real_escape_string($_POST['customer']);
            $contact = mysql_real_escape_string($_POST['contact']);
            $status = mysql_real_escape_string($_POST['status']);
            $description = mysql_real_escape_string($_POST['description']);
            $arrival_dates = mysql_real_escape_string($_POST['arrival_date']);
            $selling_price = mysql_real_escape_string($_POST['selling_price']);
            $id = $_GET['id'];
            if($image == $name.'-'){
                $q = "UPDATE items set name='$name', description='$description', qty='$qty', unit='$unit', unitsign='$unitsign', remark='$remarks', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";
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
        function getservice(){

           $q = "select * from service where serviceflag = '0' order by service_id asc";
            $result = mysql_query($q);
            return $result;
        }

        function getitembyid($id){

            $q = "select * from service where service_id=$id";
            $r = mysql_query($q);
            return $r;
        }
        function searchitem(){
            include('connect.php');

            $search = $_POST['search'];
            $q = "SELECT * FROM product_tbl where Product_Name like '%$search%' order by Product_Name asc";
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
                    <td><a href="edititem.php?id='.$row['Product_ID'].'">'.$row['Product_Name'].'</a></td>
                    <td class="text-center">
                        <a href="data/item.php?p=updateqty&op=plus&id='.$row['Product_ID'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>&nbsp;
                        '.$row['qty'].'
                        &nbsp;<a href="data/item.php?p=updateqty&op=minus&id='.$row['Product_ID'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a></td>
                      <td class="text-center">
                        <a href="data/item.php?p=updateunit&op=plus&id='.$row['Product_ID'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>
                        &nbsp; '.$row['UM'].' &nbsp;
                        <a href="data/item.php?p=updateunit&op=minus&id='.$row['Product_ID'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a>
                        </td>
                        <td class="text-center">
                        <a href="data/item.php?p=updateremark&op='.$op.'&id='.$row['Product_ID'].'"<i class="'.$class.'"></i>
                        </td>
                </tr>';
         endwhile;
        }

        function updateqty(){
            include('db.php');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
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
            mysql_query("Update items set qty='$qty', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated quantity from $initial to $qty of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=quantity");
        }

        function updateunit(){
            include('db.php');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
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
            mysql_query("Update items set unit='$unit',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated unit from $initial to $unit of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=unit");
        }

        function updateremark(){
            include('db.php');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
            $r = mysql_query($q);
            $row = mysql_fetch_array($r);
            if($_GET['op'] == 'enable'){
                $remark = 'Functional';
            }else{
                $remark = 'Not Functional';
            }
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysql_query("Update items set remark='$remark',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated item to $remark of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=");
        }

        function archiveitem(){
            include('connect.php');
            $id =$_GET['id'];

            $q = "select * from service where service_id=$id";
            $r = mysql_query($q) ;
            $row = mysql_fetch_array($r);
            mysql_query("update service set serviceflag = '1' where service_id = $id");
             $op = "Archived service ($row[service_id])";
            $this->logs($op);
            header("Location:../service.php?q=arhived&cat=");



        }


        function error(){
            //header("location:index.php");
        }
    }


?>
