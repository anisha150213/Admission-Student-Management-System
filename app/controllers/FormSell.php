<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/20/2017
 * Time: 11:57 AM
 */

class FormSell extends MainController{
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
        $pageName = ['pageName' => 'Form sell'];

        $formSellModel = $this->load->model('FormSellModel');

        $data['table'] = $formSellModel->getFormDetail();

        $this->load->view('partials/header', $pageName);
        $this->load->view('admin/requestedStudent', $data);
        $this->load->view('partials/footer');
    }

    public function approve(){
        Session::init();
        $userId = Session::get('id');
        $simpleModel = $this->load->model('SimpleModel');
        $unitId = $_POST['unit_id'];
        $formSellId = $_POST['form_sell_id'];
        $cond = "unit_id = $unitId";
        $unitProcedureList = $simpleModel->getAll('unit_procedure_list', $cond);
        foreach ($unitProcedureList as $key => $value){
            $data=[
                'form_sell_id' => $formSellId,
                'unit_procedure_list_id' => $value['id'],
                'modified_by' => $userId
            ];
            $simpleModel->insert('unit_procedure_status', $data);
        }

        $cond = "id = $formSellId";
        $data = [
            'is_approve' => '1'
        ];
        $res = $simpleModel->update('form_sell', $data, $cond);
        if($res){
            header('Location:'.BASE_URL.'/FormSell');
        }else{
            var_dump($res);
        }

    }

}