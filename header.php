<html>
<head>
	<title>AS creative</title>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/bootstrap.min.css">
	<script src="<?php echo get_template_directory_uri(); ?>/lib/js/jquery.min.js"></script>
	<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
	<!-- header start -->
	<div id="header">
		<!-- Logo start -->
		<div class="main-logo">
			<button type="button" class="navbar-toggle collapsed" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_custom_data( 'upload_header_logo' ); ?>"/></a>
		</div>
		<!-- Logo end -->
		<!-- Menu start -->
		<div class="menu-nav">
			<?php
			get_menu( 'headermenu', 'cssmenu', 'primary' );
			?></div>
	</div>
	<!-- header end -->