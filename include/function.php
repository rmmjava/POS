<?php
	require 'connect.php';

	function hash_function($password){
		$salt = file_get_contents('salt.txt');

		$password = hash_hmac('whirlpool', $password, $salt);
		return $password;
	}

	function encryptIt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qEncoded  = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
		return( $qEncoded );
	}

	function login($username , $password){
		$sql = "SELECT * FROM acc_tbl WHERE username = '".$username."' AND password =  '".$password."' ";
		$query = mysql_query($sql);
		$result = mysql_num_rows($query);

		if ($result > 0) {
			return true;
		}else{
			return false;
		}
	}

	function name_exist($name){
		$sql = "SELECT Id FROM acc_tbl WHERE Name = '".$name."' ";
		$query = mysql_query($sql);
		$result = mysql_num_rows($query);

		if ($result > 0) {
			return true;
		}else{
			return false;
		}
	}

	function username_exist($username){
		$sql = "SELECT Id FROM acc_tbl WHERE Username = '".$username."' ";
		$query = mysql_query($sql);
		$result = mysql_num_rows($query);

		if ($result > 0) {
			return true;
		}else{
			return false;
		}
	}

	function register($name , $username , $password){
		$sql = "INSERT INTO `acc_tbl` (`Name`, `Username`, `Password`) VALUES ('".$name."', '".$username."', '".$password."');";
		$query = mysql_query($sql);
		$result = mysql_num_rows($query);

		if ($result > 0){
			return true;
		}else{
			return false;
		}
	}


 $p = isset($_GET['p']) ? $_GET['p']:'error';

    $dataitem = new Itemdata();

    $dataitem->$p();
    class Itemdata {

        function logs($operation){
            include('connect.php');
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysql_query($q);
            return true;
        }

        function additem(){
            include('connect.php');
                    $barcode = mysql_real_escape_string($_POST['bar_code']);
                     $pro_name = mysql_real_escape_string($_POST['pro_name']);
                    $category = mysql_real_escape_string($_POST['pro_cat']);
                    $quantity = mysql_real_escape_string($_POST['pro_quantity']);
                    $unit = mysql_real_escape_string($_POST['unit_measure']);
                    $critical = mysql_real_escape_string($_POST['critical']);
                    $supplierName = mysql_real_escape_string($_POST['supplier_name']);
                    $arrival_dates = date('m/d/Y H:i');
                    $selling_price = mysql_real_escape_string($_POST['selling_price']);
            echo $q = "INSERT INTO product_tbl VALUES (null,'$barcode', '$pro_name',  '$category','$supplierName','$critical', '$quantity', '$unit',  '$arrival_dates', '$selling_price','')";
            mysql_query($q);
            $op = "added $quantity item ($pro_name)";
            $this->logs($op);
            header("Location:../inventory.php?cat=item&&msg=added");
        }

				function deactive(){
            include('connect.php');
                echo    $barcode = mysql_real_escape_string($_GET['barcode']);
								$q = "UPDATE product_tbl set 	itemflag='1' where Serial_number='$barcode'";
							mysql_query($q);
							 $op = "deactive item";
							 $this->logs($op);
								header("Location:../inventory.php?msg=deactive");
        //    echo $q = "INSERT INTO product_tbl VALUES (null,'$barcode', '$pro_name',  '$category','$supplierName','$critical', '$quantity', '$unit',  '$arrival_dates', '$selling_price','')";
        //    mysql_query($q);
        //    $op = "added $quantity item ($pro_name)";
        //    $this->logs($op);
          //  header("Location:../inventory.php?cat=item&&msg=added");
        }

        function updateitem(){
            include('connect.php');
              echo     $barcode = mysql_real_escape_string($_POST['bar_code']);
                     $pro_name = mysql_real_escape_string($_POST['pro_name']);
                    $category = mysql_real_escape_string($_POST['pro_cat']);

                    $unit = mysql_real_escape_string($_POST['unit_measure']);
                    $critical = mysql_real_escape_string($_POST['critical']);
                    $supplierName = mysql_real_escape_string($_POST['supplier_name']);

                    $selling_price = mysql_real_escape_string($_POST['selling_price']);

            $q = "UPDATE product_tbl set Product_Name='$pro_name', Category='$category',  Supplier='$supplierName', Critical='$critical', UM='$unit', selling_price='$selling_price' where Serial_number='$barcode'";
 					mysql_query($q);
           $op = "updated item ($pro_name)";
           $this->logs($op);
            header("Location:../inventory.php?msg=updated");
        }
        function getitems(){

           $q = "select * from product_tbl where itemflag = '0' order by Product_Name asc";
            $result = mysql_query($q);
            return $result;
        }

				function getitemsStock(){

					 $q = "select * from product_tbl where itemflag = '0' order by Supplier asc";
						$result = mysql_query($q);
						return $result;
				}
                function getcriticalStock(){

                     $q = "select * from product_tbl  where Quantity <= Critical and itemflag=0 order by Supplier asc";
                        $result = mysql_query($q);
                        return $result;
                }

        function getitembyid($id){

            $q = "select * from product_tbl where Product_ID=$id";
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



        }


        function error(){
            //header("location:index.php");
        }
    }


?>
