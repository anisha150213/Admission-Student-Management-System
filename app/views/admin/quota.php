<div class="col-9">
    <h1 style="text-align: center">Quata</h1>
    <div class="table-responsive">
        <br />
        <table id="session_table" class="table">
            <thead>
            <tr>
                <th >Subject Type</th>
                <th >Modified by</th>
                <th >Modified At</th>
                <th >Edit</th>
                <?php
                Session::init();
                if(Session::get('user_role') == 'admin'){?>
                <th >Delete</th>
                <?php }?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['list'] as $key => $value){?>
                <tr>
                    <td> <span><?php echo $value['type']?></span> </td>
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
                        <button type="button" name="update" value="<?php echo $value['id']?>" class="btn btn-outline-info my-2 my-sm-0" onclick="btn_update(this);" >Update</button>
                    </td>
                    <?php
                    Session::init();
                    if(Session::get('user_role') == 'admin'){?>
                    <td>
                        <form action="<?php echo BASE_URL?>/Quota/delete" method="post">
                            <button type="submit" name="delete" value="<?php echo $value['id']?>" class="btn btn-outline-danger my-2 my-sm-0" onclick="return confirm('Do u really want to delete')" >Delete</button>
                        </form>
                    </td>
                    <?php }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div class="col crtbtn">
        <button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-outline-dark my-2 my-sm-0 crtbtn" onclick="btn_add(this);">Add</button>
    </div>
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="data_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><span id="modal_title">Add Procedure</span></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label for="session_name" id="lbl_session">Enter procedure name</label>
                        <input autofocus="autofocus" type="text" name="session_name" id="session_name" class="form-control" required = "1"/>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="session_id" id="session_id" />
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
                    "targets":[3],
                    "orderable":false,
                }
            ]
        });
    });

    function btn_update(asd) {
        var parent = asd.parentNode.parentNode;
        var btn = parent.childNodes[7];
        var btnValue = btn.childNodes[1];
        var name = parent.childNodes[1];
        var nameText = name.childNodes[1].innerText;
        console.log(btnValue.value);
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/Quota/update');
        $('#modal_title').text('Update Procedure');
        $('#lbl_session').text('Update this entry');
        $('#session_name').val(nameText);
        $('#session_id').val(btnValue.value);
        $('#action').val('Update');
    };

    function btn_add(asd) {
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/Quota/addNew');
        $('#modal_title').text('Add Procedure');
        $('#lbl_session').text('Enter new procedure');
        $('#session_id').val("");
        $('#session_name').val("");
        $('#action').val('Add');
    };

</script>
