
<?php
    include('include/function.php');
    $dataitem = new Itemdata();

?>
<title>MIMBO BYTES</title>
<link rel="shortcut icon" href="img/logo-icon.ico">

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<body  onload='window.print()'>
<div align="center">
  <span id="buss"><h2><B>Mimbo Bytes Gen. Merchandizing</B></h2></span></div>
<div align="center"><span id="details">Lucero St., San Fernando City, La Union (ROMMEL S. TUAZON -- Prop.)</span></div>
        <div id="page-wrapper">
<center><h3><b>Stock Report</b></h3></center>
            <div class="container-fluid">

                <!-- Page Heading -->

                <!-- /.row -->



                 <div class="row">
                    <div class="col-lg-12">
                        <div class="reports table-responsive">




                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                    <th>Serial No.</th>
                                      <th>Item Name</th>
                                        <th>Category</th>
                                      <th>Quantity</th>
                                      <th>Unit</th>

                                      <th>Price</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $item = $dataitem->getitems(); ?>
                                  <?php if(mysql_num_rows($item)==0): ?>
                                      <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                  <?php endif; ?>
                                  <?php while($row = mysql_fetch_array($item)): ?>
                                      <tr>
                                          <td><?php echo $row['Serial_number']; ?></td>
                                          <td><?php echo $row['Product_Name']; ?></td>
                                              <td class="text-center"><?php echo $row['Category']; ?></td>
                                          <td class="text-center"><?php echo $row['Quantity']; ?></td>
                                          <td class="text-center"><?php echo $row['UM']; ?></td>
                                            <td class="text-center"><?php echo $row['selling_price']; ?></td>



                                      </tr>
                                  <?php endwhile; ?>
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include('include/footer.php'); ?>
