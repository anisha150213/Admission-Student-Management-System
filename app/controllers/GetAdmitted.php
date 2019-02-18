<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/19/2017
 * Time: 11:22 PM
 */

class GetAdmitted extends MainController{

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
        self::studentUnitDetail();
    }

    public function studentUnitDetail(){
        $pageName = ['pageName' => 'All University'];

        $unitProcedureModel = $this->load->model('UnitProcedureModel');

        $data['table'] = $unitProcedureModel->getAllUnit();

        $this->load->view('partials/headerPublic', $pageName);
        $this->load->view('students/unitDetail',$data);
        $this->load->view('partials/footer');
    }

    public function apply(){
        Session::init();
        $studentModel = $this->load->model('StudentModel');
        $simpleModel = $this->load->model('SimpleModel');
        $userId =  Session::get('id');
        $student = $studentModel->getStudentByUserId($userId);
        $studentId = $student[0]['id'];
        $unitId = $_POST['unit_id'];
        $lastFormSellId = $simpleModel->getMaxId('form_sell');
        If($lastFormSellId[0]['MAX(id)'] != null){
            $lastFormSellId = $lastFormSellId[0]['MAX(id)'];
            $cond = "id = $lastFormSellId";
            $lastFormSerial = $simpleModel->getAll('form_sell', $cond);
            $lastFormSerial = (int)$lastFormSerial[0]['serial_number'];
            $formSerial = $lastFormSerial + 1;
        }else{
            $formSerial = 1;
        }


        $data = [
            'student_id' => $studentId,
            'unit_id' => $unitId,
            'serial_number' => $formSerial,
            'is_approve' => '0',
            'Modified_by' => $userId
        ];

        $res = $simpleModel->insert('form_sell', $data);
        if($res){
            header('Location:'.BASE_URL.'/MyForms');
        }else{
            var_dump($res);
        }


    }

}