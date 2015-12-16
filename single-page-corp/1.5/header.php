<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="description" content="">
    
    <meta name="author" content="">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo esc_url( get_template_directory_uri() ) ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap theme -->
    <link href="<?php echo esc_url( get_template_directory_uri() ) ?>/css/bootstrap-theme.min.css" rel="stylesheet">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    
    <!-- Google font 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>-->
    
    <!-- Font Awesome -->
    
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ) ?>/css/fontawesome45/css/font-awesome.min.css">
    <link href="<?php echo esc_url( get_template_directory_uri() ) ?>/dynamic.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ) ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>
					<?php 
                    global $sa_options;
					$sa_settings = get_option( 'sa_options', $sa_options );
					?>

<div class="container-fluid p0">
   <nav class="navbar navbar-fixed-top cpnav">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
          <?php 
		 function my_get_option( $option, $section, $default = '' ) {
	    $options = get_option( $section );
 		if ( isset( $options[$option] ) ) {
        return $options[$option];
	    }
	    return $default;
		}
			?>
            
       <?php 
	   $basic = get_option('wedevs_basics');
	 //  var_dump ($basic);
	   ?><img src="<?php echo $basic['Logo']?>" alt="logo"></a>  
        </div>
        <?php
				$defaults = array(
					'theme_location'  => '',
					'menu'            => 'Header Menu',
					'container'       => 'div',
					'container_class' => 'navbar-collapse collapse',
					'container_id'    => 'navbar',
					'menu_class'      => 'nav navbar-nav navbar-right',
					'menu_id'         => 'navbar',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					
				);
				wp_nav_menu( $defaults ); ?> 
      
     </div><!--container-->   
   </nav>
   