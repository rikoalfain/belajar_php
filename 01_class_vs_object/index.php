<?php 
	require 'user.php';

	$riko = new user();
	$riko->email ='richopasker@gmial.com';
	$riko->password= 'sepek';
	$septia = new user();
	$septia->email ='septia@gmial.com';
	$septia->password ='bojes';

	var_dump($riko->login());
?>