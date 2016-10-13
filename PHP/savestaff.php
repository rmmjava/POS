<?php
	session_start();
	include ("../connect.php");

if (isset($_POST['empID'])) {

		 $fname = mysql_real_escape_string($_POST['fname']);
                     $lname = mysql_real_escape_string($_POST['lname']);
                $address = mysql_real_escape_string($_POST['address']);
                    $contact = mysql_real_escape_string($_POST['contact']);
                 

$edit = "UPDATE staff SET FName = '".$fname."', LName ='".$lname."', Contact='".$contact."', Address = '".$address."' WHERE Staff_ID = '".$_POST['empID']."' ";
 $quer = mysql_query($edit)or die(mysql_error($con));
	
		header("location:../staff.php?msg=updated");
		}
?>
