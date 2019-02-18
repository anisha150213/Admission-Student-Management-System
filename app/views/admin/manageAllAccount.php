<div class="col-9">
    <h1 style="text-align: center">Manage All Account</h1>
    <div class="table-responsive">
        <br />
        <table id="session_table" class="table">
            <thead>
                <tr>
                    <th >User Name</th>
                    <th >Full Name</th>
                    <th >User Role</th>
                    <th >Account Status</th>
                    <th >Modified by</th>
                    <th >Modified At</th>
                    <th >Update</th>
                    <th >Disable</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data['list'] as $key => $value){?>
                <tr>
                    <td><span><?php echo $value['user_name']?></span> </td>
                    <td><span><?php echo $value['full_name']?></span> </td>
                    <td><span><?php echo $value['user_role']?></span> </td>
                    <td>
                        <?php if($value['account_status'] == '1'){
                            echo "Active";
                        }else{
                            echo "Disabled";
                        }?>

                    </td>
                    <td>
                        <?php
                        foreach ($data['users'] as $k => $v) {
                            if($v['id'] == $value['modified_by']){
                                echo $v['full_name'];
                            }
                        }
                        ?>
                    </td>
                    <td><?php echo $value['modified_at']?></td>
                    <td>
                        <form action="<?php echo BASE_URL?>/manageallaccount/enable" method="post">
                            <button type="submit" name="enable" value="<?php echo $value['id']?>" class="btn btn-outline-info my-2 my-sm-0" >Enable</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo BASE_URL?>/manageallaccount/disable" method="post">
                            <button type="submit" name="disable" value="<?php echo $value['id']?>" class="btn btn-outline-danger my-2 my-sm-0" >Disable</button>
                        </form>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div class="col crtbtn">
        <button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-outline-dark my-2 my-sm-0 crtbtn" onclick="btn_add(this);">Create New</button>
    </div>
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="data_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><span id="modal_title">Add User</span></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label for="user_name" id="lbl_user_name">User Name</label>
                        <input autofocus="autofocus" type="text" name="user_name" id="user_name" class="form-control" required = "1"/>
                        <br />
                        <label for="full_name" id="lbl_full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required = "1"/>
                        <br />
                        <label for="password" id="lbl_password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required = "1"/>
                        <br />
                        <label for="confirm_password" id="lbl_confirm_password">Rewrite Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required = "1"/>
                        <br />
                        <label for="user_role" id="lbl_userName">User Role</label>
                        <select class="form-control" id="user_role" name="user_role" title="subject_type" required = "1">
                            <option value="manager">Manager</option>
                            <option value="data_entry">Data Entry</option>
                        </select>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" />
                        <input type="submit" name="action" id="action" class="btn btn-outline-info" value="Add" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#session_table').DataTable({
            "columnDefs":[
                {
                    "targets":[6,7],
                    "orderable":false,
                }
            ]
        });
    });


    function btn_add(asd) {
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/manageallaccount/addNew');
        $('#modal_title').text('Add User');
        $('#user_name').val("");
        $('#full_name').val("");
        $('#password').val("");
        $('#confirm_password').val("");
        $('#user_role').val("");
        $('#user_id').val("");
        $('#action').val('Add');
    }

</script>
