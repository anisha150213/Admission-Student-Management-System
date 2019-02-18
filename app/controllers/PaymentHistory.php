<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 11/1/2017
 * Time: 2:07 AM
 */

class PaymentHistory extends MainController{
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
        Session::init();
        $id = Session::get('id');
        $costModel = $this->load->model('CostModel');
        $data['table'] = $costModel->getAllCostDetailWithDue($id);

        $pageName = ['pageName' => 'Payment History'];
        $this->load->view('partials/headerPublic', $pageName);
        $this->load->view('students/payment_history', $data);
        $this->load->view('partials/footer');
    }
}