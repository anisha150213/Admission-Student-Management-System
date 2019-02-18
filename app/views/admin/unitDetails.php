<div class="col-9">
    <h1 style="text-align: center">Unit details</h1>
    <form class="row justify-content-around" style="padding-top: 10px">

        <div class="col-8 form-group row">
            <label class="col-2 col-form-label">Unit Name</label>
            <div class="col-10">
                <label class="form-control"><?php echo $data['unit'][0]['unit_name']?></label>
            </div>
        </div>

        <div class="col-8 form-group row">
            <label class="col-2 col-form-label">University Name</label>
            <div class="col-10">
                <label class="form-control">
                    <?php
                    foreach ($data['university'] as $k => $v){
                        if($v['id'] == $data['unit'][0]['university_id']){
                            echo $v['name'];
                        }
                    }
                    ?>
                </label>
            </div>
        </div>
		<div class="col-8 form-group row">
            <label class="col-2 col-form-label">Session</label>
            <div class="col-10">
                <label class="form-control">
                    <?php
                    foreach ($data['session'] as $k => $v){
                        if($v['id'] == $data['unit'][0]['session_id']){
                            echo $v['session'];
                        }
                    }
                    ?>
                </label>
            </div>
        </div>

		<div class="col-8 form-group row">
            <label class="col-2 col-form-label">Starting Time</label>
            <div class="col-10">
                <label class="form-control"><?php echo $data['unit'][0]['start_date_time']?></label>
            </div>
        </div>

		<div class="col-8 form-group row">
            <label  class="col-2 col-form-label">Ending Time</label>
            <div class="col-10">
                <label class="form-control"><?php echo $data['unit'][0]['end_date_time']?></label>
            </div>
        </div>

		<div class="col-8 form-group row">
            <label class="col-2 col-form-label">Selection Time</label>
            <div class="col-10">
                <label class="form-control"><?php echo $data['unit'][0]['selection_date_time']?></label>
            </div>
        </div>

		<div class="col-8 form-group row">
            <label class="col-2 col-form-label">Exam Time</label>
            <div class="col-10">
                <label class="form-control"><?php echo $data['unit'][0]['exam_date_time']?></label>
            </div>
        </div>

		<div class="col-8 form-group row">
            <label class="col-2 col-form-label">Form Price</label>
            <div class="col-10">
                <label class="form-control"><?php echo $data['unit'][0]['form_price']?></label>
            </div>
        </div>

		<div class="col-8 form-group row">
            <label class="col-2 col-form-label">Service Charge</label>
            <div class="col-10">
                <label class="form-control"><?php echo $data['unit'][0]['service_charge']?></label>
            </div>
        </div>

		<div class="col-8 form-group row">
            <label class="col-2 col-form-label">Detail</label>
            <div class="col-10">
                <textarea class="form-control" readonly="readonly">
                    <?php echo $data['unit'][0]['detail']?>
                </textarea>
            </div>
        </div>
    </form>
</div>
