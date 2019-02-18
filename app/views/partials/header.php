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
    <nav class="container-fluid navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admission Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navs start -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL?>/Login/logout">Log out</a>
                </li>
            </ul>
            <!-- Navs Ends -->
        </div>
    </nav>
<div class="container-fluid" id="content" >
    <div class="row">
        <div class="col-3" id="sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="<?php echo BASE_URL?>/AccountManage" class="nav-link">Account Manage</a>
                </li>
                <?php
                    Session::init();
                    if(Session::get('user_role') == 'admin'){?>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL?>/CreateAccount" class="nav-link">Create Account</a>
                        </li>
                <?php }?>
                <?php
                    Session::init();
                    if(Session::get('user_role') == 'admin' || Session::get('user_role') == 'manager'){
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/manageallaccount" class="nav-link">Manage All Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/university" class="nav-link">University</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/unit" class="nav-link">Unit</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/usession" class="nav-link">Session</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/subject" class="nav-link">Subject</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/board" class="nav-link">Board</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/Quota" class="nav-link">Student quota</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/procedureList" class="nav-link">Procedure list</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL?>/unitprocedurelist" class="nav-link">Unit procedure list</a>
                    </li>
                <?php }?>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL?>/formsell" class="nav-link">Form sell</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL?>/ReceivePayment" class="nav-link">Receive Payment</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL?>/cost" class="nav-link">Cost</a>
                </li>
            </ul>
        </div>
