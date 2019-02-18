<?php

/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/10/2017
 * Time: 10:36 AM
 */
class Board extends MainController{
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
        self::board();
    }

    public function board(){
        $pageName=['pageName' => 'Board'];
        $this->load->view('partials/header', $pageName);

        $simpleModel = $this->load->model('SimpleModel');
        $table['list']  = $simpleModel->getAll('board');

        $cond = "user_role = 'admin' OR user_role = 'manager'";
        $table['users'] = $simpleModel->getAll('users', $cond);

        $this->load->view('admin/board', $table );
        $this->load->view('partials/footer');
    }

    public function addNew(){
        $simpleModel = $this->load->model('SimpleModel');
        session::init();
        $data =[
          'name'        =>  $_POST['board_name'],
          'modified_by' =>  session::get('id')
        ];
        $res = $simpleModel->insert('board',$data);
        if($res){
            header("Location: ".BASE_URL."/Board");
        }
    }

    public function update(){
        $simpleModel = $this->load->model('SimpleModel');
        session::init();
        $data =[
          'name'        =>  $_POST['board_name'],
          'modified_by' =>  session::get('id')
        ];
        $board_id = $_POST['board_id'];
        $cond = "id = $board_id";
        $res = $simpleModel->update('board',$data, $cond);
        if($res){
            header("Location: ".BASE_URL."/Board");
        }
        else {
            var_dump($board_id);
            echo "Error Mofo check your shitty code.";
        }
    }

    public function delete(){
        $board_id = $_POST['delete'];
        $cond = "id = $board_id";
        $simpleModel = $this->load->model('simpleModel');
        $res = $simpleModel->delete('board', $cond);
        if($res){
            header("Location: ".BASE_URL."/Board");
        }
        else {
            var_dump($board_id);
            echo "Error Mofo check your shitty code.";
        }
    }
}
