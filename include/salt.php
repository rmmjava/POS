<?php
	
	$salt = openssl_random_pseudo_bytes(1024);
	file_put_contents("salt.txt", $salt);


?>