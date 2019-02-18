<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/17/2017
 * Time: 7:23 AM
 */

class StudentAccountManage extends MainController{
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
        self::accountManage();
    }

    public  function accountManage($value = false){
        $pageName = ['pageName' => 'Account Manage'];
        $this->load->view('partials/headerPublic', $pageName);

        $simpleModel = $this->load->model('SimpleModel');
        $studentModel = $this->load->model('StudentModel');
        $resultModel = $this->load->model('ResultModel');
        Session::init();
        $user_id = Session::get('id');
        $cond = "id = $user_id";
        $user['user'] = $simpleModel->getAll('users', $cond);
        $cond = "user_id = $user_id";
        $user['student'] = $simpleModel->getAll('student', $cond);
        $user['board'] = $simpleModel->getAll('board');
        $studentId = $studentModel->getStudentByUserId($user_id);
        $studentId = $studentId[0]['id'];
        $cond = "student_id = $studentId";
        $user['ssc_result'] = $resultModel->getALLByStudentIdSSCGroup($studentId);
        $user['hsc_result'] = $resultModel->getALLByStudentIdHSCGroup($studentId);
        if($value){
            $user['msg'] = $value;
        }
        $this->load->view('students/accountManage', $user);
        $this->load->view('partials/footer');
    }

    public function updateScc(){
        $board = $_POST['sscboard'];
        $year = $_POST['sscyear'];
        $regNo = $_POST['sscregno'];
        $rollNo = $_POST['sscrollno'];
        $gpa = $_POST['sscgpa'];
        Session::init();
        $user_id = Session::get('id');

        $cond = "user_id = $user_id";
        $data = [
            'ssc_board_id' => $board,
            'ssc_year' => $year,
            'ssc_registration_number' => $regNo,
            'ssc_roll_number' => $rollNo,
            'ssc_gpa' => $gpa,
            'modified_by' => $user_id
        ];
        $simpleModel = $this->load->model('SimpleModel');
        $res = $simpleModel->update('student',$data,$cond);
        if($res){
            header('Location:'.BASE_URL."/StudentAccountManage");
        }
        else{
            var_dump($res);
        }
    }

    public function updateHcc(){
        $board = $_POST['hscboard'];
        $year = $_POST['hscyear'];
        $regNo = $_POST['hscregno'];
        $rollNo = $_POST['hscrollno'];
        $gpa = $_POST['hscgpa'];
        Session::init();
        $user_id = Session::get('id');

        $cond = "user_id = $user_id";
        $data = [
            'hsc_board_id' => $board,
            'hsc_year' => $year,
            'hsc_registration_number' => $regNo,
            'hsc_roll_number' => $rollNo,
            'hsc_gpa' => $gpa,
            'modified_by' => $user_id
        ];
        $simpleModel = $this->load->model('SimpleModel');
        $res = $simpleModel->update('student',$data,$cond);
        if($res){
            header('Location:'.BASE_URL."/StudentAccountManage");
        }
        else{
            var_dump($res);
        }
    }

    public function updatePassword(){
        $current_pass = $_POST['current_password'];
        $new_pass = $_POST['new_password'];
        $confirm_pass = $_POST['confirm_password'];
        $msg = '';
        Session::init();
        if(Session::get('password') == md5($current_pass)){
            if($new_pass == $confirm_pass){
                $simpleModel = $this->load->model('SimpleModel');
                $user_id = Session::get('id');
                $cond = "id = $user_id";
                $data = [
                    'password' => md5($new_pass)
                ];
                $res = $simpleModel->update('users', $data, $cond);
                if($res){
                    $msg = "Password Changed Successful";
                }else{
                    $msg = "Database Error";
                }
            }else{
                $msg = "New Password missMatch";
            }
        }else{
            $msg = "Wrong Current password";
        }

        header("Location:".BASE_URL."/StudentAccountManage/accountManage/".$msg);

    }

}