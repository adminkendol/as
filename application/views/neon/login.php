<?php
    $username=set_value('username');
?>
<div class="row">
    <div class="col-md-6">
        <div class="login-form">
            <div class="login-content">
                <form method="post" action="<?php echo base_url().'login/enter';?>" role="form" id="form_login">
            <?php
                if(validation_errors()){ ?>
                    <div class="alert alert-danger">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span><?php echo validation_errors();?></span>
                    </div>
            <?php } if($valid=="1"){?>
                    <div class="alert alert-warning">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span>Password salah</span>
                    </div>
            <?php } ?>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="entypo-user"></i></div>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="entypo-key"></i></div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-red btn-block btn-login"><i class="entypo-login"></i>Login In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>