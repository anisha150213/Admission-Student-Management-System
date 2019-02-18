<?php

/**
 * LoginModel Model
 */
class LoginModel extends MainModel
{
    public function __construct(){
        parent::__construct();
    }

    public function getIdByUserNamePass($username, $pass, $table){
        $sql = "SELECT * FROM $table WHERE user_name = :user_name AND password = :password";
        $data = array(
            ":user_name" => $username,
            ":password" => $pass
        );
        return $this->db->select($sql, $data);
    }

}