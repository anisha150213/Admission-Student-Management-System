<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/17/2017
 * Time: 1:22 AM
 */

class AccountManage extends MainController{
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
        self::adminAccountManage();
    }

    public function adminAccountManage($value = false)
    {
        Session::init();
        $pageName = ['pageName' => 'Account Manage'];
        $this->load->view('partials/header', $pageName);

        $simpleModel = $this->load->model('SimpleModel');
        $user_id = Session::get('id');
        $cond = "id = $user_id";
        $user = $simpleModel->getAll('users', $cond);
        if($value){
            $user['msg'] = $value;
        }
        $this->load->view('admin/accountManage', $user);
        $this->load->view('partials/footer');
    }

    public function updateName(){
        $name = $_POST['fullname'];
        $data = [
            'full_name' => $name
        ];
        Session::init();
        $user_id = Session::get('id');
        $cond = "id = $user_id";
        $simpleModel = $this->load->model('simpleModel');
        $red = $simpleModel->update('users', $data, $cond);
        if($red){
            header("Location:".BASE_URL."/AccountManage/index");
        }else{
            var_dump($red);
            echo "fuck me";
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

        header("Location:".BASE_URL."/AccountManage/adminAccountManage/".$msg);

    }
}