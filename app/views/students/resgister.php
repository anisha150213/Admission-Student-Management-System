<div class="container-fluid">
    <h1 style="text-align: center">Registration</h1>
    <form action="<?php echo BASE_URL?>/Registration/regAuth" method="post" class="row justify-content-around" style="padding-top: 10px">

        <div class="col-8 form-group row">
            <label class="col-2 col-form-label"></label>
            <div class="col-10">
                <?php if(isset($data['msg'])){
                   echo "<span>".$data['msg']."</span>";
                }?>
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="fullname" class="col-2 col-form-label">Full Name</label>
            <div class="col-10">
                <input class="form-control" type="text" id="fullname" name="fullname" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="username" class="col-2 col-form-label">Username</label>
            <div class="col-10">
                <input class="form-control" type="text" id="username" name="username" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="password" class="col-2 col-form-label">Password</label>
            <div class="col-10">
                <input class="form-control" type="password" id="password" name="password" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="confirm_password" class="col-2 col-form-label">Confirm Password</label>
            <div class="col-10">
                <input class="form-control" type="password" id="confirm_password" name="confirm_password" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="fathername" class="col-2 col-form-label">Father's Name</label>
            <div class="col-10">
                <input class="form-control" type="text" id="fathername" name="fathername" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="mothername" class="col-2 col-form-label">Mother's Name</label>
            <div class="col-10">
                <input class="form-control" type="text" id="mothername" name="mothername" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <span><b>Present Address</b></span>
        </div>

        <div class="col-8 form-group row">
            <label for="streetvillage" class="col-2 col-form-label">Street/Village</label>
            <div class="col-10">
                <input class="form-control" type="text" id="streetvillage" name="streetvillage" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="postcode1" class="col-2 col-form-label">Post Code</label>
            <div class="col-10">
                <input class="form-control" type="text" pattern="[0-9]{4}" id="postcode1" name="postcode1" required = "1"> 
            </div>
        </div>


        <div class="col-8 form-group row">
            <label for="upozillathana" class="col-2 col-form-label">Upazilla/Thana</label>
            <div class="col-10">
                <input class="form-control" type="text" id="upozillathana" name="upozillathana" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="district" class="col-2 col-form-label">District</label>
            <div class="col-10">
                <input class="form-control" type="text" id="district" name="district" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="division" class="col-2 col-form-label">Division</label>
            <div class="col-10">
                <input class="form-control" type="text" id="division" name="division" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <span><b>Permanent Address</b> <span>Select Present Address as Permanent</span> <input type="checkbox" onchange="permanent();"></span>
        </div>

        <div class="col-8 form-group row">
            <label for="perstreetvillage" class="col-2 col-form-label">Street/Village</label>
            <div class="col-10">
                <input class="form-control" type="text" id="perstreetvillage" name="perstreetvillage" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="postcode2" class="col-2 col-form-label">Post Code</label>
            <div class="col-10">
                <input class="form-control" type="text" pattern="[0-9]{4}" id="postcode2" name="postcode2" required = "1">
            </div>
        </div>


        <div class="col-8 form-group row">
            <label for="perupozillathana" class="col-2 col-form-label">Upazilla/Thana</label>
            <div class="col-10">
                <input class="form-control" type="text" id="perupozillathana" name="perupozillathana" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="perdistrict" class="col-2 col-form-label">District</label>
            <div class="col-10">
                <input class="form-control" type="text" id="perdistrict" name="perdistrict" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="perdivision" class="col-2 col-form-label">Division</label>
            <div class="col-10">
                <input class="form-control" type="text" id="perdivision" name="perdivision" required = "1">
            </div>
        </div>


        <div class="col-8 form-group row">
            <label for="gender" class="col-2 col-form-label">Gender</label>
            <div class="col-10" >
                <select class="form-control" id="gender" name="gender">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select>
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="mobile" class="col-2 col-form-label">Mobile No</label>
            <div class="col-10">
                <input class="form-control" type="text" pattern="[0-9]{11}" id="mobile" name="mobile" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="altermobile" class="col-2 col-form-label">Alternative Mobile No</label>
            <div class="col-10">
                <input class="form-control" type="text" pattern="[0-9]{11}" id="altermobile" name="altermobile">
            </div>
        </div>

        <div class="col-8 form-group row">
            <label for="fathermobile" class="col-2 col-form-label">Father's Mobile No</label>
            <div class="col-10">
                <input class="form-control" type="text" pattern="[0-9]{11}" id="fathermobile" name="fathermobile" required = "1">
            </div>
        </div>

        <div class="col-8 form-group row">
            <table class="table table-light table-responsive">
                <thead>
                <tr>
                    <th></th>
                    <th>Board</th>
                    <th>Year</th>
                    <th>Registration Number</th>
                    <th>Roll Number</th>
                    <th>GPA</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>SSC/Dakhil/O Level</td>
                    <td>
                        <select class="form-control" name="sscboard" id="sscboard" title="SSC Board">
                            <?php foreach ($data['board'] as  $key => $value){?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                            <?php }?>
                        </select>
                    </td>
                    <td><input class="form-control" type="text" id="sscyear" name="sscyear" placeholder="SSC Year"></td>
                    <td><input class="form-control" type="number" id="sscregno" name="sscregno" placeholder="SSS Registration No"></td>
                    <td><input class="form-control" type="number" id="sscrollno" name="sscrollno" placeholder="SSC Roll No"></td>
                    <td><input class="form-control" type="text" id="sscgpa" name="sscgpa" placeholder="SSC GPA"></td>
                </tr>
                <tr>
                    <td>HSC/Alim/A Level</td>
                    <td><select class="form-control" name="hscboard" id="hscboard" title="HSC Board">
                            <?php foreach ($data['board'] as  $key => $value){?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                            <?php }?>
                        </select></td>
                    <td><input class="form-control" type="text"  id="hscyear" name="hscyear" placeholder="HSC Year"></td>
                    <td><input class="form-control" type="text"  id="hscregno" name="hscregno" placeholder="HSC Registration No"></td>
                    <td><input class="form-control" type="text"  id="hscrollno" name="hscrollno" placeholder="HSC Roll No"></td>
                    <td><input class="form-control" type="text"  id="hscgpa" name="hscgpa" placeholder="HSC GPA"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-8 justify-content-around form-group row">
            <button class="btn btn-outline-info" type="submit">Submit</button>
        </div>
    </form>
</div>

<script>
    function permanent() {
        var present_street = $('#streetvillage').val();
        var present_post = $('#postcode1').val();
        var present_thana = $('#upozillathana').val();
        var present_district = $('#district').val();
        var present_divition= $('#division').val();
        $('#perstreetvillage').val(present_street);
        $('#postcode2').val(present_post);
        $('#perupozillathana').val(present_thana);
        $('#perdistrict').val(present_district);
        $('#perdivision').val(present_divition);


    }
</script>
