<div class="col-9">
    <h1 style="text-align: center">Create Account for Manager/Data Entry</h1>
    <form action="<?php echo BASE_URL?>/CreateAccount/main" method="post">
        <div class="row justify-content-around" style="padding-top: 10px">
            <?php if($data['user_error'] == true){?>
                <label class="text-danger">Username already exist</label>
                <br>
            <?php }?>
            <?php if($data['pass_error'] == true){?>
                <label class="text-danger">Password mismatched</label>
                <br>
            <?php }?>
            <?php if($data['success'] == true){?>
                <label class="text-success">Account creation Complete</label>
                <br>
            <?php }?>
            <div class="col-8 form-group row">
                <label class="col-2 col-form-label" for="">Full Name: </label>
                <input class="col-9 form-control" type="text" name="name" required>
            </div><br>
            <div class="col-8 form-group row">
                <label class="col-2 col-form-label" for="">Username: </label>
                <input class="col-9 form-control" type="text" name="user_name" required>
            </div><br>
            <div class="col-8 form-group row">
                <label class="col-2 col-form-label" for="">Password: </label>
                <input class="col-9 form-control" type="password" name="pass" required>
            </div><br>
            <div class="col-8 form-group row">
                <label class="col-2 col-form-label" for="">Confirm password: </label>
                <input class="col-9 form-control" type="password" name="con_pass" required>
            </div><br>
            <div class="col-8 form-group row">
                <label class="col-2 col-form-label" for="">Select Role: </label>
                <select name="role" id="role"class="col-9 form-control">
                    <option value="manager">Manager</option>
                    <option value="data_entry">Data Entry</option>
                </select>
            </div><br>
            <div class="col-8 form-group">
                <label class="" for="" style="padding-left:15px"></label>
                <input type="submit" name="create" value="create" class="btn btn-outline-dark">
            </div>
        </div>
    </form>
</div>