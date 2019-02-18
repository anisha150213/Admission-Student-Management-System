<div class="col-9">
    <h1 style="text-align: center">Unit Procedure Status</h1>
    <div class="form-group">
        <div class="row">
            <label class="col-2" style="visibility:hidden">hidden</label>
            <label class="col-2 col-form-label">From Number</label>
            <lable class="col-2 col-form-label"><b><?php echo $data['formSerial'][0]['serial_number'];?></b></lable>
            <label class="col-2 col-form-label">Student Name</label>
            <lable class="col-2 col-form-label"><b><a href="<?php echo BASE_URL?>/StudentDetail/main/<?php echo $data['formSerial'][0]['student_id']?>"><?php echo $data['studentName'][0]['full_name']?></a></b></lable>
        </div><br/>
        <div class="progress">
            <?php
            $c = count($data['table']);
            if($c == 0){
               $c = 1;
            }
            $i = 0;
            foreach ($data['table'] as $key => $value){
                if($value['value'] != null){
                    $i++;
                }
            }
            echo '<div class="progress-bar" role="progressbar" style="width: '.($i*100)/$c.'%" aria-valuenow="'.($i*100)/$c.'" aria-valuemin="0" aria-valuemax="'.$c.'"></div>';
            ?>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Process Name</th>
                        <th>input</th>
                        <th>CheckBox</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['table'] as $key => $value){?>
                    <tr>
                        <form action="<?php echo BASE_URL?>/UnitProcedureStatus/update" method="post">
                            <td><label class="col-2 col-form-label" name="lbl_serial"><?php echo $value['procedure_serial']?></label></td>
                            <td><label class="col-2 col-form-label" name="lbl_name"><?php echo $value['name']?></label></td>
                            <td>
                                <input class="col-6 form-control" type="text" name="txt_input" value="<?php if($value['value'] != null){echo $value['value'];}?>" <?php if($value['is_text'] == '0'){echo 'style="display: none"';}?>>
                            </td>
                            <td>
                                <input class="col-2 form-control" type="checkbox" name="checkbox" <?php if($value['value'] != null){echo "checked";}?> onchange="select_checkbox(this);">
                                <input type="hidden" name="unit_procedure_status_id" value="<?php echo $value['id']?>">
                                <input type="hidden" name="unit_procedure_status_name" value="<?php echo $value['name']?>">
                                <input type="hidden" name="unit_procedure_cost" value="<?php echo $value['cost']?>">
                                <input type="hidden" name="form_id" value="<?php echo $data['formSerial'][0]['id'];?>">
     <!--                            <input type="hidden" name="unit_procedure_list_id" value="--><?php //echo $value['unit_procedure_list_id'];?><!--">-->
                            </td>
                        </form>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function select_checkbox(checkbox) {
        var parent = checkbox.parentNode.parentNode;
        var form = parent.childNodes[1];
        var txt = parent.childNodes[7].childNodes[1].value;
        if(checkbox.checked){
            form.submit();
        }else{
            if(txt != '-1' && txt != null){
                if(confirm("Undo changes? You cannot retrieve this. So be careful")){
                    form.submit();
                }else {
                    checkbox.checked = true;
                }
            }else {
                form.submit();
            }
        }
    }
</script>
