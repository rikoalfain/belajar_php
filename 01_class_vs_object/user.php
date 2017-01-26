<?php
class User
{
    public $email;
    public $password;
    public function login()
    {
        return 'logging in ..';
    }
    public function logout()
    {
        return 'logging out ...';
    }
}