<div class="col-9">
    <h1 style="text-align: center">Unit Procedure List</h1>
    <br>
    <div class="col-8">
        <form method="post" id="unit_university">
            <div class="row">
                <label  class="col-md-3" style="visibility:hidden">hidden</label>
                <label  class="col-md-2">Select Unit</label>
                <select name="university" id="university" class="form-control col-md-4" onchange="selected_changed();">
                    <?php foreach ($data['unit'] as $key => $value){
                        if($data['unit_id'] == $value['id']){?>
                            <option value="<?php echo $value['id']?>" <?php echo 'selected'?>><?php echo $value['name']." ".$value['unit_name']." (".$value['session'].")"; ?></option>
                        <?php }else{?>
                            <option value="<?php echo $value['id']?>" ><?php echo $value['name']." ".$value['unit_name']." (".$value['session'].")"; ?></option>
                        <?php }?>
                    <?php }?>
                </select>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <br/>
        <table id="board_data" class="table">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Procedure Name</th>
                    <th>Input type</th>
                    <th>Cost</th>
                    <th>Modified by</th>
                    <th>Modified At</th>
                    <th>Edit</th>
                    <?php
                    Session::init();
                    if(Session::get('user_role') == 'admin'){?>
                    <th >Delete</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data['table'] as $key => $value){?>
                <tr>
                    <form action="<?php echo BASE_URL?>/unitprocedurelist/update" method="post">
                        <td><input type="number" name="serial" value="<?php echo $value['procedure_serial']?>" ></td>
                        <td>
                            <select name="procedure">
                                <?php foreach ($data['procedure'] as $k => $v){?>
                                    <?php if($value['procedure_list_id'] == $v['id']){?>
                                        <option value="<?php echo $v['id']?>" <?php echo 'selected'?>><?php echo $v['name']?></option>
                                    <?php } else{?>
                                        <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                    <?php }?>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <label for="input_type" class=""><input type="checkbox" name="input_type" class="" value="1" <?php if($value['is_text'] == '1'){echo 'checked = checked';}?>/>Text</label>
                        </td>
                        <td><input type="number" name="cost" value="<?php echo $value['cost']?>" ></td>
                        <td><label><?php
                                foreach ($data['users'] as $k => $v) {
                                    if($v['id'] == $value['modified_by']){
                                        echo $v['full_name'];
                                    }
                                }
                                ?></label></td>
                        <td><label><?php echo $value['modified_at']?></label></td>
                        <td>
                            <input type="hidden" name="unit_id" value="<?php echo $data['unit_id']?>">
                            <button type="submit" name="unit_procedure_id" value="<?php echo $value['id']?>" class="btn btn-outline-info my-2 my-sm-0" onclick="btnupdate(this);" >Update</button>
                        </td>
                    </form>
                    <?php
                    Session::init();
                    if(Session::get('user_role') == 'admin'){?>
                    <td>
                        <form action="<?php echo BASE_URL?>/unitprocedurelist/delete" method="post">
                            <input type="hidden" name="unit_id" value="<?php echo $data['unit_id']?>">
                            <button type="submit" name="delete" value="<?php echo $value['id'] ?>" class="btn btn-outline-danger my-2 my-sm-0" onclick="return confirm('Do u really wanna delete')">Delete</button>
                        </form>
                    </td>
                    <?php }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div>
        <center><button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-outline-info my-2 my-sm-0" onclick="btn_add(this)">Add</button></center>
    </div>
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="data_form" enctype="multipart/form-data" action="<?php echo BASE_URL?>/unitprocedurelist/add">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><span id="modal_title">Add Unit Procedure</span></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label for="serial" >Serial No</label>
                        <input type="number" name="serial" id="serial" class="form-control" required = "1"/>

                        <label for="procedure">SelectProcedure</label>
                        <select name="procedure" id="procedure" class="form-control" required = "1">
                            <?php foreach ($data['procedure'] as $key => $value){?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                            <?php }?>
                        </select>

                        <label for="input_type">Input Type</label>
                        <label for="input_type" class="form-control"><input type="checkbox" name="input_type" id="input_type" class="form-check" value="1"/> Text</label>
                        <label for="cost">Cost</label>
                        <input type="number" name="cost" id="cost" class="form-control" required = "1"/>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="unit_id" id="unit_id" />
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
//    $(document).ready(function () {
//        $('#board_data').DataTable({
//            "columnDefs":[
//                {
//                    "targets":[3, 4],
//                    "orderable":false,
//                }
//            ]
//        });
//    });

    function btnupdate(asd) {
        var parent = asd.parentNode.parentNode;
        var btnValue = parent.childNodes[7].childNodes[1].value;
        var name = parent.childNodes[1];
        var nameText = name.childNodes[1].innerText;
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/Board/update');
        $('#modal_title').text('Update Board');
        $('#lbl_board_name').text('Update this entry');
        $('#board_name').val(nameText);
        $('#board_id').val(btnValue);
        $('#action').val('Update');
    };

    function btn_add() {
        var university =  $('#university').val();
        $('#unit_id').val(university);

    }

    function selected_changed() {
        var university =  $('#university').val();
        $('#unit_university').attr('action', 'http://localhost/se_addmission/unitprocedurelist/updateSelect');
        $('#unit_university').submit();
    }

</script>
