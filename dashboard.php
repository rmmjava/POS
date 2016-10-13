<?php Include('include/connect.php');?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

<?php
date_default_timezone_set('Asia/Hong_Kong');
  	$datedaw=date("Y-m-d");

    $r1 = mysql_query("select * from product_tbl where itemflag=0");
    $r5 = mysql_query("SELECT * FROM product_tbl where Quantity <= Critical and itemflag=0");
    $r2 = mysql_query("SELECT SUM(saleAmount) as totS FROM ztbltransactions WHERE DATE(transDate)='".$datedaw."%'");
    $row=mysql_fetch_array($r2);

 $totalSales=$row['totS'];
    if($totalSales==""){
      $totalSales=0;
    }
    $r3 = mysql_query("select * from service where serviceflag = '0'");
    $r4 = mysql_query("select * from staff");
    $logs = mysql_query("select * from logs order by date desc limit 0,20");
    $countitem = mysql_num_rows($r1);

    $cs = mysql_num_rows($r3);
    $countuser = mysql_num_rows($r5);
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            Item <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-database fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countitem; ?></div>
                                        <div>Items</div>
                                    </div>
                                </div>
                            </div>
                            <a href="inventory.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $totalSales; ?></div>
                                        <div>Total Sales Today</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-warning fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countuser; ?></div>
                                        <div>Critical Stocks</div>
                                    </div>
                                </div>
                            </div>
                            <a href="criticalstocks.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                   <!-- <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-wrench  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $cs; ?></div>
                                        <div>Pending Services</div>
                                    </div>
                                </div>
                            </div>
                            <a href="service.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>-->
                </div>
                <!-- /.row -->

                <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-line-chart"></i> Sales</h3>

                            </div>
                            <div class="panel-body">

                  <?php include('include/footer.php'); ?>
                              <script type="text/javascript" src="jquery-1.10.2.js"></script>
                          		<script type="text/javascript">
                          $(function () {
                                  $('#paglagyan').highcharts({
                          					chart: {
                          							zoomType: 'x',
                          							spacingRight: 10
                          					},
                                      title: {
                                          text: '<b></b>',
                                          x: -20 //center
                                      },
                                      subtitle: {
                                          text: '',
                                          x: -20
                                      },
                                      xAxis: {
                                          categories: ['Sept 25','Sept 26','Sept 27','Sept 28','Sept 29','Sept 30']
                                      },
                                      yAxis: {
                                          title: {
                                              text: 'AMOUNT'
                                          },
                                          plotLines: [{
                                              value: 0,
                                              width: 1,
                                              color: '#808080'
                                          }]
                                      },
                                      tooltip: {
                                          valueSuffix: ''
                                      },
                                      series: [{
                                          name: 'Total Sales Per Day',
                                          data: [500,1000,500,5000,1000,6000],
                          								color:'#014785'
                                      }]
                                  });
                              });


                          		</script>
                          	</head>
                          	<body>
                          <script src="highcharts.js"></script>


                          <div id="paglagyan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                                <div class="text-right">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Logs</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?php while($row = mysql_fetch_array($logs)): ?>
                                        <a href="#" class="list-group-item">
                                            <span class="badge"><?php echo $row['date'];?></span>
                                            <i class="fa fa-fw fa-calendar"></i>
                                            <?php echo $row['user'].' '.$row['operation']; ?>
                                        </a>
                                        <?php endwhile; ?>
                                    </div>
                                    <div class="text-right">
                                        <a href="reports.php">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->


                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
