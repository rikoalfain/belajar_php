<?php
require 'User.php';
$budi = new User();
$budi->setEmail('budi@email.com');
$budi->setPassword('12121221');
$andri = $budi; //copy object budi ke andri
// ketika kita set email pada object andri maka kedua value email dari object budi dan andri berubah
$andri->setEmail('andri@email.com');
$bowo = clone $budi; // clone object budi ke bowo
// ketika kita set email pada object bowo maka email pada object budi tidak berubah
$bowo->setEmail('bowo@email.com');
var_dump($budi); // dumping data object budi
echo '<br/>';
var_dump($andri); // dumping data object andri
echo '<br/>';
var_dump($bowo); // dumping data object