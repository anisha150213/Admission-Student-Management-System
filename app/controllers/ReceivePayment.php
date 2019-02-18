<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/31/2017
 * Time: 9:53 PM
 */

class ReceivePayment extends MainController{
    public function __construct(){
        parent::__construct();
        Session::init();
        Session::checkSession();
        $role = Session::get('user_role');
        if($role == 'student'){
            header('Location:'.BASE_URL);
        }
    }

    public  function index(){
        self::main();
    }

    public function main(){
        $simpleModel = $this->load->model('SimpleModel');
        $costModel = $this->load->model('CostModel');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $form_serial = $_POST['form_number'];
            $amount = $_POST['amount'];
            $isSpecial = '0';
            if(isset($_POST['is_special'])){
                $isSpecial = '1';
            }

            Session::init();
            $id = Session::get('id');
            $cond = "serial_number = '$form_serial'";
            $formID = $simpleModel->getAll('form_sell', $cond);
            $formID = $formID[0]['id'];

            $table = [
                'form_id' => $formID,
                'transaction_name' => 'Form purchased',
                'amount' => $amount,
                'is_income' => '1',
                'is_special' => $isSpecial,
                'modified_by' => $id,
            ];
            $res = $simpleModel->insert('cost', $table);

        }
        $cond = "user_role = 'admin' OR user_role = 'manager' OR user_role = 'data_entry' ";
        $data['user'] = $simpleModel->getAll('users', $cond);
        $data['table'] = $costModel->getAllCostDetailWithDue();

        $pageName = ['pageName' => 'Receive Payment'];
        $this->load->view('partials/header', $pageName);
        $this->load->view('admin/receive_payment', $data);
        $this->load->view('partials/footer');
    }

}