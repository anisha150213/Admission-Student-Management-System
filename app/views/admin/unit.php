<div class="col-9">
    <h1 style="text-align: center">Unit</h1>
    <br>
    <div class="" style="overflow-y:auto">
        <table class="table table-responsive" id="data_table">
            <thead>
            <tr>
                <th>Unit name</th>
                <th>University</th>
                <th>Session</th>
                <th>Starting time</th>
                <th>Ending time</th>
                <th>Selection time</th>
                <th>Exam time</th>
                <th>Form price</th>
                <th>Service charge</th>
                <th>Details</th>
                <th>Modified by</th>
                <th>Modified at</th>
                <th>Update</th>
                <?php
                Session::init();
                if(Session::get('user_role') == 'admin'){?>
                    <th>Delete</th>
                <?php }?>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['list'] as $key => $value){?>
                <tr>
                    <td><span><a href="<?php echo BASE_URL?>/Unit/unitDetail/<?php echo $value['id']?>"><?php echo $value['unit_name']?></a></span></td>
                    <td><span style="display: none"><?php echo $value['university_id']?></span>
                        <?php
                        foreach ($data['university'] as $k => $v){
                            if($v['id'] == $value['university_id']){
                                ?>
                                <a href="<?php echo BASE_URL?>/Unit/unit/university=<?php echo $value['university_id']?>"><?php echo $v['name'];?></a>
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td><span style="display: none"><?php echo $value['session_id']?></span>
                        <?php
                        foreach ($data['session'] as $k => $v){
                            if($v['id'] == $value['session_id']){
                                ?>
                                <a href="<?php echo BASE_URL?>/Unit/unit/session=<?php echo $value['session_id']?>"><?php echo $v['session'];?></a>
                                <?php
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <span style="display: none"><?php echo  date( 'Y-m-d\TH:i', strtotime($value['start_date_time'])); ?></span>
                        <span><?php echo $value['start_date_time']?></span>
                    </td>
                    <td>
                        <span style="display: none"><?php echo  date( 'Y-m-d\TH:i', strtotime($value['end_date_time'])); ?></span>
                        <span><?php echo $value['end_date_time']?></span>
                    </td>
                    <td>
                        <span style="display: none"><?php echo  date( 'Y-m-d\TH:i', strtotime($value['selection_date_time'])); ?></span>
                        <span><?php echo $value['selection_date_time']?></span>
                    </td>
                    <td>
                        <span style="display: none"><?php echo  date( 'Y-m-d\TH:i', strtotime($value['exam_date_time'])); ?></span>
                        <span><?php echo $value['exam_date_time']?></span>
                    </td>
                    <td><span><?php echo $value['form_price']?></span></td>
                    <td><span><?php echo $value['service_charge']?></span></td>
                    <td>
                        <span style="display: none"><?php echo $value['detail']?></span>
                        <span><?php echo substr($value['detail'], 0, 20);?></span>
                    </td>
                    <td>
                        <?php
                        foreach ($data['users'] as $k => $v){
                            if($v['id'] == $value['modified_by']){
                                echo $v['full_name'];
                            }
                        }
                        ?>
                    </td>
                    <td><span><?php echo $value['modified_at']?></span></td>
                    <td>
                        <button type="button" name="update" value="<?php echo $value['id']?>" class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal"
                                data-target="#update" data-whatever="@mdo" onclick="btn_update(this);">Update
                        </button>
                    </td>
                    <?php
                    Session::init();
                    if(Session::get('user_role') == 'admin'){?>
                    <td>
                        <form method="post" action="<?php echo BASE_URL?>/unit/delete">
                            <button type="submit" name="delete" value="<?php echo $value['id']?>" class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal"
                                    data-target="#delete" data-whatever="@mdo">Delete
                            </button>
                        </form>
                    </td>
                    <?php }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <div class="col crtbtn">
            <button type="button" name="btnCreat" class="btn btn-outline-dark my-2 my-sm-0 crtbtn"
                    data-toggle="modal" data-target="#create" data-whatever="@mdo" onclick="btn_add(this);">Create new
            </button>
        </div>

        <!--                modals start-->
        <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="create"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" id="data_form" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_title">Create New Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="unit_name" class="form-control-label">Unit</label>
                                    <input type="text" class="form-control" id="unit_name" name="unit_name" required = "1" />
                                </div>
                                <div class="form-group">
                                    <label for="university" class="form-control-label">University Name</label>
                                    <select class="form-control" id="university" name="university" required = "1">
                                        <?php foreach ($data['university'] as $key => $value){?>
                                            <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="session" class="form-control-label">Session</label>
                                    <select class="form-control" id="session" name="session" required = "1">
                                        <?php foreach ($data['session'] as $key => $value){?>
                                            <option value="<?php echo $value['id']?>"><?php echo $value['session']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="starting_time" class="form-control-label">Starting time</label>
                                    <input type="datetime-local" class="form-control" id="starting_time" name="starting_time" required = "1">
                                </div>
                                <div class="form-group">
                                    <label for="ending_time" class="form-control-label">Ending time</label>
                                    <input type="datetime-local" class="form-control" id="ending_time" name="ending_time" required = "1">
                                </div>
                                <div class="form-group">
                                    <label for="selection_time" class="form-control-label">Selection time</label>
                                    <input type="datetime-local" class="form-control" id="selection_time" name="selection_time" required = "1">
                                </div>
                                <div class="form-group">
                                    <label for="exam_time" class="form-control-label">Exam time</label>
                                    <input type="datetime-local" class="form-control" id="exam_time" name="exam_time" required = "1">
                                </div>
                                <div class="form-group">
                                    <label for="form_price" class="form-control-label">Form price</label>
                                    <input type="text" class="form-control" id="form_price" name="form_price" required = "1">
                                </div>
                                <div class="form-group">
                                    <label for="service_charge" class="form-control-label">Service charge</label>
                                    <input type="text" class="form-control" id="service_charge" name="service_charge" required = "1">
                                </div>
                                <div class="form-group">
                                    <label for="details" class="form-control-label">Details</label>
                                    <textarea rows="4" class="form-control" name="details" id="details"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="unit_id" id="unit_id" />
                            <input type="submit" id="action" class="btn btn-outline-info" value="Add" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--                modals end-->
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#data_table').DataTable({
            "columnDefs":[
                {
                    "targets":[9,12],
                    "orderable":false,
                }
            ]
        });
    });

    function btn_update(asd) {
        var parent = asd.parentNode.parentNode;
        var btn = parent.childNodes[25];
        var btnValue = btn.childNodes[1].value;
        var unit_name = parent.childNodes[1].childNodes[0].innerText;
        var university_id = parent.childNodes[3].childNodes[0].innerText;
        var session_id = parent.childNodes[5].childNodes[0].innerText;
        var start_time = parent.childNodes[7].childNodes[1].innerText;
        var end_time = parent.childNodes[9].childNodes[1].innerText;
        var selection_time = parent.childNodes[11].childNodes[1].innerText;
        var exam_time = parent.childNodes[13].childNodes[1].innerText;
        var form_price = parent.childNodes[15].childNodes[0].innerText;
        var service_charge = parent.childNodes[17].childNodes[0].innerText;
        var detail = parent.childNodes[19].childNodes[1].innerText;
        console.log(btnValue);
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/Unit/update');
        $('#modal_title').text('Update Unit');
        $('#unit_name').val(unit_name);
        $('#university').val(university_id);
        $('#session').val(session_id);
        $('#starting_time').val(start_time);
        $('#ending_time').val(end_time);
        $('#selection_time').val(selection_time);
        $('#exam_time').val(exam_time);
        $('#form_price').val(form_price);
        $('#service_charge').val(service_charge);
        $('#details').val(detail);
        $('#unit_id').val(btnValue);
        $('#action').val('Update');
    }

    function btn_add(asd) {
        $('#dataModal').modal('show');
        $('#data_form').attr('action','http://localhost/se_addmission/Unit/addNew');
        $('#modal_title').text('Create New Unit');
        $('#unit_name').val("");
        $('#university').val("");
        $('#session').val("");
        $('#starting_time').val("");
        $('#ending_time').val("");
        $('#selection_time').val("");
        $('#exam_time').val("");
        $('#form_price').val("");
        $('#service_charge').val("");
        $('#details').val("");
        $('#unit_id').val("");
        $('#action').val('Add');
    }

</script>
