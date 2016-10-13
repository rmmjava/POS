<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$_GET['barcode']?></title>
<link rel="stylesheet" href="print.css" type="text/css" media="print">
<script type='text/javascript'>

	$(document).ready(function() {
   $("body").keydown(function(event) {
    var link = "#inline";

      if(event.keyCode == 67) link += 1;

      if(link != "#inline") $(link).trigger("click");
	  /*if(event.preventDefault) {
            event.preventDefault();
        } */
        //return false;

   });
});



			function ClosesMe(){parent.jQuery.fancybox.close(parent.location.reload(true)); }


</script>

</head>

<body  onload='window.print()'>

<div id="catchers">

	<?php
	  $bcode=$_GET['barcode'];
	if($bcode!=""){
		  $Qty=$_GET['qty'];
		for($i=0;$i<$Qty;$i++){


	?>

	<img height="100%" alt="TESTING" src="barcode.php?codetype=Code128&size=30&text=<?=$bcode?>&print=true" />

	<?php
	}
	}
	 ?>

</div>

<input type="button" hidden="hidden" id="inline1" tabindex="4" accesskey="c" onclick="ClosesMe();" value="" />
</body>
</html>
