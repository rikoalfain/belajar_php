<?php
require 'User.php';
$riko = new User();
$riko->setPassword('12121221');
var_dump($riko->getPassword());
?>