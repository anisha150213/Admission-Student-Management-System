<?php
/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/19/2017
 * Time: 11:43 PM
 */

class UnitDetail extends MainController{
    public function __construct(){
        parent::__construct();
        Session::checkSession();
    }

    public function index(){
        self::unitDetail();
    }

    public function unitDetail($unit_id){
        $pageName=['pageName' => 'Unit'];
        $this->load->view('partials/headerPublic', $pageName);

        $simpleModel = $this->load->model('SimpleModel');
        $cond = "id = $unit_id";
        $unit['unit'] = $simpleModel->getAll('unit', $cond);
        $unit['session'] =$simpleModel->getAll('session');
        $unit['university'] =$simpleModel->getAll('university');

        $this->load->view('admin/unitDetails', $unit);
        $this->load->view('partials/footer');
    }
}