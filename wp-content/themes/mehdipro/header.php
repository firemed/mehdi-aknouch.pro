<?php
/**
 * Header Template
 *
 * @package WP Longshore
 * @subpackage Template
 */

// Load Theme Options
global $ct_options;
global $woocommerce;

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>

    <link href="/wp-content/themes/mehdipro/css/orange.css" rel="stylesheet" id="color" type="text/css" />
    <link rel="stylesheet" href="/wp-content/themes/mehdipro/css/wavex.css">
    <link rel="stylesheet" href="/wp-content/themes/mehdipro/fonts/web-fonts.css">
    <link rel="stylesheet" href="/wp-content/themes/mehdipro/css/bootstrap.css">
    <link href="/wp-content/themes/mehdipro/css/parallax.css" rel="stylesheet" type="text/css" />
    <link href="/wp-content/themes/mehdipro/css/header.css" rel="stylesheet" type="text/css">

<!--    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">-->
    <link href="/wp-content/themes/mehdipro/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/wp-content/themes/mehdipro/css/style.css">
    <link href="/wp-content/themes/mehdipro/css/form.css" rel="stylesheet" type="text/css" />
    <link href="/wp-content/themes/mehdipro/css/queryLoader.css" rel="stylesheet" type="text/css" />
    <link href="/wp-content/themes/mehdipro/css/dark.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/mehdipro/css/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link href="/wp-content/themes/mehdipro/css/animate.css" rel="stylesheet" type="text/css">

    <link href="/wp-content/themes/mehdipro/css/custom/main.css" rel="stylesheet" type="text/css" />

</head>

<body<?php ct_body_id('top'); ?> <?php body_class(); ?>>
    
    <div id="wrapper">

        <div id="mobile-header">
            <i id="showLeft" class="icon-reorder"></i>
                <div class="clear"></div>
        </div>
    
        <div id="masthead-anchor"></div>

        <div class="subMenu" style="position: absolute; top: 40px;">
            <div class="container">
                <nav class="navbar navbar-default" role="navigation">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-container">
                        <span class="sr-only">...</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>

<!--                    <img class="logo" src="--><?php //echo $ct_options['ct_logo']; ?><!--" alt="--><?php //bloginfo('name'); ?><!--" />-->
                    <img class="logo" src="/wp-content/uploads/2017/04/logo_mehdi6.png" alt="<?php bloginfo('name'); ?>" />
                    <div class="collapse navbar-collapse dark-navi" id="nav-container">

                        <div class="navigation">

                            <?php wp_nav_menu( array(
                                'menu' => 'left','container_id' => 'nav-left', 'menu_class' => 'primary navbar-left navbar-nav nav', 'menu_id' => '',
                                'theme_location' => 'primary', 'fallback_cb' => false,'walker' => new Map_Walker()
                                )
                            ); ?>

                            <?php wp_nav_menu( array(
                                'menu' => 'right','container_id' => 'nav-right', 'menu_class' => 'secondary navbar-right navbar-nav nav', 'menu_id' => '',
                                'theme_location' => 'primary', 'fallback_cb' => false, 'walker' => new Map_Walker()
                                )
                            ); ?>


                        </div>
                    </div>

                </nav>
            </div>
            <div class="clearfix"></div>
        </div>


<section id="main-content" class="col span_12 first">