<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">
</head>

<body>
<!-- Mixins-->
<!-- Pen Title-->
    <div class="container">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">Login</h1>
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
                <div class="input-container">
                    <input type="#{type}" id="#{label}" name="username" required="required"/>
                    <label for="#{label}">Username</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="#{label}" name="password" required="required"/>
                    <label for="#{label}">Password</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <!--<button><span>Go</span></button>-->
                    <button type="submit">Go</button>
                </div>
                <div class="footer"><a href="#">Forgot your password?</a></div>
            </form>
        </div>
        <div class="card alt">
            <div class="toggle"></div>
            <h1 class="title">Register<div class="close"></div></h1>
            <form>
                <div class="input-container">
                    <input type="#{type}" id="#{label}" required="required"/>
                    <label for="#{label}">Username</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="#{type}" id="#{label}" required="required"/>
                    <label for="#{label}">Password</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container">
                    <input type="#{type}" id="#{label}" required="required"/>
                    <label for="#{label}">Repeat Password</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button><span>Next</span></button>
                </div>
            </form>
        </div>
    </div>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="<?php echo base_url(); ?>assets/login/js/index.js"></script>

</body>
</html>
