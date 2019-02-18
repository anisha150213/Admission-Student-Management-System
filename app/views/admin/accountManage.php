<div class="col-9">
    <h1 style="text-align: center">Account Manage</h1>
    <span class="text-danger text-center"><?php
        if(isset($data['msg'])){
            echo $data['msg'];
        }
        ?></span>
    <form id="data_form" method="post" class="row justify-content-around" style="padding-top: 10px">
        <div class="col-8 form-group row">
            <label for="username" class="col-2 col-form-label">User Name</label>
            <div class="col-9">
                <label class="form-control" type="text" id="username" name="fullname"><?php echo $data[0]['user_name'] ?></label>
            </div>
        </div>
        <div class="col-8 form-group row">
            <label for="fullname" class="col-2 col-form-label">Full Name</label>
            <div class="col-9">
                <input class="form-control" type="text" id="fullname" name="fullname" disabled="disabled" value="<?php echo $data[0]['full_name'] ?>" />
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-link" id="btnEdit" onclick="editName();">Edit</button>
                <button type="submit" class="btn btn-link" id="btnUpdate" style="display: none">Update</button>
            </div>
        </div>
    </form>
        <div class="crtbtn col-12">
            <p>Wanna change Your Password?? <a href="#" style = "color:red" id="password" data-toggle="modal" data-target="#ChangePassword">Yes</a></p>
        </div>

</div>

<div id="ChangePassword" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="password_form" action="<?php echo BASE_URL?>/AccountManage/updatePassword" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="modal_title">Change Password</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required = "1" />
                    </div>
                    <div class="col">
                        <label for="new_password" >New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" required = "1" />
                    </div>
                    <div class="col">
                        <label for="confirm_password" >Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" required = "1" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-info" value="Change" />
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function editName() {
        $('#fullname').prop('disabled',false);
        $('#btnEdit').css('display','none');
        $('#btnUpdate').css('display','block');
        $('#data_form').attr('action','http://localhost/se_addmission/AccountManage/updateName');
    }
</script>