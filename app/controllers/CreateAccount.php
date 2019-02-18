<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/31/2017
 * Time: 6:32 PM
 */

class CreateAccount extends MainController{
    public function __construct(){
        parent::__construct();Session::init();
        Session::checkSession();
        $role = Session::get('user_role');
        if($role != 'admin'){
            header('Location:'.BASE_URL);
        }
    }

    public function index(){
        self::main();
    }

    public function main(){
        $data['user_error'] = null;
        $data['pass_error'] = null;
        $data['success'] = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $userName = $_POST['user_name'];
            $pass = $_POST['pass'];
            $con_pass = $_POST['con_pass'];
            $role = $_POST['role'];
            Session::init();
            $id = Session::get('id');

            $simpleModel = $this->load->model('SimpleModel');

            if($pass != $con_pass){
                $data['pass_error'] = true;
            }else{
                $cond = "user_name = '$userName'";
                $isExist = $simpleModel->getAll('users', $cond);
                if(empty($isExist)){
                    $table = [
                        'full_name' => $name,
                        'user_name' => $userName,
                        'password'  => md5($pass),
                        'user_role' => $role,
                        'account_status' => '1',
                        'modified_by' => $id,
                    ];
                    $res = $simpleModel->insert('users', $table);
                    if($res){
                        $data['success'] = true;
                    }else{
                        var_dump($res);
                    }
                }else{
                    $data['user_error'] = true;
                }
            }

        }

        $pageName = ['pageName' => 'Create Account'];
        $this->load->view('partials/header', $pageName);
        $this->load->view('admin/create_account',$data);
        $this->load->view('partials/footer');
    }

}