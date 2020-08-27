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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Sống Thực - Nghệ thuật sống đơn giản và tỉnh thức với những nhiệm màu của cuộc sống">
    <meta name="keywords" content="Sống Thực, songthuc, song thuc, sống thực, nghệ thuật sống">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (function_exists('wp_body_open')) {
    wp_body_open();
} else {
    do_action('wp_body_open');
} ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'meditation-and-yoga'); ?></a>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="contact-details">
                        <?php if (get_theme_mod('meditation_and_yoga_mail1') != '') { ?>
                            <span class="col-org"><i
                                        class="far fa-envelope"></i><?php echo esc_html(get_theme_mod('meditation_and_yoga_mail1', '')); ?></span>
                        <?php } ?>
                        <?php if (get_theme_mod('meditation_and_yoga_call1') != '') { ?>
                            <span class="col-org"><i
                                        class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('meditation_and_yoga_call1', '')); ?></span>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="logo">
                        <?php if (has_custom_logo()) : ?>
                            <div class="site-logo"><?php the_custom_logo(); ?></div>
                        <?php endif; ?>
                        <?php if (get_theme_mod('meditation_and_yoga_show_site_title', true)) { ?>
                            <?php $blog_info = get_bloginfo('name'); ?>
                            <?php if (!empty($blog_info)) : ?>
                                <?php if (is_front_page() && is_home()) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                              rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                             rel="home"><?php bloginfo('name'); ?></a></p>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php } ?>
                        <?php if (get_theme_mod('meditation_and_yoga_show_tagline', true)) { ?>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) :
                                ?>
                                <p class="site-description">
                                    <?php echo esc_html($description); ?>
                                </p>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <!--					<div class="search-box">-->
                    <!--						--><?php //get_search_form(); ?>
                    <!--					</div>-->
                </div>
            </div>
        </div>
        <div class="menu-section">
            <div class="my-custom-container-wrapper">
                <div class="container-fluid">
                    <div class="toggle-menu responsive-menu">
                        <button onclick="meditation_and_yoga_open()" role="tab"><i class="fas fa-bars"></i><span
                                    class="screen-reader-text"><?php esc_html_e('Open Menu', 'meditation-and-yoga'); ?></span>
                        </button>
                    </div>
                    <div id="sidelong-menu" class="nav sidenav">
                        <nav id="primary-site-navigation" class="nav-menu" role="navigation"
                             aria-label="<?php esc_attr_e('Top Menu', 'meditation-and-yoga'); ?>">
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
                            <a href="javascript:void(0)" class="closebtn responsive-menu"
                               onclick="meditation_and_yoga_close()"><i class="fas fa-times"></i><span
                                        class="screen-reader-text"><?php esc_html_e('Close Menu', 'meditation-and-yoga'); ?></span></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="carouselExampleIndicators" class="carousel slide custom-carousel-interval" data-ride="carousel">
        <?php
        $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
        $quote_songthuc_file = $DOCUMENT_ROOT . '/wp-content/themes/meditation-and-yoga/assets/quote_songthuc';
        $content_quote_songthuc = array();
        $quote_songthuc_fp = fopen($quote_songthuc_file, 'r');
        if ($quote_songthuc_fp) {
            $content_quote_songthuc = explode("\n", fread($quote_songthuc_fp, filesize($quote_songthuc_file)));
        }
        fclose($quote_songthuc_fp);
        $image_slideshow = [
            "http://songthuc.vn/wp-content/uploads/2020/08/thumb_697_news_standard.jpeg",
            "http://songthuc.vn/wp-content/uploads/2020/08/banner_2.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/key.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/3_1560262312.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/hinh-nen-4k-dep-9_124944.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/cropped-hope-seedling-2-scaled-1.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/boris-smokrovic-220975-1200x450-1.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/borobudur_sunrise-e1368799522312.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/agrii.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/fonds-was-sie-ueber-anlagefonds-wissen-muessen.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/shutterstock_1087622744-1200x450-1.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/fullscreen-01-aron-visuals-bxoxnq26b7o-unsplash.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/juliana-vs-usa-1200x450-131788107198076190.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/green_living-lightbulb.jpg",
            "http://songthuc.vn/wp-content/uploads/2020/08/bamboo.jpg"
        ]
        ?>
        <div class="carousel-inner" role="listbox">
            <?php
            $image_slideshow_idx = 0;
            for ($i = 0; $i < count($content_quote_songthuc) - 1; $i += 3) {
                ?>
                <?php if ($i == 0) { ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100"
                             src=<?php echo $image_slideshow[$image_slideshow_idx] ?> data-color="lightblue"
                             alt="songthuc">
                        <div class="carousel-caption">
                            <div><?php echo $content_quote_songthuc[0] ?></div>
                            <div style="color:#fcd000; font-size:14px; font-weight: bold; font-style:italic"><?php echo $content_quote_songthuc[1] ?></div>
                        </div>
                    </div>
                <?php } else if ($i > 1) { ?>
                    <div class="carousel-item">
                        <img class="d-block w-100"
                             src=<?php echo $image_slideshow[$image_slideshow_idx] ?> data-color="lightblue"
                             alt="songthuc">
                        <div class="carousel-caption">
                            <div><?php echo $content_quote_songthuc[$i] ?></div>
                            <div style="color:#fcd000; font-size:14px; font-weight: bold; font-style:italic"><?php echo $content_quote_songthuc[$i + 1] ?></div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $image_slideshow_idx += 1;
                if ($image_slideshow_idx == count($image_slideshow)) {
                    $image_slideshow_idx = 0;
                }
            } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container my-4">
        <div class="tt-ss"></div>
        <div class="slideshow">
            <div class="slideshow">
                <div id="outerCarousel" class="carousel slide fdi-Carousel" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $stickies = get_option('sticky_posts');
                        if ($stickies) {
                            $args = [
                                'post_type' => 'post',
                                'post__in' => $stickies,
                                'posts_per_page' => -1,
                                'ignore_sticky_posts' => 1
                            ];
                            $the_query = new WP_Query($args);
                            if ($the_query->have_posts()) {
                                $post_active = true;
                                while ($the_query->have_posts()) {
                                    $stk_posts = $the_query->the_post();
                                    if (has_post_thumbnail()) {

                                        ?>
                                        <?php
                                        if (get_the_title() == "LỜI TỰA") {
                                            ?>
                                            <div class="carousel-item active">
                                                <div class="col-md-4 clearfix text-center">
                                                    <a href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail([400, 600]) ?></a>
                                                    <div class="card-body">
                                                        <a href="<?php esc_url(the_permalink()); ?> "><h4
                                                                    class="card-title"><?php esc_html(the_title()); ?></h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="carousel-item">
                                                <div class="col-md-4 clearfix text-center">
                                                    <a href="<?php esc_url(the_permalink()); ?> "><?php the_post_thumbnail([400, 600]) ?></a>
                                                    <div class="card-body">
                                                        <a href="<?php esc_url(the_permalink()); ?> "><h4
                                                                    class="card-title"><?php esc_html(the_title()); ?></h4>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                }
                                wp_reset_postdata();
                            }
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#outerCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#outerCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <!--        <hr class="my-4">-->
        <div class="tt-ss"></div>
    </div>

    <div class="site-content-contain">
        <div id="content" class="site-content">