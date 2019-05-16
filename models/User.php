<?php

class User{
    public $id;
    public $name;
    public $email;
    public $password;

    function __construct(){
        $this->id = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    function __construct1($id, $name, $email, $password){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
?>