<?php

/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/11/2017
 * Time: 8:39 AM
 */
class SimpleModel extends MainModel {
    public function __construct(){
        parent::__construct();
    }

    public function getAll($table, $cond = false){
        if($cond){
            $sql = "SELECT * FROM $table WHERE $cond";
        }else{
            $sql = "SELECT * FROM $table";
        }
        return $this->db->select($sql);
    }

    public function insert($table, $data){
        return $this->db->insert($table, $data, true);
    }

    public function update($table, $data, $cond){
        return $this->db->update($table, $data, $cond);
    }

    public function delete($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }

    public function getMaxId($table){
        $sql = "SELECT MAX(id) FROM $table";
        return $this->db->select($sql);
    }
}
