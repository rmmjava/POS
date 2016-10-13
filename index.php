<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>MIMBO BYTE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--css links-->
	<link rel="shortcut icon" href="img/logo-icon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/FA/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/FA/css/font-awesome.min.css">
</head>
<body>

	<div id="wrapper">
		<div id="login-module">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<div id="login-container">
							<div class="brand-logo">
								<img src="img/brand-logo.jpg" alt="Mimbo Byte">
							</div>
							<div class="login-field">
									<form role="form" action="include/login.php" method="post">
									<div class="form-group">
										<div class="col-sm-4 no-padding">
										<label for="username"><i class="fa fa-user"></i> Username:</label>
										</div>
										<div class="col-sm-8 no-padding">
										<input type="text" class="form-control" name="username" placeholder="Please Enter Your Username" required="">
										</div>
										<div style="clear:both"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 no-padding">
										<label for="password"><i class="fa fa-lock"></i> Password:</label>
										</div>
										<div class="col-sm-8 no-padding">
										<input type="password" class="form-control" name="password" placeholder="Please Enter Your Password" required="">
										</div>
										<div style="clear:both"></div>	
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-8 no-padding">
											<button name = "submit"type="submit" class="btn btn-primary form-control"><i class="fa fa-sign-in"></i> Submit</button>
										</div>
										<div style="clear:both"></div>	
									</div>									
								</form>
								 <?php
								        if (isset($_SESSION['status']['login']['success'])) { 
								      ?>
								          <div class="alert alert-success"> 
								            <button type="button" class="close" data-dismiss="alert">&times;</button>
								            <p><?php foreach ($_SESSION['status']['login']['success'] as $success){ echo $success; };?></p>
								          </div>
								      <?php
								        }
								      ?>

								      <?php
								        if (isset($_SESSION['status']['login']['error'])) { 
								      ?>
								          <div class="alert alert-danger"> 
								            <button type="button" class="close" data-dismiss="alert">&times;</button>
								            <p><strong>Error: </strong> <br />

								              <?php
								                foreach ($_SESSION['status']['login']['error'] as $error) {
								                  echo $error . '<br />';
								                }
								              ?>

								            </p>
								          </div>
								      <?php
        }
      ?>

								<!-- dito pupunta kung may error
								<div class="alert alert-danger text-center" role="alert">
  								<!--	<h5>OKIS MALI NAMAN YUNG NILAGAY NA USERNAME O PASSWORD!!!!!</h5> -->
								</div>
								<!-- dito pupunta kung may error -->
								<div class="forgot-pass">
									<h5>Forgot password? Please contact System Administrator !</h5>
								</div>
							</div>
						</div>
					</div>
					<div style="clear:both"></div>
				</div>
			</div>
		</div>
	</div>

	<!--javascripts-->
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
  unset($_SESSION['status']);
?>