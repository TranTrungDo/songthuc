<?php
/**
 * The header for our theme
 *
 * @subpackage meditation-and-yoga
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'meditation-and-yoga' ); ?></a>
	
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="contact-details">
						<?php if( get_theme_mod('meditation_and_yoga_mail1') != ''){ ?>
								<span class="col-org"><i class="far fa-envelope"></i><?php echo esc_html( get_theme_mod('meditation_and_yoga_mail1','') ); ?></span>
						<?php } ?>
						<?php if( get_theme_mod('meditation_and_yoga_call1') != ''){ ?>
							<span class="col-org"><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('meditation_and_yoga_call1','') ); ?></span>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="logo">
				         <?php if ( has_custom_logo() ) : ?>
					        <div class="site-logo"><?php the_custom_logo(); ?></div>
					    <?php endif; ?>
			            <?php if (get_theme_mod('meditation_and_yoga_show_site_title',true)) {?>
					        <?php $blog_info = get_bloginfo( 'name' ); ?>
					        <?php if ( ! empty( $blog_info ) ) : ?>
					            <?php if ( is_front_page() && is_home() ) : ?>
						            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					        	<?php else : ?>
				            		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					            <?php endif; ?>
					        <?php endif; ?>
					    <?php }?>
			        	<?php if (get_theme_mod('meditation_and_yoga_show_tagline',true)) {?>
					        <?php
					        $description = get_bloginfo( 'description', 'display' );
					        if ( $description || is_customize_preview() ) :
					          ?>
						        <p class="site-description">
						            <?php echo esc_html($description); ?>
						        </p>
					        <?php endif; ?>
					    <?php }?>
				    </div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-section">
            <div class="my-custom-container-wrapper">
                <div class="container-fluid">
                    <div class="toggle-menu responsive-menu">
                        <button onclick="meditation_and_yoga_open()" role="tab"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','meditation-and-yoga'); ?></span></button>
                    </div>
                    <div id="sidelong-menu" class="nav sidenav">
                        <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'meditation-and-yoga' ); ?>">
                            <div class="navbar-header clearfix">
                                <ul id="primary-menu" class="nav navbar-nav nav-menu">
                                    <?php $home_class = 'current-menu-item'; ?>
                                    <li class="<?php echo $home_class; ?>">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <?php
                                    if (has_nav_menu('primary')) :
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary',
                                            'container_class' => 'main-menu-navigation clearfix',
                                            'menu_class' => 'clearfix',
                                            'items_wrap' => '%3$s',
                                            'container' => false,
                                            'fallback_cb' => 'wp_page_menu',
                                        ));
                                    else:
                                        wp_list_pages(array('depth' => 0, 'title_li' => ''));
                                    endif; // has_nav_menu
                                    ?>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="meditation_and_yoga_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','meditation-and-yoga'); ?></span></a>
                        </nav>
                    </div>
                </div>
            </div>
		</div>
	</header>

	<div class="site-content-contain">
		<div id="content" class="site-content">