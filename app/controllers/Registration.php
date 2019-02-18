<?php

/**
 * Created by PhpStorm.
 * User: anik
 * Date: 10/11/2017
 * Time: 10:04 AM
 */
class Registration extends MainController{
    public function __construct(){
        parent::__construct();
    }

    public function Index(){
        self::registration();
    }

    public function registration($msg = false){
        if($msg){
            $data['msg'] = $msg;
        }
        $data['pageName'] = 'Register';
        $this->load->view('partials/headerPublic',$data);

        $simpleModel =$this->load->model('SimpleModel');
        $data['board'] = $simpleModel->getAll('board');

        $this->load->view('students/resgister',$data);
        $this->load->view('partials/footer');
    }

    public function regAuth(){
        if(isset($_POST)){
            $fullname           = $_POST['fullname'];
            $username           = $_POST['username'];
            $password           = $_POST['password'];
            $fathername         = $_POST['fathername'];
            $mothername         = $_POST['mothername'];
            $streetvillage      = $_POST['streetvillage'];
            $postcode1          = $_POST['postcode1'];
            $upozillathana      = $_POST['upozillathana'];
            $district           = $_POST['district'];
            $division           = $_POST['division'];
            $perstreetvillage   = $_POST['perstreetvillage'];
            $postcode2          = $_POST['postcode2'];
            $perupozillathana   = $_POST['perupozillathana'];
            $perdistrict        = $_POST['perdistrict'];
            $perdivision        = $_POST['perdivision'];
            $gender             = $_POST['gender'];
            $mobile             = $_POST['mobile'];
            $altermobile        = $_POST['altermobile'];
            $fathermobile       = $_POST['fathermobile'];
            $sscboard           = $_POST['sscboard'];
            $sscyear            = $_POST['sscyear'];
            $sscregno           = $_POST['sscregno'];
            $sscrollno          = $_POST['sscrollno'];
            $sscgpa             = $_POST['sscgpa'];
            $hscboard           = $_POST['hscboard'];
            $hscyear            = $_POST['hscyear'];
            $hscregno           = $_POST['hscregno'];
            $hscrollno          = $_POST['hscrollno'];
            $hscgpa             = $_POST['hscgpa'];
        }

        $simpleModel = $this->load->model('SimpleModel');

        $cond = "user_name = $username";
        $confirmUserName = $simpleModel->getAll('users', $cond);

        if($confirmUserName){
            header('Loaction:'.BASE_URL.'registration/User Name already exists');
        } else{
            $data = [
                'full_name' => $fullname,
                'user_name' => $username,
                'password'  => md5($password),
                'user_role' => 'student',
                'account_status' => '1'
            ];

            $lastId = $simpleModel->insert('users', $data);

            if($lastId){
                $updatedata = [
                    'modified_by' => $lastId
                ];
                $cond = "id = $lastId";
                $res = $simpleModel->update('users',$updatedata, $cond);

                if($res){
                    unset($data);
                    $data = [
                        'user_id'                   => $lastId,
                        'father_name'               => $fathername,
                        'mother_name'               => $mothername,
                        'present_street_village'    => $streetvillage,
                        'present_post_code'         => $postcode1,
                        'present_Upozilla_thana'    => $upozillathana,
                        'present_district'          => $district,
                        'present_division'          => $division,
                        'permanent_street_village'  => $perstreetvillage,
                        'permanent_post_code'       => $postcode2,
                        'permanent_Upozilla_thana'  => $perupozillathana,
                        'permanent_district'        => $perdistrict,
                        'permanent_division'        => $perdivision,
                        'gender'                    => $gender,
                        'mobile'                    => $mobile,
                        'alternative_mobile'        => $altermobile,
                        'father_mobile'             => $fathermobile,
                        'ssc_board_id'              => $sscboard,
                        'ssc_year'                  => $sscyear,
                        'ssc_registration_number'   => $sscregno,
                        'ssc_roll_number'           => $sscrollno,
                        'ssc_gpa'                   => $sscgpa,
                        'hsc_board_id'              => $hscboard,
                        'hsc_year'                  => $hscyear,
                        'hsc_registration_number'   => $hscregno,
                        'hsc_roll_number'           => $hscrollno,
                        'hsc_gpa'                   => $hscgpa,
                        'modified_by'               => $lastId
                    ];
                    $res = $simpleModel->insert('student',$data);
                    if($res){
                        header("Location: ".BASE_URL."/login");
                    }

                }
            }

        }


    }
}
