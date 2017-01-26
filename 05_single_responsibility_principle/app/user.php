<?php

	calss user()
{
	private $email;
	private $password;

	public function login()
	{
		return 'logging in ..';
	}
	public function setPassword($string)
	{
        /*
         * code ini kita hapus karena kita sudah membuat Class Validator tersendiri , sengaja disini di komen agar tahu perbedaanya
         */
        // if($this->validatePassword($string) == false){
        //     throw new Exception("Minimal karakter password adalah " . self::MINCHARS);
        // }
        // $this digunakan untuk mereferensi properti atau method dalam class itu sendiri
        // $this->password = hash('sha256', $string);
        $this->password = $string;
        // menambahkan return $this agar kita bisa menggunakan method chaining
        return $this;
}

public function getPassword(){
	return$this->password;
}
public function setEmail($string)
{
	$this->email = $string;
	return $this;
}
      return $this->email;
    }
    /*
     * [validatePassword description]
     * code ini kita hapus karena kita sudah membuat Class Validator tersendiri , sengaja disini di komen agar tahu perbedaanya
     * @param  [type] $string [description]
     * @return [type]         [description]
     */
    // private function validatePassword($string)
    // {
    //     return strlen($string) < self::MINCHARS ? false : true;
    // }
}
?>