<?php
/**
 * Created by PhpStorm.
 * User: Akib
 * Date: 10/22/2017
 * Time: 7:17 PM
 */

class StudentDetail extends MainController{
    public function __construct(){
        parent::__construct();
        Session::init();
        Session::checkSession();
        $role = Session::get('user_role');
        if($role == 'student'){
            header('Location:'.BASE_URL);
        }
    }

    public function index(){
        self::main();
    }
    public function main($value = false){
        if($value == false){
            header("LOcation:".BASE_URL);
        }else{
            $studentId = $value;
            $simpleModel = $this->load->model('SimpleModel');
            $studentModel = $this->load->model('StudentModel');
            $resultModel = $this->load->model('ResultModel');
            $formSellModel = $this->load->model('FormSellModel');
            $cond = "id = $studentId";
            $data['student'] = $simpleModel->getAll('student', $cond);
            $data['user'] = $studentModel->getUserByStudentId($studentId);
            $data['ssc_result'] = $resultModel->getALLByStudentIdSSCGroup($studentId);
            $data['hsc_result'] = $resultModel->getALLByStudentIdHSCGroup($studentId);
            $data['board'] = $simpleModel->getAll('board');
            $data['form'] = $formSellModel->getFormDetailByStudentId($studentId);
            $pageName = ['pageName' => 'Student Detail'];

            $this->load->view('partials/header', $pageName);
            $this->load->view('admin/studentDetail', $data);
            $this->load->view('partials/footer');
        }
    }
}