<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title><?php wp_title('|', true, 'right'); ?></title>


	<?php wp_head(); ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body <?php body_class(); ?>>

<header id="theme-header">
	<div class="sg-nav navbar">
		<div class="navbar-left">
			<div class="navbar-brand">
				<a class="brand" href="<?php echo site_url() ?>">Site Name</a>
			</div>
			
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars"></i>
	      </button>
		</div>
		<div class="navbar-right">
			<nav class="navbar-collapse collapse" id="main-menu-collapse">
				<div class="navbar-left">
					<?php 
						wp_nav_menu(
							array(
								'theme_location'	=> 'primary', 
								'menu_class'		=> 'menu menu-inline nav navbar-nav',
								'walker'			=> new sg_walker_menu(),
								'fallback_cb'		=> 'sg_no_menu_cb'
							)
						); 
					?>
				</div>
				<form class="navbar-left" action="<?php echo site_url() ?>">
					<div class="input-group">
						<input type="text" class="form-control input-search" name="s" placeholder="Search">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<?php 
					$current_user = wp_get_current_user();
					$user_report_page = sg_opt('user_report_page');
					$user_report_page = get_permalink($user_report_page);
				?>
				<div class="navbar-left">
					<?php if(is_user_logged_in()): ?>
						<a class="btn btn-default" href="<?php echo wp_logout_url() ?>">Hi, <?php echo $current_user->display_name ?></a>
						<a class="btn btn-default" href="<?php echo wp_logout_url() ?>">Logout</a>
					<?php else: ?>
						<a class="btn btn-default" href="<?php echo wp_login_url(get_permalink()) ?>">Login</a>
					<?php endif; ?>
					<a class="btn btn-secondary" href="<?php echo $user_report_page ?>">Lapor Hoax</a>
				</div>
			</nav>
		</div>
	</div>
</header>
<!-- header -->

<?php do_action('sg_content_before'); ?>

<div id="theme-content">

	<div id="theme-main">
		
	

<?php /* ?>

	<nav id="header" class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project name</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				
			</div>
			<!-- navbar-collapse -->
		</div>
		<!-- container -->
	</nav>

	<?php */ ?>


