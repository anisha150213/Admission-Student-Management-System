<?php
/**
 * Created by PhpStorm.
 * User: Anik
 * Date: 10/19/2017
 * Time: 12:21 PM
 */

class UnitProcedureList extends MainController{
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
        self::unitProcedureList();
    }

    public function unitProcedureList($unit = false){

        $pageName = ['pageName' => 'Unit Procedure List'];


        $unitProcedureModel = $this->load->model('UnitProcedureModel');
        $simpleModel= $this->load->model('SimpleModel');
        $data['procedure'] = $simpleModel->getAll('procedure_list');
        $data['unit'] = $unitProcedureModel->getAllUnit();

        if($unit){
            $data['unit_id'] = $unit;
        }else{
            $data['unit_id'] = $data['unit'][0]['id'];
        }
        $unit_id = $data['unit_id'];
        $cond = "unit_id = $unit_id";
        $data['table'] =  $simpleModel->getAll('unit_procedure_list', $cond);

        $cond = "user_role = 'admin' OR user_role = 'manager'";
        $data['users'] = $simpleModel->getAll('users', $cond);

        $this->load->view('partials/header', $pageName);
        $this->load->view('admin/unit_procedure_list', $data);
        $this->load->view('partials/footer');
    }

    public function add(){
        $serial = $_POST['serial'];
        $procedure = $_POST['procedure'];
        if(isset($_POST['input_type'])){
            $type = $_POST['input_type'];
        }else{
            $type = '0';
        }
        $cost = $_POST['cost'];
        $unit_id = $_POST['unit_id'];

        Session::init();
        $user_id = Session::get('id');

        $simpleModel = $this->load->model('SimpleModel');

        $data = [
            'unit_id' => $unit_id,
            'procedure_list_id' => $procedure,
            'procedure_serial' => $serial,
            'is_text' => $type,
            'cost' => $cost,
            'modified_by' => $user_id
        ];
        var_dump($data);

        $res = $simpleModel->insert('unit_procedure_list', $data);
        if($res) {
            header('Location:'.BASE_URL.'/UnitProcedureList/unitProcedureList/'.$unit_id);
        }else{
            var_dump($res);
        }
    }

    public function update(){
        $unitId = $_POST['unit_id'];
        $serial = $_POST['serial'];
        $procedure = $_POST['procedure'];
        if(isset($_POST['input_type'])){
            $input_type = $_POST['input_type'];
        }else{
            $input_type = '0';
        }
        $cost = $_POST['cost'];
        $id = $_POST['unit_procedure_id'];
        Session::init();
        $userId = Session::get('id');
        $simpleModel = $this->load->model('SimpleModel');
        $cond = "id = $id";
        $data = [
            'procedure_list_id' => $procedure,
            'procedure_serial' => $serial,
            'is_text' => $input_type,
            'cost' => $cost,
            'modified_by' => $userId
        ];
        $res = $simpleModel->update('unit_procedure_list',$data, $cond);
        if($res){
            header('Location:'.BASE_URL.'/UnitProcedureList/unitProcedureList/'.$unitId);
        }else{
            var_dump($res);
        }
    }

    public function updateSelect(){
        $unit_id = $_POST['university'];
//        $str= 'Location:'.BASE_URL.'/UnitProcedureList/unitProcedureList/'.$unit_id;
//        var_dump($str);
        header('Location:'.BASE_URL.'/UnitProcedureList/unitProcedureList/'.$unit_id);
    }

    public function delete(){
        $unit_id = $_POST['unit_id'];
        $unitProcedureListId = $_POST['delete'];
        $simpleModel = $this->load->model('SimpleModel');
        $cond = "id =  $unitProcedureListId";
        $res = $simpleModel->delete('unit_procedure_list', $cond);

        if($res){
            header('Location:'.BASE_URL.'/UnitProcedureList/unitProcedureList/'.$unit_id);
        }else{
            var_dump($res);
        }

    }
}