<div class="col-9">
    <h1 style="text-align: center">All Cost</h1>
    <table id="table" width="100%" class="table table-responsive">
        <thead>
        <tr>
            <th>Date</th>
            <th>Form Number</th>
            <th>University(Unit)</th>
            <th>Procedure</th>
            <th>Amount</th>
            <th>Modified By</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['table'] as $key => $value){?>
            <tr>
                <td><?php echo $value['modified_at']?></td>
                <td><?php echo $value['serial_number']?></td>
                <td><?php echo $value['name'].'('.$value['unit_name'].')'?></td>
                <td><?php echo $value['transaction_name']?></td>
                <td><?php echo $value['amount']?></td>
                <td><?php
                        foreach ($data['user'] as $k => $v){
                            if($value['modified_by'] == $v['id']){
                                echo $v['full_name'].' ('.$v['user_role'].')';
                            }
                        }
                    ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>
