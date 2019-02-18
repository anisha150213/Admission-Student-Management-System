<?php
/**
 * Created by PhpStorm.
 * User: Akib
 * Date: 10/19/2017
 * Time: 12:42 PM
 */

class UnitProcedureModel extends MainModel{
    public function __construct(){
        parent::__construct();
    }

    public function getAllUnit(){
        $sql = "SELECT unit.id, unit.unit_name, unit.start_date_time, unit.end_date_time, unit.form_price, 
                unit.service_charge, university.name , session.session FROM unit 
                INNER JOIN university ON unit.university_id = university.id
                INNER JOIN session ON unit.session_id = session.id";

        return $this->db->select($sql);
    }

    public function getAllProcedureByFormId($formId){
        $sql = "SELECT unit_procedure_status.id, unit_procedure_list.procedure_serial, procedure_list.name, unit_procedure_list.cost,
                unit_procedure_list.is_text, unit_procedure_status.value, unit_procedure_status.unit_procedure_list_id
                FROM unit_procedure_status
                INNER JOIN unit_procedure_list ON unit_procedure_list.id = unit_procedure_status.unit_procedure_list_id
                INNER JOIN procedure_list on unit_procedure_list.procedure_list_id = procedure_list.id
                WHERE unit_procedure_status.form_sell_id = $formId
                ORDER BY unit_procedure_list.procedure_serial ASC";

        return $this->db->select($sql);
    }
}