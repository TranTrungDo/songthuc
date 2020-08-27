<?php
/**
 * meditation-and-yoga functions and definitions
 *
 * 
 * @subpackage meditation-and-yoga
 * @since 1.0
 */

function meditation_and_yoga_setup() {
	
	load_theme_textdomain( 'meditation-and-yoga', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
	));

	add_image_size( 'meditation-and-yoga-featured-image', 2000, 1200, true );

	add_image_size( 'meditation-and-yoga-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'meditation-and-yoga' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', meditation_and_yoga_fonts_url() ) );

// Theme Activation Notice
	global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'meditation_and_yoga_activation_notice' );
	}

}
add_action( 'after_setup_theme', 'meditation_and_yoga_setup' );

// Notice after Theme Activation
function meditation_and_yoga_activation_notice() {
	echo '<div class="notice notice-success is-dismissible start-notice">';
		echo '<h3>'. esc_html__( 'Welcome to Luzuk!!', 'meditation-and-yoga' ) .'</h3>';
		echo '<p>'. esc_html__( 'Thank you for choosing Meditation And Yoga theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'meditation-and-yoga' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=meditation_and_yoga_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'meditation-and-yoga' ) .'</a></p>';
	echo '</div>';
}

function meditation_and_yoga_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'meditation-and-yoga' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'meditation-and-yoga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'meditation-and-yoga' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'meditation-and-yoga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'meditation-and-yoga' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'meditation-and-yoga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'meditation-and-yoga' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'meditation-and-yoga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'meditation-and-yoga' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'meditation-and-yoga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'meditation-and-yoga' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'meditation-and-yoga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'meditation-and-yoga' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'meditation-and-yoga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'meditation_and_yoga_widgets_init' );

function meditation_and_yoga_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function meditation_and_yoga_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'meditation-and-yoga-fonts', meditation_and_yoga_fonts_url(), array(), null );
	
	//Bootstarp 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'meditation-and-yoga-basic-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'meditation-and-yoga-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'meditation-and-yoga-style' ), '1.0' );
		wp_style_add_data( 'meditation-and-yoga-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'meditation-and-yoga-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'meditation-and-yoga-style' ), '1.0' );
	wp_style_add_data( 'meditation-and-yoga-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'meditation-and-yoga-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$meditation_and_yoga_l10n=array();
	
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'meditation-and-yoga-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$meditation_and_yoga_l10n['expand']         = __( 'Expand child menu', 'meditation-and-yoga' );
		$meditation_and_yoga_l10n['collapse']       = __( 'Collapse child menu', 'meditation-and-yoga' );		
	}

	wp_enqueue_script( 'meditation-and-yoga-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'meditation-and-yoga-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

    wp_enqueue_script('refined-magazine-custom', get_template_directory_uri() . '/assets/js/refined-magazine-custom.js', array('jquery'), '20151215', true);

	wp_localize_script( 'meditation-and-yoga-skip-link-focus-fix', 'meditation_and_yogaScreenReaderText', $meditation_and_yoga_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meditation_and_yoga_scripts' );

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count ==' ') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function meditation_and_yoga_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'meditation_and_yoga_front_page_template' );

function meditation_and_yoga_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

remove_filter ('the_content', 'wpautop');

function clear_br($content) {
    return str_replace("<br/>","<br clear='none'/>", $content);
}
add_filter('the_content', 'clear_br');

//function customize_excerpt_length($length){
//    return 100;
//}
//add_filter('excerpt_length', 'customize_excerpt_length');

//function custom_read_more() {
//    return '&hellip; <a style="color:#07b8ee" href="' . get_the_permalink() . '">Đọc tiếp »</a>';
//}

//function excerpt($limit = 50) {
//    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more());
//}

function excerpt($limit = 50) {
    return wp_trim_words(get_the_excerpt(), $limit);
}

function meditation_and_yoga_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//footer Link
define('MEDITATION_AND_YOGA_LIVE_DEMO',__('https://luzukdemo.com/demo/meditation-yoga/','meditation-and-yoga'));
define('MEDITATION_AND_YOGA_PRO_DOCS',__('https://luzukdemo.com/demo/meditation-yoga/documentation/','meditation-and-yoga'));
define('MEDITATION_AND_YOGA_BUY_NOW',__('https://www.luzuk.com/product/meditation-yoga-wordpress-theme/','meditation-and-yoga'));
define('MEDITATION_AND_YOGA_SUPPORT',__('https://wordpress.org/support/theme/meditation-and-yoga/','meditation-and-yoga'));
define('MEDITATION_AND_YOGA_CREDIT',__('https://songthuc.vn/','meditation-and-yoga'));

if ( ! function_exists( 'meditation_and_yoga_credit' ) ) {
	function meditation_and_yoga_credit(){
		echo "<a href=".esc_url(MEDITATION_AND_YOGA_CREDIT)." target='_blank'>".esc_html__('Bản quyền thuộc về songthuc.vn. Email liên hệ: banquantri@songthuc.vn','meditation-and-yoga')."</a>";
	}
}

/* Excerpt Limit Begin */
function meditation_and_yoga_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'meditation_and_yoga_loop_columns');
	if (!function_exists('meditation_and_yoga_loop_columns')) {
		function meditation_and_yoga_loop_columns() {
	return 3; // 3 products per row
	}
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/getting-started/getting-started.php' );