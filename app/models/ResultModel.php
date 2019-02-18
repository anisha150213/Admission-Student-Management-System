<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/18/2017
 * Time: 7:28 AM
 */

class ResultModel extends MainModel{
    public function __construct(){
        parent::__construct();
    }

    public function getALLByStudentIdExamType($studentId, $type){
        $sql = "SELECT ssc_hsc_result.id, ssc_hsc_result.student_id, ssc_hsc_result.subject_id, 
                subject.exam_type, ssc_hsc_result.marks, ssc_hsc_result.grade FROM ssc_hsc_result 
                INNER JOIN subject on ssc_hsc_result.subject_id = subject.id
                WHERE ssc_hsc_result.student_id = :student_id 
                AND subject.exam_type = :exam_type";
        $data =[
            ':student_id' => $studentId,
            ':exam_type' => $type
        ];

        return $this->db->select($sql, $data);
    }

    public function getALLByStudentIdSSCGroup($studentId){
        $sql = "SELECT subject.code, subject.name, ssc_hsc_result.marks, ssc_hsc_result.grade FROM ssc_hsc_result 
                INNER JOIN subject on ssc_hsc_result.subject_id = subject.id
                WHERE ssc_hsc_result.student_id = :student_id 
                AND (subject.exam_type = 'SSC' OR subject.exam_type = 'Dakhil' OR subject.exam_type = 'O Level')";
        $data =[
            ':student_id' => $studentId,
        ];

        return $this->db->select($sql, $data);
    }

    public function getALLByStudentIdHSCGroup($studentId){
        $sql = "SELECT subject.code, subject.name, ssc_hsc_result.marks, ssc_hsc_result.grade FROM ssc_hsc_result 
                INNER JOIN subject on ssc_hsc_result.subject_id = subject.id
                WHERE ssc_hsc_result.student_id = :student_id 
                AND (subject.exam_type = 'HSC' OR subject.exam_type = 'Alim' OR subject.exam_type = 'A Level')";
        $data =[
            ':student_id' => $studentId,
        ];

        return $this->db->select($sql, $data);
    }



}