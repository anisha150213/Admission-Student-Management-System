<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 11/1/2017
 * Time: 7:38 AM
 */

class Cost extends MainController {
    public function __construct(){
        parent::__construct();
        Session::init();
        Session::checkSession();
        $role = Session::get('user_role');
        if($role == 'student'){
            header('Location:'.BASE_URL);
        }
    }

    public function index()
    {
        self::main();
    }

    public function main(){
        $pageName = ['pageName' => 'All Cost'];
        $costModel = $this->load->model('CostModel');
        $simpleModel = $this->load->model('SimpleModel');
        $cond = "user_role = 'admin' OR user_role = 'manager' OR user_role = 'data_entry' ";
        $data['user'] = $simpleModel->getAll('users', $cond);
        $data['table'] = $costModel->getAll();
        $this->load->view('partials/header', $pageName);
        $this->load->view('admin/cost', $data);
        $this->load->view('partials/footer');
    }
}