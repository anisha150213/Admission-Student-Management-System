<div class="container">
    <h1 style="text-align: center">Insert Result</h1>
    <br>
    <div class="col-12 ">
        <form method="post" id="exam">
            <div class="row">
                <label class="col-1" style="visibility:hidden">hidden</label>
                <label class="col-form-label col-3" for="examType">Select Exam Type</label>
                <select class="form-control col-5 " name="examType" id="examType" onchange="selected_changed();" >
                    <option value="SSC" <?php if($data['type'] == 'SSC'){echo 'selected';}?>>SSC</option>
                    <option value="HSC" <?php if($data['type'] == 'HSC'){echo 'selected';}?>>HSC</option>
                    <option value="Dakhil" <?php if($data['type'] == 'Dakhil'){echo 'selected';}?>>Dakhil</option>
                    <option value="Alim" <?php if($data['type'] == 'Alim'){echo 'selected';}?>>Alim</option>
                    <option value="O Level" <?php if($data['type'] == 'O Level'){echo 'selected';}?>>O Level</option>
                    <option value="A Level" <?php if($data['type'] == 'A Level'){echo 'selected';}?>>A Level</option>
                </select>
            </div>
        </form>
    </div><br>
    <div class="col-12">
        <form action="<?php echo BASE_URL ?>/result/insert" method="post">
            <div class="row">
                <label class="col-1" style="visibility:hidden">hidden</label>
                <label class="col-2" for="subName">Select Subject</label>
                <select class="form-control col-3" name="subName" id="subName" >
                    <?php foreach ($data['sub'] as $key => $value){?>
                        <option value="<?php echo $value['id']?>"><?php echo $value['code']." ".$value['name']?></option>
                    <?php }?>
                </select>
                <label class="form-lebel col-1" for="gpa">GPA</label>
                <input class="form-control col-1" type="text" name="gpa" id="gpa" required = "1">
                <label class="form-lebel col-1" for="mark">Marks</label>
                <input class="form-control col-1" type="number" name="mark" id="mark" required = "1">
                <input  class="form-control col-1" type="text" name="type" style="visibility: hidden" value="<?php echo $data['type']?>">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Insert</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <br />
        <table id="sub_table" class="table">
            <thead>
            <tr>
                <th >Code - Subject Name</th>
                <th >GPA</th>
                <th >Marks</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['table'] as $k => $v){?>
                <form action="<?php echo BASE_URL?>/result/update" method="post">
                    <tr>

                        <td>
                            <select name="sub" id="sub" disabled="disabled">
                                <?php foreach ($data['sub'] as $key => $value){?>
                                    <option value="<?php echo $value['id']?>" <?php if($v['subject_id'] == $value['id']){echo 'selected';}?>><?php echo $value['code']." ".$value['name']?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <input type="text" class = "form-control" name="gpa" id="gpa" disabled="disabled" value="<?php echo $v['grade']?>">
                        </td>
                        <td>
                            <input type="text" class = "form-control" name="mark" id="mark" disabled="disabled" value="<?php echo $v['marks']?>">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-link" style="display: none" name="table_id" value="<?php echo $v['id']?>">Update</button>
                            <button type="button" class="btn btn-link" onclick="btn_edit(this)">Edit</button>
                            <input name="type" value="<?php echo $data['type']?>" style="display: none">
                        </td>
                </form>
                <form action="<?php echo BASE_URL?>/result/delete" method="post">
                        <td><button class="btn btn-link" name="table_id" value="<?php echo $v['id']?>" onclick="return confirm('Do u really wanna delete')">Delete</button></td>
                        <input type="text" style="display: none" name="type" value="<?php echo $data['type']?>">
                </form>

                    </tr>

            <?php }?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function selected_changed() {
        $('#exam').attr('action', 'http://localhost/se_addmission/result');
        $('#exam').submit();
    }

    function btn_edit(edit) {
        var parent = edit.parentNode.parentNode;
        var ddl = parent.childNodes[1].childNodes[1];
        var gpa = parent.childNodes[3].childNodes[1];
        var mark = parent.childNodes[5].childNodes[1];
        var btn_update = parent.childNodes[7].childNodes[1];
        edit.style.display = "none";
        btn_update.style.display = "block";
        ddl.removeAttribute("disabled");
        gpa.removeAttribute("disabled");
        mark.removeAttribute("disabled");
        console.log(btn_update);
        $('')
    }

</script>
