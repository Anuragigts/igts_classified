<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 login-box">
                <div class="panel panel-default">
                    <div class="panel-intro text-center">
                        <h2 class="logo-title">
                        <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> <span>CLASSIFIED </span> </h2>
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view("classified_layout/success_error");?>
                        <form role="form"  method="post">
                            <div class="form-group">
                                <label for="user-pass" class="control-label">Email:</label>
                                <div class="input-icon"> <i class="icon-lock fa"></i>
                                    <input type="email" class="form-control" placeholder="Email" id="user-pass" name="password" value="<?php echo $ve["login_email"];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user-pass" class="control-label">Password:</label>
                                <div class="input-icon"> <i class="icon-lock fa"></i>
                                    <input type="password" class="form-control" placeholder="Password" id="user-pass" name="password">
                                </div>
                                <?php echo form_error("password");?>
                            </div>
                            <div class="form-group">
                                <label for="user-pass" class="control-label">Confirm Password:</label>
                                <div class="input-icon"> <i class="icon-lock fa"></i>
                                    <input type="password" class="form-control" placeholder="Confirm Password" id="user-pass" name="conpassword">
                                </div>
                                <?php echo form_error("conpassword");?>
                            </div>
                            <div class="form-group">
                                <input  type="submit" class="btn btn-primary  btn-block" value="Submit" name="change"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
       setTimeout(function(){
            $(".alert").hide();
       },5000);
</script>