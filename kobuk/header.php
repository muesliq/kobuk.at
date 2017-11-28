<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php include( TEMPLATEPATH . '/templates/components/seo.php' ); ?>

        <!-- stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/icomoon.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/jquery.fancybox.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/style.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/stylesheets/print.css" rel="stylesheet" media="print">

        <!-- javascript -->
        <script src="<?php echo get_template_directory_uri(); ?>/javascript/jquery-3.2.1.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/javascript/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/javascript/jquery.fancybox.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/javascript/bootstrap-select.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/javascript/main.js"></script>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png" sizes="32x32">
        <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png" sizes="16x16">

        <?php wp_head(); ?>
    </head>

    <body class="<?php echo custom_echo_body_class(); ?>">
        <?php include( TEMPLATEPATH . '/templates/components/facebook.php' ); ?>

        <main>
            <header>
                <div class="logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="">
                    </a>
                </div>

                <div class="title">
                    <?php custom_echo_textelement( 'HEADER_CLAIM', 'textblock' ); ?>
                </div>

                <?php include( TEMPLATEPATH . '/templates/components/meta-navigation-top.php' ); ?>

                <button class="toggle nav">
                    <span class="icomoon icon-icon_burguer_open" aria-hidden="true"></span>
                </button>

                <button class="toggle search">
                    <span class="icomoon icon-icon_lupe" aria-hidden="true"></span>
                </button>
            </header>

            <?php include( TEMPLATEPATH . '/templates/components/main-navigation.php' ); ?>

            <div class="search-wrapper">
                <form action="<?php echo get_home_url(); ?>">
                    <input type="search" name="s" value="" placeholder="<?php custom_echo_textelement( 'SEARCH_PLACEHOLDER', 'text' ); ?>"></form>
                </form>
            </div>

            <section class="content-wrapper">
                <div class="container">
                    <section class="sidebar hidden-sm hidden-xs">
                        <?php include( TEMPLATEPATH . '/templates/components/sidebar.php' ); ?>
                    </section>

                    <section class="content">