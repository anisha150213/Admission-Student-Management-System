<div class="container">
    <h1 style="text-align: center">My Forms</h1>
    <div class="table-responsive">
        <br />
        <table id="board_data" class="table">
            <thead>
            <tr>
                <th>Form Serial Number</th>
                <th>University Name</th>
                <th>Unit Name</th>
                <th>Session</th>
                <th>Form Price</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['table'] as $key => $value){?>
                <tr>
                    <td><?php echo $value['serial_number']?></td>
                    <td><?php echo $value['name']?></td>
                    <td><?php echo $value['unit_name']?></td>
                    <td><?php echo $value['session']?></td>
                    <td><?php echo (int)$value['form_price'] + (int)$value['service_charge']; ?></td>
                    <td>
                        <?php
                        if($value['is_approve'] == '0') {
                            echo 'Not Approved';
                        }else{
                            echo 'Approved';
                        }?>
                    </td>
                    <td>
                        <?php if($value['is_approve'] == 1){?>
                            <a href="<?php echo BASE_URL?>/MyForms/FormProgress/<?php echo $value['id']?>">Detail</a>
                        <?php }?>

                    </td>
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
                    "targets":[3, 4],
                    "orderable":false,
                }
            ]
        });
    });
</script>
