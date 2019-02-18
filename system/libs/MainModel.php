<?php

class MainModel{
    protected $db = array();
    public function __construct(){
        $dsn = 'mysql:dbname=se_addmission; host=localhost';
        $user = 'root';
        $pass = '';
        $this->db = new Database($dsn,$user,$pass);
    }

}