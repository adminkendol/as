<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />
    <link rel="icon" href="<?php echo base_url(); ?>assets/neon/assets/images/favicon.png">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/css/neon-core.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/css/neon-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/css/neon-forms.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/jquery.ui.all.css" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.3.js"></script>
	<!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/neon/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-fade-login">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo base_url();?>assets/img/login/phone.jpg" style="position: fixed;height: 100%;width: auto;" />
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-1">
                    <img src="<?php echo base_url();?>assets/img/login/company.png" style="position: fixed;margin-top:5%;" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="<?php echo base_url();?>assets/img/login/loginBox.png"  style="position: fixed;height: 50%;width: auto;margin-top:17%;" />
                    <div class="login-form" style="margin-top: 50%;margin-left: 5%;">
                        <div class="login-content">
                            <form method="post" action="<?php echo base_url().'login/enter';?>" role="form" id="form_login">
                            <div class="form-group" style="width: 30%;">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="entypo-user"></i></div>
                                    <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group" style="width: 30%;">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="entypo-key"></i></div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-red btn-block btn-login"><i class="entypo-login"></i>Login In</button>
                                </div>
                            </div>
                            <?php
                                if(validation_errors()){ ?>
                                <div class="input-group">
                                    <div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span><?php echo validation_errors();?></span>
                                    </div>
                                </div>
                            <?php } if($valid=="1"){?>
                                <div class="input-group">
                                    <div class="alert alert-warning">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span>Password salah</span>
                                    </div>
                                </div>
                            <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</body>

<script src="<?php echo base_url(); ?>assets/neon/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url(); ?>assets/neon/assets/js/bootstrap.js"></script>

</html>