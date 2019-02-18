<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 11/1/2017
 * Time: 1:14 AM
 */

class CostModel extends MainModel{
    public function __construct(){
        parent::__construct();
    }

    public function getAllCostDetailWithDue($userId = false){
        if($userId == false){
            $sql = "SELECT cost.id, cost.form_id AS x, form_sell.serial_number, cost.modified_by, (unit.form_price + unit.service_charge) as total, cost.amount, cost.modified_at, 
                users.full_name, university.name, unit.unit_name, IF( cost.is_special = '0', ((SELECT (SUM(unit.form_price)+ SUM(unit.service_charge)) 
                                                                  FROM form_sell
                                                                  INNER JOIN unit on unit.id = form_sell.unit_id
                                                                  WHERE form_sell.id = cost.form_id) - 
                                                                  (SELECT SUM(cost.amount) FROM cost
                                                                  WHERE cost.form_id = x AND  cost.transaction_name = 'Form purchased')), '0') AS due
                FROM cost
                INNER JOIN form_sell ON form_sell.id = cost.form_id
                INNER JOIN student ON form_sell.student_id = student.id
                INNER JOIN users ON users.id = student.user_id
                INNER JOIN unit ON form_sell.unit_id = unit.id
                INNER JOIN university on unit.university_id = university.id
                WHERE cost.transaction_name = 'Form purchased'
                ORDER BY cost.modified_at DESC";
        }else{
            $sql = "SELECT cost.id, cost.form_id AS x, form_sell.serial_number, cost.modified_by, (unit.form_price + unit.service_charge) as total, cost.amount, cost.modified_at, 
                users.full_name, university.name, unit.unit_name, IF( cost.is_special = '0', ((SELECT (SUM(unit.form_price)+ SUM(unit.service_charge)) 
                                                                  FROM form_sell
                                                                  INNER JOIN unit on unit.id = form_sell.unit_id
                                                                  WHERE form_sell.id = cost.form_id) - 
                                                                  (SELECT SUM(cost.amount) FROM cost
                                                                  WHERE cost.form_id = x AND  cost.transaction_name = 'Form purchased')), '0') AS due
                FROM cost
                INNER JOIN form_sell ON form_sell.id = cost.form_id
                INNER JOIN student ON form_sell.student_id = student.id
                INNER JOIN users ON users.id = student.user_id
                INNER JOIN unit ON form_sell.unit_id = unit.id
                INNER JOIN university on unit.university_id = university.id
                WHERE users.id = $userId
                AND cost.transaction_name = 'Form purchased'
                ORDER BY cost.modified_at DESC";
        }
        return $this->db->select($sql);
    }

    public function getAll(){
        $sql = "SELECT cost.id, form_sell.serial_number, cost.transaction_name, cost.amount, cost.modified_at, 
                university.name, unit.unit_name, cost.modified_by
                FROM cost
                INNER JOIN form_sell ON form_sell.id = cost.form_id
                INNER JOIN unit ON form_sell.unit_id = unit.id
                INNER JOIN university on unit.university_id = university.id
                ORDER BY cost.modified_at DESC";
        return $this->db->select($sql);
    }
}