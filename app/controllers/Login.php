<?php

/**
 * Login Controller
 */
class Login extends MainController
{
    public function __construct(){
        parent::__construct();
        Session::init();
        $role = Session::get('user_role');
        if(Session::get('login') == true){
            if($role == 'admin' || $role == 'manager' || $role == 'data_entry'){
                header("Location: ".BASE_URL."/AccountManage");
            } elseif ($role == 'student'){
                header("Location: ".BASE_URL."/StudentAccountManage");
            }
        }
    }

    public function Index(){
        $this->login();
    }

    public function login(){
        $data['error'] = '0';
        $data['active_error'] = '0';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['btn_login'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $table = "users";
                $loginModel = $this->load->model("LoginModel");
                $loginData  = $loginModel->getIdByUserNamePass($username, $password, $table);
                if(!empty($loginData)) {
                    if($loginData[0]['account_status'] == '1'){
                        Session::init();
                        Session::set('login', 'true');
                        Session::set('username', $loginData[0]['user_name']);
                        Session::set('id',  $loginData[0]['id']);
                        Session::set('user_role',  $loginData[0]['user_role']);
                        Session::set('password',  $loginData[0]['password']);
                        if($loginData[0]['user_role'] == 'admin' || $loginData[0]['user_role'] == 'manager' || $loginData[0]['user_role'] == 'data_entry' ){
                            header("Location: ".BASE_URL."/AccountManage");
                        } elseif($loginData[0]['user_role'] == 'student') {
                            header("Location: ".BASE_URL."/StudentAccountManage");
                        }
                    }else{
                        $data['active_error'] = '1';
                    }

                }else{
                    $data['error'] = "1";
                }
            }
        }
        Session::init();
        if(Session::get("login") == true ){
//            header("Location: ".BASE_URL."/AccountManage");
            var_dump(Session::get('user_role'));
        } else {
            $pageName = ['pageName' => 'Log in'];
            $this->load->view("partials/headerPublic", $pageName);
            $this->load->view("login", $data);
            $this->load->view("partials/footer");
        }
    }

//    public function loginAuth(){
//        if (isset($_POST['btn_login'])) {
//            $username = $_POST['username'];
//            $password = md5($_POST['password']);
//            $table = "users";
//            $loginModel = $this->load->model("LoginModel");
//            $loginData  = $loginModel->getIdByUserNamePass($username, $password, $table);
//            if(!empty($loginData)) {
//                Session::init();
//                Session::set('login', 'true');
//                Session::set('username', $loginData[0]['user_name']);
//                Session::set('id',  $loginData[0]['id']);
//                Session::set('user_role',  $loginData[0]['user_role']);
//                Session::set('password',  $loginData[0]['password']);
//                 if($loginData[0]['user_role'] == 'admin' || $loginData[0]['user_role'] == 'manager' || $loginData[0]['user_role'] == 'data_entry' ){
//                     header("Location: ".BASE_URL."/AccountManage");
//                 } elseif($loginData[0]['user_role'] == 'student') {
//                     header("Location: ".BASE_URL."/StudentAccountManage");
//                 }
//            }else{
//                header("Location: ".BASE_URL."/Login");
//            }
//        }
//    }

    public function logOut(){
        Session::init();
        Session::destroy();
        header("Location: ".BASE_URL."/Login");
    }
}
