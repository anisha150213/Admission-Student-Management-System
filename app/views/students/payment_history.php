<div class="col">
    <h1 style="text-align: center">Payment History</h1>
    <table id="table" width="100%" class="table table-responsive">
        <thead>
        <tr>
            <th>Date</th>
            <th>Form Number</th>
            <th>University(Unit)</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Due</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['table'] as $key => $value){?>
            <tr>
                <td><?php echo $value['modified_at']?></td>
                <td><?php echo $value['serial_number']?></td>
                <td><?php echo $value['name'].'('.$value['unit_name'].')'?></td>
                <td><?php echo $value['total']?></td>
                <td><?php echo $value['amount']?></td>
                <td><?php echo $value['due']?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "columnDefs":[
                {
                    "targets":[],
                    "orderable":false,
                }
            ]
        });
    });
</script>
