<?php
	require 'app/User.php';
	require 'app/validartor.php';
	require 'app/Helper.php';

		$rules = array('email'=>'required | email','password' =>'required | min:8');

		$data = array('email' =>'budi@email.com','password'=>12345678');

	$validator = new validator();

if($validator->validate($data,$rules)===true){
		$budi=new User();

		$budi->setEmail($data['email']);
		->setPassword(getHash($data['password']));

		var_dump($budi);
}else{ 
	var_dump($validator>getErrors());
}
?>