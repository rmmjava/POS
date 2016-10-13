<?php

	$con = mysql_connect("localhost","root");
		if(!$con) {
			die("could not connect");
		}
		
	mysql_select_db("mimbo_db",$con);

?>