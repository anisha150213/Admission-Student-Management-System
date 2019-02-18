<div class="container">
    <h1 style="text-align: center">From Progress</h1>
    <label>From Number</label>
    <lable><?php echo $data['formSerial'][0]['serial_number'];?></lable>
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
        <table>
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
                        <td><label name="lbl_serial"><?php echo $value['procedure_serial']?></label></td>
                        <td><label name="lbl_name"><?php echo $value['name']?></label></td>
                        <td>
                            <input disabled="disabled" type="text" name="txt_input" value="<?php if($value['value'] != null){echo $value['value'];}?>" <?php if($value['is_text'] == '0'){echo 'style="display: none"';}?>>
                        </td>
                        <td>
                            <input disabled="disabled" type="checkbox" name="checkbox" <?php if($value['value'] != null){echo "checked";}?>>
<!--                            <input type="hidden" name="unit_procedure_status_id" value="--><?php //echo $value['id']?><!--">-->
<!--                            <input type="hidden" name="form_id" value="--><?php //echo $data['formSerial'][0]['id'];?><!--">-->
                        </td>
                    </form>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>