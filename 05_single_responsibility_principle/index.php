<?php
/**
 * dalam bagian sebelumnya kita melakukan validasi terhadap data dengan hardcode class user
 * di bagian kali ini kita akan memisahkan validasi ke dalam class tersendiri
 * sehingga ketika kita ingin menggunakan validasi lagi kita tidak perlu hardcode lagi
 * kemudian kita buat file Helper.
 */
require 'app/User.php';
require 'app/Validator.php';
require 'app/Helper.php';
// menentukan rules untuk validasi data
$rules = array('email' => 'required|email', 'password' => 'required|min:8');
// untuk testing validasi ganti value sesuai keinginan
$data = array('email' => 'budi@email.com', 'password' => '12345678');
$validator = new Validator();
if ($validator->validate($data, $rules) === true) {
    // ketika validasi terpenuhi
    $budi = new User();
    /*
     * set email dan password (penerapan method chaining), jika seperti biasa ditulis seperti ini :
     * $budi->setEmail($data['email']);
     * $budi->setPassword(getHash($data['password']));
     */
    $budi->setEmail($data['email'])
        ->setPassword(getHash($data['password']));
    // dumping data object budi
    var_dump($budi);
} else {
    /*
     * ketika validasi salah / tidak terpenuhi akan menampilkan error dari method getErrors dari object $validator
     */
    var_dump($validator->getErrors());
}