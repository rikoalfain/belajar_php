<?php
class User
{
    private $email; // set properti email ke private
    private $password; // set properti password ke private
    const MINCHARS = 8; // set class constant
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
        // self digunakan untuk memanggil/refer constant yang ada dalam class itu sendiri
        if ($this->validatePassword($string) == false) {
            throw new Exception('Minimal karakter password adalah '.self::MINCHARS);
        }
        // $this digunakan untuk mereferensi properti atau method dalam class itu sendiri
        $this->password = hash('sha256', $string);
    }
    // method ini digunakan untuk mengakses properti password yang visibilitynya private
    public function getPassword()
    {
        return $this->password;
    }
    public function setEmail($string)
    {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Gunakan email yang valid');
        }
        $this->email = $string;
    }
    public function getEmail()
    {
        return $this->email;
    }
    private function validatePassword($string)
    {
        return strlen($string) < self::MINCHARS ? false : true;
    }
}               