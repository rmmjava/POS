<?php
	INCLUDE('connect.php');
    session_start();
    if(isset($_SESSION['login'])){
        header('location:dashboard.php');
    }
?>
<?php


	if($_SERVER['REQUEST_METHOD']=='POST'){

			function encryptIt( $q ) {
   		 	$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    		$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    		return( $qEncoded );
			}

			$username=mysql_real_escape_string($_POST['username']);
			$password=mysql_real_escape_string($_POST['password']);

			if($username && $password){
				$sql="SELECT * FROM acc_tbl WHERE username='".$username."' AND password='".$password."' LIMIT 1 ";
				$sqlquer=mysql_query($sql)or die (mysql_error($con));
				if(mysql_num_rows($sqlquer) == 0){
					$Error="Username or password incorrect";
					header("location:../index.php?Error=" .$Error);
						$_SESSION['status']['login']['error'][] = 'Username or password incorrect';
				}else{
					$row=mysql_fetch_assoc($sqlquer);
							//INItIALIZE
							$acctype= $row['acc_type'];
							$accstat= $row['acc_stat'];
							$loginflag= $row['login_flag'];

							$_SESSION['accID'] = $row['acc_id'];
							$_SESSION['username'] = $row['username'];
							$_SESSION['password'] = $row['password'];
							$_SESSION['acc_type'] =$row['acc_type'];

							setcookie("'username'" , $_POST['username']);
							setcookie("'password'" , $_POST['password']);
							setcookie("'accID'" , $row['acc_id']);

					//		if($loginflag=='0'){
							if($accstat=='Activated'){
										$accID = $_SESSION['accID'];
					//					$loginFlagQuery = mysql_query (" UPDATE acc_tbl SET login_flag = 1  where acc_id = '$accID' ")or die(mysql_error($con));
										header ("location:../dashboard.php?status=logged");
								}else{
									$Error="Account deactivated";
									header("location:../index.php?Error=".$Error);
									$_SESSION['status']['login']['error'][] = 'Account Deactivated';
								}
								if ($acctype =='cashier') {
									header("location:../salesCashier.php?".$Error);
									# code...
								}
						//}else{
						//		$Error="Account already logged in";
						//		header("location:../index.php?Error=".$Error);
						//				$_SESSION['status']['login']['error'][] = 'Account already logged in';
						//}

				}
			}else{
				$Error="You forgot to enter username or password";
				header("location:../index.php?Error=".$Error);
			}
	}

?>
