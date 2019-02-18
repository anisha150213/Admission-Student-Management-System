<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/12/2017
 * Time: 3:49 PM
 */

class Unit extends MainController{
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
        self::unit();
    }

    public function unit($value = false){
        $pageName=['pageName' => 'Unit'];
        $this->load->view('partials/header', $pageName);

        $simpleModel = $this->load->model('SimpleModel');
        $exploded = explode('=', $value);

        if($exploded[0] == 'university'){
            $cond = "university_id = $exploded[1]";
            $table['list'] = $simpleModel->getAll('unit', $cond);
        }elseif ($exploded[0] == 'session'){
            $cond = "session_id = $exploded[1]";
            $table['list'] = $simpleModel->getAll('unit', $cond);
        }else{
            $table['list'] = $simpleModel->getAll('unit');
        }
        $table['university'] = $simpleModel->getAll('university');
        $table['session'] =$simpleModel->getAll('session');
        $cond = "user_role = 'admin' OR user_role = 'manager'";
        $table['users'] = $simpleModel->getAll('users', $cond);

        $this->load->view('admin/unit',$table);
        $this->load->view('partials/footer');
    }

    public function addNew(){
        $simpleModel = $this->load->model('SimpleModel');
        Session::init();
        $data = [
            'unit_name' => $_POST['unit_name'],
            'university_id' => $_POST['university'],
            'session_id' => $_POST['session'],
            'start_date_time' => date( 'Y-m-d H:i:s', strtotime($_POST['starting_time'])),
            'end_date_time' => date( 'Y-m-d H:i:s', strtotime($_POST['ending_time'])),
            'selection_date_time' => date( 'Y-m-d H:i:s', strtotime($_POST['selection_time'])),
            'exam_date_time' => date( 'Y-m-d H:i:s', strtotime($_POST['exam_time'])),
            'form_price' => $_POST['form_price'],
            'service_charge' => $_POST['service_charge'],
            'detail' => $_POST['details'],
            'modified_by' => Session::get('id')
        ];
        $res = $simpleModel->insert('unit', $data);
        if($res){
            header('Location:'.BASE_URL.'/unit');
        }else{
            var_dump($res);
        }
//        write to database
//        echo  "<br>".date( 'Y-m-d H:i:s', strtotime($data['start_date_time']));
//        echo  "<br>".date( 'Y-m-d H:i:s', strtotime($data['end_date_time']));
//        load from database
//        echo  "<br>".date( 'Y-m-d\TH:i', strtotime('2017-01-01 01:00:00'));
//        echo  "<br>".date( 'Y-m-d\TH:i', strtotime('2017-01-01 13:00:00'));
    }

    public function update()
    {
        $simpleModel = $this->load->model('SimpleModel');
        Session::init();
        $data = [
            'unit_name' => $_POST['unit_name'],
            'university_id' => $_POST['university'],
            'session_id' => $_POST['session'],
            'start_date_time' => date('Y-m-d H:i:s', strtotime($_POST['starting_time'])),
            'end_date_time' => date('Y-m-d H:i:s', strtotime($_POST['ending_time'])),
            'selection_date_time' => date('Y-m-d H:i:s', strtotime($_POST['selection_time'])),
            'exam_date_time' => date('Y-m-d H:i:s', strtotime($_POST['exam_time'])),
            'form_price' => $_POST['form_price'],
            'service_charge' => $_POST['service_charge'],
            'detail' => $_POST['details'],
            'modified_by' => Session::get('id')
        ];
        $unitId = $_POST['unit_id'];
        $cond = "id = $unitId";

        $res = $simpleModel->update('unit', $data, $cond);
        if ($res) {
            header('Location:' . BASE_URL . '/unit');
        } else {
            var_dump($data);
            var_dump($cond);
            var_dump($res);
        }
    }

    public function delete(){
        $simpleModel = $this->load->model('SimpleModel');
        $unitId = $_POST['delete'];
        $cond = "id = $unitId";
        $res = $simpleModel->delete('unit',$cond);
        if($res){
            header('Location:'.BASE_URL.'/unit');
        } else{
            var_dump($res);
        }
    }

    public function unitDetail($unit_id){
        $pageName=['pageName' => 'Unit'];
        $this->load->view('partials/header', $pageName);

        $simpleModel = $this->load->model('SimpleModel');
        $cond = "id = $unit_id";
        $unit['unit'] = $simpleModel->getAll('unit', $cond);
        $unit['session'] =$simpleModel->getAll('session');
        $unit['university'] =$simpleModel->getAll('university');

        $this->load->view('admin/unitDetails', $unit);
        $this->load->view('partials/footer');
    }
}