<div class="col-9">
    <h1 style="text-align: center">Student Detail</h1>
    <div style="padding-top: 10px">
        <div class="col-12 row">
            <div class="col-6 from-control row">
                <label for="fullname" class="col-4 col-form-label">Full Name</label>
                <div class="col-8">
                    <label class="form-control" type="text" id="fullname" name="fullname" ><?php echo $data['user'][0]['full_name']?></label>
                </div>
            </div>
            <div class="col-6 from-control row">
                <label for="username" class="col-4 col-form-label">Username</label>
                <div class="col-8">
                    <label class="form-control" type="text" id="username" name="username" ><?php echo $data['user'][0]['user_name']?></label>
                </div>
            </div>
        </div>

        <div class="col-12 row">
            <div class="col-6 form-group row">
                <label for="fathername" class="col-4 col-form-label">Father's Name</label>
                <div class="col-8">
                    <label class="form-control" type="text" id="fathername" name="fathername" ><?php echo $data['student'][0]['father_name']?></label>
                </div>
            </div>
            <div class="col-6 from-control row">
                <label for="mothername" class="col-4 col-form-label">Mother's Name</label>
                <div class="col-8">
                    <label class="form-control" type="text" id="mothername" name="mothername" ><?php echo $data['student'][0]['mother_name']?></label>
                </div>
            </div>
        </div>

        <div class="col-12 form-group row">
            <div class="col-2">
                <span><b>Present Address</b></span>
            </div>
            <div class="col-10">
        		<textarea class="form-control" disabled="disabled"  >
                    <?php
                    echo $data['student'][0]['present_street_village'].", ".$data['student'][0]['present_Upozilla_thana'].", Post: ".$data['student'][0]['present_post_code'].", ".$data['student'][0]['present_district'].", ".$data['student'][0]['present_division'];
                    ?>
                </textarea>
            </div>
        </div>
        <br>
        <div class="col-12 form-group row">
            <div class="col-2">
                <span><b>Parmanent Address</b></span>
            </div>
            <div class="col-10">
        		<textarea disabled="disabled" class="form-control" >
                    <?php
                    echo $data['student'][0]['permanent_street_village'].", ".$data['student'][0]['permanent_Upozilla_thana'].", Post: ".$data['student'][0]['permanent_post_code'].", ".$data['student'][0]['permanent_district'].", ".$data['student'][0]['permanent_division'];
                    ?>
                </textarea>
            </div>
        </div>
        <br><br>
        <div class="col-12 form-group row">
            <label for="gender" class="col-2 col-form-label">Gender</label>
            <div class="col-10">
                <label class="form-control" type="text" id="perdivision" name="perdivision" >
                    <?php
                    if($data['student'][0]['gender'] == '1'){
                        echo "male";
                    }elseif ($data['student'][0]['gender'] == '2'){
                        echo "female";
                    }elseif ($data['student'][0]['gender'] == '3'){
                        echo "other";
                    }
                    ?>
                </label>
            </div>
        </div>
        <br>
        <div class="col-12 form-group row">
            <label for="mobile" class="col-2 col-form-label">Mobile No</label>
            <div class="col-10">
                <label class="form-control" type="text" pattern="[0-9]{11}" id="mobile" name="mobile" ><?php echo $data['student'][0]['mobile']?></label>
            </div>
        </div>

        <div class="col-12 form-group row">
            <label for="altermobile" class="col-2 col-form-label">Alternative Mobile No</label>
            <div class="col-10">
                <label class="form-control" type="text" pattern="[0-9]{11}" id="altermobile" name="altermobile" ><?php echo $data['student'][0]['alternative_mobile']?></label>
            </div>
        </div>

        <div class="col-12 form-group row">
            <label for="fathermobile" class="col-2 col-form-label">Father's Mobile No</label>
            <div class="col-10">
                <label class="form-control" type="text" pattern="[0-9]{11}" id="fathermobile" name="fathermobile" ><?php echo $data['student'][0]['father_mobile']?></label>
            </div>
        </div>

        <h4 style="text-align: center">SSC/O-Level/Dakhil Result</h4>
        <table class="table table-light table-responsive">
            <thead>
            <tr>
                <th></th>
                <th width="20%">Board</th>
                <th>Year</th>
                <th>Registration Number</th>
                <th>Roll Number</th>
                <th>GPA</th>
            </tr>
            </thead>
            <tbody>
            <form method="post" action="<?php echo BASE_URL?>/StudentAccountManage/updateScc">
                <tr>
                    <td>SSC/O-Level/Dakhil</td>
                    <td>
                        <label class="form-control"><?php
                            foreach ($data['board'] as $key => $value){
                                if($data['student'][0]['ssc_board_id'] == $value['id']){
                                    echo $value['name'];
                                }
                            }
                            ?></label>
                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['ssc_year']?></label>

                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['ssc_registration_number']?></label>
                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['ssc_roll_number']?></label>
                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['ssc_gpa']?></label>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
        <br>
        <!--        <h4>SSC/O-level/Dakhil Marks</h4>-->
        <table class="table table-light table-responsive">
            <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Grade</th>
                <th>Marks</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['ssc_result'] as $key => $value){?>
                <tr>
                    <td><label class="form-control"><?php echo $value['code']?></label></td>
                    <td><label class="form-control"><?php echo $value['name']?></label></td>
                    <td><label class="form-control"><?php echo $value['marks']?></label></td>
                    <td><label class="form-control"><?php echo $value['grade']?></label></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <h4 style="text-align: center">HSC/A-level/Alim Result</h4>
        <table class="table table-light table-responsive">
            <thead>
            <tr>
                <th></th>
                <th width="20%">Board</th>
                <th>Year</th>
                <th>Registration Number</th>
                <th>Roll Number</th>
                <th>GPA</th>
            </tr>
            </thead>
            <tbody>
            <form method="post" action="<?php echo BASE_URL?>/StudentAccountManage/updateHcc">
                <tr>
                    <td>HSC/A-Level/Alim</td>
                    <td>
                        <label class="form-control"><?php
                            foreach ($data['board'] as $key => $value){
                                if($data['student'][0]['hsc_board_id'] == $value['id']){
                                    echo $value['name'];
                                }
                            }
                            ?></label>
                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['hsc_year']?></label>

                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['hsc_registration_number']?></label>
                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['hsc_roll_number']?></label>
                    </td>
                    <td>
                        <label class="form-control"><?php echo $data['student'][0]['hsc_gpa']?></label>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
        <!--        <h4>HSC/A-level/Alim Marks</h4>-->
        <br>
        <table class="table table-light table-responsive">
            <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Grade</th>
                <th>Marks</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['hsc_result'] as $key => $value){?>
                <tr>
                    <td><label class="form-control"><?php echo $value['code']?></label></td>
                    <td><label class="form-control"><?php echo $value['name']?></label></td>
                    <td><label class="form-control"><?php echo $value['marks']?></label></td>
                    <td><label class="form-control"><?php echo $value['grade']?></label></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <h4 style="text-align: center">Form Application</h4>
        <table class="table table-light table-responsive">
            <thead>
            <tr>
                <th>University</th>
                <th>Unit</th>
                <th>Session</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['form'] as $key => $value){?>
                <tr>
                    <td><label class="form-control"><?php echo $value['name']?></label></td>
                    <td><label class="form-control"><?php echo $value['unit_name']?></label></td>
                    <td><label class="form-control"><?php echo $value['session']?></label></td>
                    <td><label class="form-control"><?php if($value['is_approve'] == '1'){echo 'Approved';}else{echo 'Not Approved';} ?></label></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!---->
<!--<script>-->
<!--    function btn_edit_ssc() {-->
<!--        $('#sscboard').prop('disabled', false);-->
<!--        $('#sscyear').prop('disabled', false);-->
<!--        $('#sscregno').prop('disabled', false);-->
<!--        $('#sscrollno').prop('disabled', false);-->
<!--        $('#sscgpa').prop('disabled', false);-->
<!--        $('#btnEditSsc').css('display', 'none');-->
<!--        $('#btnUpdateSsc').css('display', 'block');-->
<!--    }-->
<!---->
<!--    function btn_edit_hsc() {-->
<!--        $('#hscboard').prop('disabled', false);-->
<!--        $('#hscyear').prop('disabled', false);-->
<!--        $('#hscregno').prop('disabled', false);-->
<!--        $('#hscrollno').prop('disabled', false);-->
<!--        $('#hscgpa').prop('disabled', false);-->
<!--        $('#btnEditHsc').css('display', 'none');-->
<!--        $('#btnUpdateHsc').css('display', 'block');-->
<!--    }-->
<!---->
<!--</script>-->
