<?php
/**
 * Header file for the Dolpa WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Newsreaders
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
              content="Sống Thực - Nghệ thuật sống đơn giản và tỉnh thức với những nhiệm màu của cuộc sống">
        <meta name="keywords" content="Sống Thực, songthuc, song thuc, sống thực, nghệ thuật sống">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class('nr-multicolor-category'); ?>>
        <div id="preloader" class="preloader">
            <div id="loader" class="loader"></div>
        </div>

        <?php
        if( function_exists('wp_body_open') ){
            wp_body_open();
        } ?>

        <a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e('Skip to the content', 'newsreaders'); ?></a>

        <?php if (is_active_sidebar('top-header-sidebar')) { ?>
            <div class="nr-topbar-widget">
                <?php dynamic_sidebar('top-header-sidebar'); ?>
            </div>
        <?php }?>

        <?php
        $newsreaders_default = newsreaders_get_default_theme_options();
        $newsreaders_header_layout = get_theme_mod( 'newsreaders_header_layout', $newsreaders_default['newsreaders_header_layout'] );
        get_template_part( 'template-parts/header/header', $newsreaders_header_layout ); ?>

        <?php newsreaders_header_banner(); ?>
        <div id="content" class="site-content">