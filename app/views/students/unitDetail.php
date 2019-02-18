<div class="container">
    <h1 style="text-align: center"> All University Unit Detail</h1>
    <br>
     <div class="table-responsive">
        <br />
        <table id="board_data" class="table">
            <thead>
                <tr>
                    <th >University Name</th>
                    <th >Unit Name</th>
                    <th >Session</th>
                    <th >Starting Date</th>
                    <th >End Date</th>
                    <th >Form Price</th>
                    <th >Detail</th>
                    <th >Apply</th>
                </tr>
            </thead>
            <?php foreach ($data['table'] as $key => $value){?>
                <tr>
                    <td><label><?php echo $value['name']?></label></td>
                    <td><label><?php echo $value['unit_name']?></label></td>
                    <td><label><?php echo $value['session']?></label></td>
                    <td><label><?php echo $value['start_date_time']?></label></td>
                    <td><label><?php echo $value['end_date_time']?></label></td>
                    <td><label><?php
                            $fPrice = (int)$value['form_price'];
                            $sCharge = (int)$value['service_charge'];
                            $total = $fPrice + $sCharge;
                            echo $total." BDT";
                            ?></label></td>
                    <td>
                        <form action="<?php echo BASE_URL?>/unitdetail/unitdetail/<?php echo $value['id']?>" method="post">
                            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">More</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo BASE_URL?>/getAdmitted/apply" method="post">
                            <button value="<?php echo $value['id']?>" name="unit_id" class="btn btn-outline-info my-2 my-sm-0" type="submit">Apply</button>
                        </form>
                    </td>
                </tr>
            <?php }?>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#board_data').DataTable({
            "columnDefs":[
                {
                    "targets":[6, 7],
                    "orderable":false,
                }
            ]
        });
     });
</script>
