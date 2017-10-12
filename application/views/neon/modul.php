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
<body class="page-body  page-fade gray">
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>">
                            <!--<img src="<?php echo base_url(); ?>assets/neon/assets/images/logo03.png" height="67" alt="" />-->
                            <h3 style="color:white;">Active Screen<h3>
			</a>
                    </div>
                    <!-- logo collapse icon -->
                    <div class="sidebar-collapse">
                        <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                            <i class="entypo-menu"></i>
                        </a>
                    </div>
                    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                            <i class="entypo-menu"></i>
			</a>
                    </div>
                </header>
		<ul id="main-menu" class="main-menu">
                    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                    <?php foreach($menu as $m){ 
                        if($m->parent=="0"){?>
                    <li class="<?php if($menu_id==$m->menu_id){ echo "active";} else if($parent==$menu_id){ echo "opened active has-sub"; }else{ echo ""; }  ?>">
                        <a href="<?php echo base_url()."core/".$m->url; ?>">
                            <i class="entypo-<?php echo $m->icon; ?>"></i>
                            <span class="title"><?php echo $m->menu_name; ?></span>
                        </a>
                        <?php foreach($menu as $mm){ 
                            if($mm->parent==$m->menu_id){ ?>
                            <ul>
				<li>
                                    <a href="<?php echo base_url()."core/".$mm->url; ?>">
                                        <span class="title"><?php echo $mm->menu_name; ?></span>
                                    </a>
				</li>
                            </ul>
                        <?php }
                        } ?>
                    </li>
                        <?php }
                    } ?>
                    
		</ul>
            </div>
        </div>
	<div class="main-content">
            <div class="row">
                <!-- Profile Info and Notifications -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <ul class="user-info pull-left pull-none-xsm">
                        <!-- Profile Info -->
                        <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>assets/neon/assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
				<?php echo $namaLogin; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Reverse Caret -->
				<li class="caret"></li>
                                <!-- Profile sub-links -->
				<li>
                                    <a href="extra-timeline.html"><i class="entypo-user"></i>Edit Profile</a>
				</li>
                                <li>
                                    <a href="mailbox.html"><i class="entypo-mail"></i>Inbox</a>
				</li>
                                <li>
                                    <a href="extra-calendar.html"><i class="entypo-calendar"></i>Calendar</a>
                                </li>
                                <li>
                                    <a href="#"><i class="entypo-clipboard"></i>Tasks</a>
				</li>
                            </ul>
			</li>
                    </ul>
                    <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                        <!-- Raw Notifications -->
			<li class="notifications dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="entypo-attention"></i>
				<span class="badge badge-info">6</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="top">
                                    <p class="small">
                                        <a href="#" class="pull-right">Mark all Read</a>
					You have <strong>3</strong> new notifications.
                                    </p>
				</li>
				<li>
                                    <ul class="dropdown-menu-list scroller">
                                        <li class="unread notification-success">
                                            <a href="#">
                                                <i class="entypo-user-add pull-right"></i>
						<span class="line"><strong>New user registered</strong></span>
                                                <span class="line small">30 seconds ago</span>
                                            </a>
					</li>
                                        <li class="unread notification-secondary">
                                            <a href="#">
                                                <i class="entypo-heart pull-right"></i>
                                                <span class="line">
                                                    <strong>Someone special liked this</strong>
						</span>
						<span class="line small">2 minutes ago</span>
                                            </a>
					</li>
					<li class="notification-primary">
                                            <a href="#">
                                                <i class="entypo-user pull-right"></i>
						<span class="line">
                                                    <strong>Privacy settings have been changed</strong>
						</span>
						<span class="line small">3 hours ago</span>
                                            </a>
					</li>
					<li class="notification-danger">
                                            <a href="#">
                                                <i class="entypo-cancel-circled pull-right"></i>
						<span class="line">John cancelled the event</span>
						<span class="line small">9 hours ago</span>
                                            </a>
					</li>
                                        <li class="notification-info">
                                            <a href="#">
                                                <i class="entypo-info pull-right"></i>
						<span class="line">The server is status is stable</span>
						<span class="line small">yesterday at 10:30am</span>
                                            </a>
					</li>
					<li class="notification-warning">
                                            <a href="#">
                                                <i class="entypo-rss pull-right"></i>
                                                <span class="line">New comments waiting approval</span>
                                                <span class="line small">last week</span>
                                            </a>
					</li>
                                    </ul>
                                </li>
				<li class="external"><a href="#">View all notifications</a></li>
                            </ul>
                        </li>
                    </ul>
		</div>
		<!-- Raw Links -->
		<div class="col-md-6 col-sm-4 clearfix hidden-xs">
                    <ul class="list-inline links-list pull-right">
                        <!-- Language Selector -->
			<li class="sep"></li>
                        <li class="sep"></li>
                        <li>
                            <a href="<?php echo base_url()."login/destroy"; ?>">Log Out <i class="entypo-logout right"></i></a>
			</li>
                    </ul>
		</div>
            </div>
            <!----------main content---->
            <hr />
            <?php echo $contents; ?>
            <!-- Footer -->
            <footer class="main">
                &copy; 2015 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
            </footer>
	</div>
    </div>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/neon/assets/js/rickshaw/rickshaw.min.css">
    <!-- Bottom scripts (common) -->
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/joinable.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/resizeable.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/neon-api.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <!-- Imported scripts on this page -->
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/rickshaw/vendor/d3.v3.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/rickshaw/rickshaw.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/toastr.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/neon-chat.js"></script>
    <script src="<?php echo base_url(); ?>assets/carts/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/carts/highcharts-3d.js"></script>
    <script src="<?php echo base_url(); ?>assets/carts/modules/exporting.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/js/bsn.AutoSuggest_c_2.0.js"></script>-->
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.mockjax.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap3-typeahead.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/charts.js"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/neon-custom.js"></script>
    <!-- Demo Settings -->
    <script src="<?php echo base_url(); ?>assets/neon/assets/js/neon-demo.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
       var path =window.location.pathname.split('/');
       var lastPath=path[path.length - 1];
        $('.tgl').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });
        if (lastPath=="dashboard"){
            var datasA='';
            var dom = 'dailyChart';
            var judul = 'Ads weekly';
            var pointer = '';
            var legend = '';
            charts.bar(datasA,dom,judul,pointer,legend);
        }
    });
    
</script>

</body>
</html>