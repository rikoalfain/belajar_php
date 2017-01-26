<?php
class User
{
    public $email;
    public $password;
    const MINCHARS = 8; //set class constant
    public function login()
    {
        return 'logging in ..';
    }
    public function logout()
    {
        return 'logging out ...';
    }
    public function setPassword($string)
    {
        //self digunakan untuk memanggil/refer constant yang ada dalam
        if (strlen($string) < self::MINCHARS) {
            throw new Exception('Minimal karakter password adalah '.self::MINCHARS);
        }
        // $this digunakan untuk mereferensi properti atau method dalam class itu sendiri
        $this->password = hash('sha256', $string);
    }
}
?>