<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/15/2017
 * Time: 12:36 AM
 */

class ManageAllAccount  extends MainController{
    public function __construct(){
        parent::__construct();
        Session::init();
        Session::checkSession();
        $role = Session::get('user_role');
        if($role == 'student' || $role == 'data_entry'){
            header('Location:'.BASE_URL);
        }
    }

    public function index(){
        self::allAccount();
    }

    public function allAccount(){
        $pageName = ['pageName' => 'Manage All User'];
        $this->load->view('partials/header', $pageName);

        $simpleModel = $this->load->model('SimpleModel');
        $cond = "user_role != 'admin'";
        $table['list'] = $simpleModel->getAll('users', $cond);

        $cond = "user_role = 'admin' OR user_role = 'manager'";
        $table['users'] = $simpleModel->getAll('users', $cond);

        $this->load->view('admin/manageAllAccount', $table);
        $this->load->view('partials/footer');
    }

    public function addNew(){
        $simpleModel = $this->load->model('SimpleModel');
        Session::init();
        $data =[
            'full_name'         => $_POST['full_name'],
            'user_name'         => $_POST['user_name'],
            'password'          => md5($_POST['password']),
            'user_role'         => $_POST['user_role'],
            'account_status'    => '1',
            'modified_by'       =>  session::get('id')
        ];
        $res = $simpleModel->insert('users',$data);
        if($res){
            header("Location: ".BASE_URL."/manageallaccount");
        }else{
            var_dump($res);
        }
    }

    public function disable(){
        $user_id = $_POST['disable'];
        $cond = "id = $user_id";
        Session::init();
        $data =[
            'account_status' => '0',
            'modified_by'    => Session::get('id')
        ];
        $simpleModel = $this->load->model('simpleModel');
        $res = $simpleModel->update('users', $data, $cond);
        if($res){
            header("Location: ".BASE_URL."/manageallaccount");
        }
        else {
            echo "Error Mofo check your shitty code.";
        }
    }

    public function enable(){
        $user_id = $_POST['enable'];
        $cond = "id = $user_id";
        Session::init();
        $data =[
            'account_status' => '1',
            'modified_by'    => Session::get('id')
        ];
        $simpleModel = $this->load->model('simpleModel');
        $res = $simpleModel->update('users', $data, $cond);
        if($res){
            header("Location: ".BASE_URL."/manageallaccount");
        }
        else {
            var_dump($session_id);
            echo "Error Mofo check your shitty code.";
        }
    }


}