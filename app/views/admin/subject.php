<div class="col-9">
    <h1 style="text-align: center">Subject</h1>
    <div class="table-responsive">
        <br />
        <table id="sub_table" class="table">
            <thead>
            <tr>
                <th >Code</th>
                <th >Name</th>
                <th >Exam type</th>
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
                    <td><span><?php echo $value['code']?></span></td>
                    <td><span><?php echo $value['name']?></span></td>
                    <td><span><?php echo $value['exam_type'];?></span></td>
                    <td>
                        <?php
                        foreach ($data['users'] as $k => $v) {
                            if($v['id'] == $value['modified_id']){
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
                        <form action="<?php echo BASE_URL?>/Subject/delete" method="post">
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
                        <h4 class="modal-title"><span id="modal_title">Add Subject</span></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label for="sub_code" id="lbl_sub_code">Enter code</label>
                        <input autofocus="autofocus" type="text" name="sub_code" id="sub_code" class="form-control"  required = "1"/>
                        <br />
                        <label for="sub_name" id="lbl_sub_name">Enter name </label>
                        <input type="text" name="sub_name" id="sub_name" class="form-control"  required = "1"/>
                        <br />
                        <label for="sub_type" id="lbl_sub_type">Select type</label>
                        <select class="form-control" id="sub_type" name="sub_type" title="subject_type" required = "1">
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                                <option value="Dakhil">Dakhil</option>
                                <option value="Alim">Alim</option>
                                <option value="O Level">O Level</option>
                                <option value="A Level">A Level</option>
                        </select>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="sub_id" id="sub_id" />
                        <input type="submit" name="action" id="action" class="btn btn-outline-info" value="Add" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#sub_table').DataTable({
            "columnDefs":[
                {
                    "targets":[5],
                    "orderable":false,
                }
            ]
        });
    });

    function btn_update(asd) {
        var parent = asd.parentNode.parentNode;
        var btn = parent.childNodes[11];
        var btnValue = btn.childNodes[1].value;
        var sub_code = parent.childNodes[1].childNodes[0].innerText;
        var sub_name = parent.childNodes[3].childNodes[0].innerText;
        var sub_type = parent.childNodes[5].childNodes[0].innerText;
        console.log(sub_type);
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/Subject/update');
        $('#modal_title').text('Update Subject');
        $('#lbl_sub_code').text('Update code');
        $('#lbl_sub_name').text('Update name');
        $('#lbl_sub_type').text('Change Type');
        $('#sub_code').val(sub_code);
        $('#sub_name').val(sub_name);
        $('#sub_type').val(sub_type);
        $('#sub_id').val(btnValue);
        $('#action').val('Update');
    }

    function btn_add(asd) {
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/Subject/addNew');
        $('#modal_title').text('Add Subject');
        $('#lbl_sub_code').text('Enter code');
        $('#lbl_sub_name').text('Enter name');
        $('#lbl_sub_type').text('Select Type');
        $('#sub_code').val("");
        $('#sub_name').val("");
        $('#sub_type').val("");
        $('#sub_id').val("");
        $('#action').val('Add');
    }

</script>
