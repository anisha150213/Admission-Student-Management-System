<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/12/2017
 * Time: 6:16 AM
 */

class University extends MainController
{
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
        self::university();
    }

    public function university(){
        $data = ['pageName' => 'University'];
        $this->load->view("partials/header", $data);

        $simpleModel = $this->load->model('SimpleModel');
        $table['list'] = $simpleModel->getAll('university');

        $cond = "user_role = 'admin' OR user_role = 'manager'";
        $table['users'] = $simpleModel->getAll('users', $cond);

        $this->load->view("admin/university", $table);
        $this->load->view("partials/footer");
    }

    public function addNew(){
        $simpleModel = $this->load->model('SimpleModel');
        Session::init();
        $data =[
            'name'        =>  $_POST['session_name'],
            'modified_by' =>  session::get('id')
        ];
        $res = $simpleModel->insert('university',$data);
        if($res){
            header("Location: ".BASE_URL."/University");
        }else{
            var_dump($res);
        }
    }

    public function update(){
        $simpleModel = $this->load->model('SimpleModel');
        Session::init();
        $data =[
            'name'        =>  $_POST['session_name'],
            'modified_by' =>  Session::get('id')
        ];
        $session_id = $_POST['session_id'];
        $cond = "id = $session_id";
        $res = $simpleModel->update('university',$data, $cond);
        if($res){
            header("Location: ".BASE_URL."/University");
        }
        else {
            var_dump($session_id);
            echo "Error Mofo check your shitty code.";
        }
    }

    public function delete(){
        $session_id = $_POST['delete'];
        $cond = "id = $session_id";
        $simpleModel = $this->load->model('simpleModel');
        $res = $simpleModel->delete('university', $cond);
        if($res){
            header("Location: ".BASE_URL."/University");
        }
        else {
            var_dump($session_id);
            echo "Error Mofo check your shitty code.";
        }
    }
}