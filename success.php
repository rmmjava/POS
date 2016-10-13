
<?php
    $cat = isset($_GET['cat']) ? $_GET['cat']:null;
    $msg = isset($_GET['msg']) ? $_GET['msg']:null;
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Done
                        </h1>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            <h2 class="text-center"><i class="fa fa-fw fa-check-circle"></i>1 <?php echo $cat;?> successfully <?php echo $msg;?>!</h2>
                        
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


