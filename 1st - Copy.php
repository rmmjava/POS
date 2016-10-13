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
	<link rel='stylesheet' id='theme-responsive-css'  href='css/responsive.css?ver=1' type='text/css' media='all' />
	<?php
	require_once('auth.php');
?>

</head>
<body>
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>

<?php
}
if($position=='admin') {
?>
	<!-- WAG MONG GALAWIN! MAY SUMPA TO -->
	<div id="wrapper">
	<!-- WAG MONG GALAWIN! MAY SUMPA TO -->
		<!-- top bar -->
		<div id="top-bar">
			<div class="settings navbar-fixed-top">
				<div class="col-sm-4 col-md-3 col-lg-2 col-sm-offset-8 col-md-offset-9 col-lg-offset-10 no-padding ">
					<div class="user-setting">
						<div class="dropdown">
						  	<button class="btn btn-sm btn-primary dropdown-toggle form-control" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    <i class="fa fa-user"></i> <strong> <?php echo $_SESSION['SESS_LAST_NAME'];?></strong>
						    <span class = "caret"></span>
						  	</button>
						  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    	<li><a href="#"><i class="fa fa-users"></i> Employee Record</a></li>
						    	<li><a href="#"><i class="fa fa-users"></i> Customer Record</a></li>
						    	<li><a href="#"><i class="fa fa-users"></i> Supplier Record</a></li>
						    	<li role="separator" class="divider"></li>
						    	<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
						    	<li><button class="btn"  ><i class="fa fa-sign-out" ></i> Log-out</button></li>
						  	</ul>
						</div>
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
		<!-- top bar -->
<!-- WAG MONG GALAWIN! MAY SUMPA TO -->
		<div id="body">
			<div class="col-lg-2 col-md-2  no-padding">
				<!-- WAG MONG GALAWIN! MAY SUMPA TO -->
				<!-- main navigation -->
				<div class="menu-wrap">
					<div class="main-menu" id="top-menu">
						<ul>
							<li>
								<a href="#"><i class="fa fa-money"></i> Sales</a>
								<ul class="sub-menu">
									<li><a href="#">Make Sales</a></li>
									<li><a href="#">Make Service</a></li>
									<li><a href="#">View Summary</a></li>
									<li><a href="#">View Dashboard</a></li>
								</ul>
							</li>
							<hr>
							<li>
								<a href="#"><i class="fa fa-archive"></i> Inventory</a>
								<ul class="sub-menu">
									<li><a href="manage_stocks.php">Manage Stocks</a></li>
									<li><a href="#">Service Material</a></li>
									<li><a href="#">Supplier Delivery</a></li>
									<li><a href="#">Purchace Order</a></li>
								</ul>
							</li>
							<hr>
							<li>
								<a href="#"><i class="fa fa-eye"></i> Monitoring</a>
								<ul class="sub-menu">
									<li><a href="#">Veiw Transaction</a></li>
								</ul>
							</li>
							
						</ul>
					</div>
				</div>
				<!-- main navigation -->			
			</div>
			<!-- WAG MONG GALAWIN! MAY SUMPA TO -->
			<div class="col-sm-12  col-lg-10  sample">	
				<div class="main-content">
					<h1 >DITO YUNG CONTENT</h1>
					
					<div class="col-sm-12  sample">

					</div>
				</div>
			</div>

			<?php
}
?>
			<div style="clear:both"></div>
		</div>
	</div>

	<!--javascripts-->
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type='text/javascript' src='js/navigation.js?ver=1.0'></script>
</body>

</html>