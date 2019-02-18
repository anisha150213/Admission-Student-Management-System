<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/23/2017
 * Time: 8:03 AM
 */

class MyForms extends MainController{
    public function __construct(){
        parent::__construct();
        Session::init();
        Session::checkSession();
        $role = Session::get('user_role');
        if($role != 'student'){
            header('Location:'.BASE_URL);
        }
    }

    public function index(){
        self::main();
    }

    public function main(){
        $pageName = ['pageName' => 'My Forms'];
        $formSellModel = $this->load->model('FormSellModel');

        $data['table'] = $formSellModel->getFormDetail();
        $this->load->view('partials/headerPublic', $pageName);
        $this->load->view('students/myForms', $data);
        $this->load->view('partials/footer');
    }

    public function FormProgress($formId = false){
        if($formId != false){
            $pageName = ['pageName' => 'Form Progress'];

            $simpleModel = $this->load->model('SimpleModel');
            $unitProcedureModel = $this->load->model('UnitProcedureModel');

            $cond = "id = $formId";
            $data['formSerial'] = $simpleModel->getAll('form_sell', $cond);
            $data['table'] = $unitProcedureModel->getAllProcedureByFormId($formId);


            $this->load->view('partials/headerPublic', $pageName);
            $this->load->view('students/formProgress',$data);
            $this->load->view('partials/footer');
        }else{
            header('Location:'.BASE_URL);
        }
    }


}