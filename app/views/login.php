<style>
    input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
        -webkit-text-fill-color: green;
        -webkit-box-shadow: 0 0 0 1000px whitesmoke inset;
        transition: background-color 5000s ease-in-out 0s;
    }
    
</style>

<div class="content">
    <br>
    <div class="d-flex justify-content-center" style="height: 90vh">
        <div class="align-self-center col-6">

            <form class="form-horizontal" role="form" method="POST" action="<?php echo BASE_URL ?>/Login">

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <?php if($data['error'] == '1'){?>
                            <span class="text-danger">Wrong Credentials</span>
                        <?php }?>
                        <?php if($data['active_error'] == '1'){?>
                            <span class="text-danger">Your Account is Deactivated. Please Contact with Administration.</span>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2 style="text-align: center">Please Login</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                   aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                    <span class="text-danger align-middle">

                    </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">**</span>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                   aria-label="password" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                    <!-- Put password error message here -->
                    </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <button type="submit" name="btn_login" class="btn btn-outline-customs">Login</button>
                    </div>
                    <div class="col-md-6">
                        <p>New to this site. Register <a href="<?php echo BASE_URL ?>/Registration">here!!</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
