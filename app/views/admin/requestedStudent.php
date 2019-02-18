<div class="col-9">
    <h1 style="text-align: center">Student Request</h1>
    <div class="table-responsive">
        <br />
        <table id="board_data" class="table">
            <thead>
                <tr>
                    <th >Student Name</th>
                    <th >University Name</th>
                    <th >Unit Name</th>
                    <th >Session</th>
                    <th >Form Serial Number</th>
                    <th >Form Price</th>
                    <th >Status</th>
                    <th >Approve</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data['table'] as $key => $value){?>
                <tr>
                    <td><a href="<?php echo BASE_URL?>/StudentDetail/main/<?php echo $value['studentId']?>"><?php echo $value['full_name']?></a></td>
                    <td><?php echo $value['name']?></td>
                    <td><?php echo $value['unit_name']?></td>
                    <td><?php echo $value['session']?></td>
                    <td><a href="<?php echo BASE_URL?>/UnitProcedureStatus/main/<?php echo $value['id']?>"><?php echo $value['serial_number']?></a></td>
                    <td><?php echo (int)$value['form_price'] + (int)$value['service_charge']; ?></td>
                    <td>
                        <?php
                        if($value['is_approve'] == '0'){
                        echo 'Not Approved';
                        ?>
                    </td>
                    <td>
                        <form action="<?php echo BASE_URL ?>/FormSell/approve" method="post">
                            <input type="hidden" name="unit_id" value="<?php echo $value['unit_id']?>">
                            <button name="form_sell_id" value="<?php echo $value['id']?>" class="btn btn-outline-info my-2 my-sm-0">Approve</button>
                        </form>
                    </td>
                    <?php }else{
                        echo 'Approved';
                        ?>
                        </td>
                        <td>
                            <button class="btn btn-outline-info my-2 my-sm-0" disabled>Approved</button>
                        </td>
                    <?php }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#board_data').DataTable({
            "columnDefs":[
                {
                    "targets":[7],
                    "orderable":false,
                }
            ]
        });
     });
</script>
