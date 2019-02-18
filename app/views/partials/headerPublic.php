<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost/se_addmission/vendors/css/bootstrap.min.css">
    <title><?php echo "$pageName"; ?></title>
    <script src="http://localhost/se_addmission/vendors/js/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="http://localhost/se_addmission/vendors/js/popper.min.js" charset="utf-8"></script>
    <script src="http://localhost/se_addmission/vendors/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="http://localhost/se_addmission/vendors/js/jquery.dataTables-1.10.16.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="http://localhost/se_addmission/vendors/css/jquery.dataTables-1.10.16.min.css" />
    <link rel="stylesheet" href="http://localhost/se_addmission/vendors/css/site.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admission Registration</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            Session::init();
            $status = Session::get('login');
            if($status == 'true'){?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL?>/StudentAccountManage">Account Manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL?>/result">Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL?>/getAdmitted">Get Admitted</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL?>/MyForms">My Forms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL?>/paymentHistory">Payment History</a>
                </li>
            <?php }?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            Session::init();
            $status = Session::get('login');
            if($status == 'true'){?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL?>/Login/logout">Logout</a>
                </li>
            }
            <?php }else{?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL?>/Registration">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL?>/Login">Login</a>
                </li>
            <?php }?>
        </ul>
    </div>
</nav>
<div class="container-fluid" id="content">
