<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/18/2017
 * Time: 1:58 PM
 */

class Result extends MainController{
    public function __construct(){
        parent::__construct();
        Session::init();
        Session::checkSession();
        $role = Session::get('user_role');
        if($role != 'student'){
            header('Location:'.BASE_URL);
        }
    }

    public function index(){
        self::inputResult();
    }

    public function inputResult($v = false){
        $pageName = ['pageName' => 'Result'];
        $simpleModel = $this->load->model('SimpleModel');
        $studentModel = $this->load->model('StudentModel');
        $resultModel = $this->load->model('ResultModel');
        Session::init();
        $user_id = Session::get('id');

        $studentId = $studentModel->getStudentByUserId($user_id);
        $studentId = $studentId[0]['id'];
        $type = 'SSC';
        if($v != false){
            $type = $v;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['examType'];
        }
        $cond = "exam_type = '$type'";

        $data['sub'] = $simpleModel->getAll('subject', $cond);
        $data['type'] = $type;
        $data['table'] = $resultModel->getALLByStudentIdExamType($studentId, $type);
        $this->load->view('partials/headerPublic', $pageName);
        $this->load->view('students/result', $data);
        $this->load->view('partials/footer');
    }

    public function insert(){
        $subjectId = $_POST['subName'];
        $gpa = $_POST['gpa'];
        $mark = $_POST['mark'];
        $type = $_POST['type'];
        Session::init();
        $user_id = Session::get('id');
        $simpleModel = $this->load->model('SimpleModel');
        $studentModel = $this->load->model('StudentModel');
        $studentId = $studentModel->getStudentByUserId($user_id);
        var_dump($studentId);
        $data = [
            'student_id' => $studentId[0]['id'],
            'subject_id' => $subjectId,
            'marks' => $mark,
            'grade' => $gpa,
            'modified_by' => $user_id,
        ];

        $res = $simpleModel->insert('ssc_hsc_result', $data);
        if($res){
            header('Location:'.BASE_URL.'/result/inputResult/'.$type);
        }else{
            var_dump($res);
        }

    }

    public function update(){
        $subjectId = $_POST['sub'];
        $id = $_POST['table_id'];
        $gpa = $_POST['gpa'];
        $mark = $_POST['mark'];
        $type = $_POST['type'];
        Session::init();
        $userid = Session::get('id');

        $simpleModel = $this->load->model('SimpleModel');
        $data = [
            'subject_id' => $subjectId,
            'marks' => $mark,
            'grade' => $gpa,
            'modified_by' => $userid
        ];
        $cond = "id = $id";
        $res = $simpleModel->update('ssc_hsc_result', $data, $cond);
        if($res){
            header('Location:'.BASE_URL.'/result/inputResult/'.$type);
        }else{
            var_dump($res);
        }
    }

    public function delete(){
        $type = $_POST['type'];
        $id = $_POST['table_id'];
        $simpleModel = $this->load->model('SimpleModel');
        $cond = "id = $id";
        $res = $simpleModel->delete('ssc_hsc_result', $cond);
        if($res){
            header('Location:'.BASE_URL.'/result/inputResult/'.$type);
        }else{
            var_dump($res);
        }

    }

}