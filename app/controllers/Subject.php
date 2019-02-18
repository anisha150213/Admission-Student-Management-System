<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/12/2017
 * Time: 7:59 AM
 */

class Subject extends MainController{
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
        self::subject();
    }

    public function subject(){
        $data = ['pageName' => 'Subjects'];
        $this->load->view("partials/header", $data);

        $simpleModel = $this->load->model('SimpleModel');

        $table['list']  = $simpleModel->getAll('subject');

        $cond = "user_role = 'admin' OR user_role = 'manager'";
        $table['users'] = $simpleModel->getAll('users', $cond);

        $this->load->view("admin/subject", $table);
        $this->load->view("partials/footer");
    }

    public function addNew(){
        $simpleModel = $this->load->model('SimpleModel');
        Session::init();
        $data =[
            'code'              =>  $_POST['sub_code'],
            'name'              =>  $_POST['sub_name'],
            'exam_type'      =>  $_POST['sub_type'],
            'modified_id'       =>  session::get('id')
        ];
        $res = $simpleModel->insert('subject',$data);
        if($res){
            header("Location: ".BASE_URL."/Subject");
        }else{
            var_dump($res);
        }
    }

    public function update(){
        $simpleModel = $this->load->model('SimpleModel');
        Session::init();
        $data =[
            'code'        =>  $_POST['sub_code'],
            'name'        =>  $_POST['sub_name'],
            'exam_type'   =>  $_POST['sub_type'],
            'modified_id' =>  session::get('id')
        ];
        $sub_id = $_POST['sub_id'];
        $cond = "id = $sub_id";
        $res = $simpleModel->update('subject',$data, $cond);
        if($res){
            header("Location: ".BASE_URL."/Subject");
        }
        else {
            var_dump($sub_id);
            echo "Error Mofo check your shitty code.";
        }
    }

    public function delete(){
        $sub_id = $_POST['delete'];
        $cond = "id = $sub_id";
        $simpleModel = $this->load->model('simpleModel');
        $res = $simpleModel->delete('subject', $cond);
        if($res){
            header("Location: ".BASE_URL."/Subject");
        }
        else {
            var_dump($sub_id);
            echo "Error Mofo check your shitty code.";
        }
    }
}
