<?php

include('connect.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php
if(isset($_GET['barcode'])){
  $bcode=$_GET['barcode'];
  $Qty=$_GET['qty'];
}else{
  $bcode="";
  $Qty="";
}

 ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Barcode Generator
                        </h1>

                    </div>

                </div>

				<!--Hanngang dito-->


                <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
              <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
          <form action="BarcodeV1.php" method="GET" >
            <input type="text" class="form-control" name="barcode" value="<?=$bcode?>" autofocus="autofocus" />


          </div>
        </div>

        <div class="col-lg-2">
        <input type="number" class="form-control" name="qty" value="1" min="1" value="<?=$Qty?>" placeholder="Qty" autocomplete="off" />
        </div>
                  <div class="col-lg-2">
                      <!--<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />-->
          <Button type="submit" class="btn btn-primary btn-block" ><i class="fa fa-random "></i> GENERATE </button>

                  </form>
        </div>
        <div class="col-lg-2">
            <a type="button" class="btn btn-info btn-block" onClick='printdaw();' ><i class="fa fa-print"></i> PRINT </a>


</div>
      </div>
    </div>
          <div class="col-lg-12">
            <?php
            if($bcode!=""){
              for($i=0;$i<$Qty;$i++){


            ?>

<img height="100%" alt="TESTING" src="barcode.php?codetype=Code128&size=30&text=<?=$bcode?>&print=true" />

            <?php
          }
            }
             ?>
          </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include('include/footer.php'); ?>
<script language="JavaScript">
    function printdaw()
    {

  win1 = window.open('PrintBarcode.php?barcode=<?=$bcode?>&qty=<?=$Qty?>', 'newwindow', config='height=580, width=950, left=10, top=60, toolbar=no, scrollbars=yes, resizable=yes');
  win1.focus();
    }
  </SCRIPT>
