<?php

/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/11/2017
 * Time: 8:34 AM
 */
class StudentModel extends MainModel {
    public function __construct(){
        parent::__construct();
    }

    public function getAllFromStudent(){
        $sql = "SELECT * FROM student";
        return $this->db->select($sql);
    }

    public function insertStudent($data){
        return $this->db->insert('student', $data, true);
    }

    public function updateStudent($data, $cond){
        return $this->db->update('student', $data, $cond);
    }

    public function getStudentByUserId($userId){
        $sql = "SELECT id FROM student WHERE user_id = $userId";
        return $this->db->select($sql);
    }

    public function getStudentNameByFormId($formId){
        $sql = "SELECT student.id, users.full_name FROM form_sell
                INNER JOIN student ON student.id = form_sell.student_id
                INNER JOIN users ON student.user_id = users.id
                WHERE form_sell.id = $formId";
        return $this->db->select($sql);
    }

    public function getUserByStudentId($studentId){
        $sql = "SELECT users.id, users.full_name, users.user_name, users.user_role FROM student
                INNER JOIN users on users.id = student.user_id
                WHERE student.id = $studentId";
        return $this->db->select($sql);
    }

}