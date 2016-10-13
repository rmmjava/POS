<?php
	session_start();
	include ("../connect.php");

if (isset($_POST['mID'])) {
			 $fname = mysql_real_escape_string($_POST['fname']);
           $lname = mysql_real_escape_string($_POST['lname']);
            $address = mysql_real_escape_string($_POST['address']);
            $contact = mysql_real_escape_string($_POST['contact']);
            $memberID = mysql_real_escape_string($_POST['mID']);
             $email = mysql_real_escape_string($_POST['email']);
             $agency = mysql_real_escape_string($_POST['agency']);
             $date = date('m/d/Y H:i');
                 

			$edit = "UPDATE customer SET customer_name = '".$fname."', customer_Lname ='".$lname."', contact='".$contact."', address = '".$address."', agency = '".$agency."', email = '".$email."' WHERE membership_number =  '".$_POST['mID']."' ";
			 $quer = mysql_query($edit)or die(mysql_error($con));
				
            header("Location:../customer.php?cat=user&msg=updated"); 









		}
?>
