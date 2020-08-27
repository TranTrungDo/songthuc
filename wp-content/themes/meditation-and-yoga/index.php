<?php
/**
 * The main template file
 *
 * @subpackage meditation-and-yoga
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

    <div class="container-fluid">
        <?php if (is_home() && !is_front_page()) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header>
        <?php else : ?>
        <header class="page-header">
            <!--		<h2 class="page-title">-->
            <?php //esc_html_e( 'Posts', 'meditation-and-yoga' ); ?><!--</h2>-->
        </header>
        <?php endif; ?>

        <div class="content-area">
            <main id="main" class="site-main" role="main">
                <?php
                $meditation_and_yoga_layout_option = get_theme_mod('meditation_and_yoga_theme_options', 'Right Sidebar');
                if ($meditation_and_yoga_layout_option == 'Left Sidebar') { ?>
                    <div class="row">
                        <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
                        <div id="" class="content_area col-lg-8 col-md-8">
                            <section id="post_section">
                                <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post();

                                        get_template_part('template-parts/post/content');

                                    endwhile;

                                else :

                                    get_template_part('template-parts/post/content', 'none');

                                endif;
                                ?>
                                <div class="navigation">
                                    <?php

                                    the_posts_pagination(array(
                                        'prev_text' => __('Previous page', 'meditation-and-yoga'),
                                        'next_text' => __('Next page', 'meditation-and-yoga'),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'meditation-and-yoga') . ' </span>',
                                    ));
                                    ?>
                                    <div class="clearfix"></div>
                                </div>
                            </section>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } else if ($meditation_and_yoga_layout_option == 'Right Sidebar') { ?>
                <div class="row">
                    <div id="" class="content_area col-lg-9 col-md-9">
                        <section id="post_section">
                            <?php
                                $wp_categories = get_categories();
                                foreach ($wp_categories as $category) {
                                    if ($category->parent == 0) {
                                        $child_categories = get_categories(array('parent' => $category->cat_ID));
                            ?>
                            <div class="row">
                                <hgroup class="title-box-category width_common">
                                    <h4 class="tt-primary parent-cate">
                                        <a class="inner-title"
                                           href="<?php echo get_category_link($category->cat_ID) ?>"><?php echo $category->name ?></a>
                                    </h4>
                                    <?php
                                        foreach ($child_categories as $child) {
                                    ?>
                                        <span class="sub-cate">
                                            <a class="inner-title" href="<?php echo get_category_link($child->cat_ID) ?>"><?php echo $child->name ?></a>
                                        </span>
                                    <?php } ?>
                                </hgroup>

                                <?php
                                $args = array(
                                    'posts_per_page' => 4,
                                    'category_name' => $category->slug,
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                );
                                $q = new WP_Query($args);

                                if ($q->have_posts()) {
                                    while ($q->have_posts()) {
                                        $q->the_post();
                                ?>
                                <div class="col-md-3 clearfix text-center">
                                    <div class="<?php if (has_post_thumbnail()) { ?>"<?php } else { ?>"<?php } ?>">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <a href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail([400, 600]); ?></a>
                                    <?php } ?>
                                    <div class="card-body">
                                        <a href="<?php esc_url(the_permalink()); ?> "><h4 class="card-title"><?php esc_html(the_title()); ?></h4></a>
                                    </div>
                                    <p><?php echo excerpt(30) ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        wp_reset_postdata();
                        }
                        ?>
                            <div class="readmore-topic">
                                <a href="<?php echo get_category_link($category->cat_ID) ?>" class="readmore-link"
                                   title="<?php esc_attr_e($category->name, 'songthuc.vn'); ?>"><?php esc_html_e('Đọc thêm', 'songthuc.vn'); ?>
                                </a>
                            </div>
                    </div>
                    <?php
                    }
                    }
                    ?>
                    </section>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
        </div>
        <?php } else if ($meditation_and_yoga_layout_option == 'One Column') { ?>
        <div class="content_area">
            <section id="post_section">
                <?php
                if (have_posts()) :

                    /* Start the Loop */
                    while (have_posts()) : the_post();

                        get_template_part('template-parts/post/content');

                    endwhile;

                else :

                    get_template_part('template-parts/post/content', 'none');

                endif;
                ?>
                <div class="navigation">
                    <?php
                    // Previous/next page navigation.
                    the_posts_pagination(array(
                        'prev_text' => __('Previous page', 'meditation-and-yoga'),
                        'next_text' => __('Next page', 'meditation-and-yoga'),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'meditation-and-yoga') . ' </span>',
                    ));
                    ?>
                    <div class="clearfix"></div>
                </div>
            </section>
        </div>
        <?php } else if ($meditation_and_yoga_layout_option == 'Three Columns') { ?>
        <div class="row">
            <div id="sidebar"
                 class="col-lg-3 col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
            <div id="" class="content_area col-lg-6 col-md-6 col-sm-6">
                <section id="post_section">
                    <?php
                    if (have_posts()) :

                        /* Start the Loop */
                        while (have_posts()) : the_post();


                            get_template_part('template-parts/post/content');

                        endwhile;

                    else :

                        get_template_part('template-parts/post/content', 'none');

                    endif;
                    ?>
                    <div class="navigation">
                        <?php
                        // Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => __('Previous page', 'meditation-and-yoga'),
                            'next_text' => __('Next page', 'meditation-and-yoga'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'meditation-and-yoga') . ' </span>',
                        ));
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
            <div id="sidebar"
                 class="col-lg-3 col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
        </div>
        <?php } else if ($meditation_and_yoga_layout_option == 'Four Columns') { ?>
        <div class="row">
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
            <div id="" class="content_area col-lg-3 col-md-3">
                <section id="post_section">
                    <?php
                    if (have_posts()) :

                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            get_template_part('template-parts/post/content');

                        endwhile;

                    else :

                        get_template_part('template-parts/post/content', 'none');

                    endif;
                    ?>
                    <div class="navigation">
                        <?php
                        // Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => __('Previous page', 'meditation-and-yoga'),
                            'next_text' => __('Next page', 'meditation-and-yoga'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'meditation-and-yoga') . ' </span>',
                        ));
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
            <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
        </div>
        <?php } else if ($meditation_and_yoga_layout_option == 'Grid Layout') { ?>
        <div id="" class="content_area">
            <section id="post_section">
                <div class="row">
                    <?php
                    if (have_posts()) :

                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            get_template_part('template-parts/post/grid-layout');

                        endwhile;

                    else :

                        get_template_part('template-parts/post/content', 'none');

                    endif;
                    ?>
                    <div class="navigation">
                        <?php
                        // Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => __('Previous page', 'meditation-and-yoga'),
                            'next_text' => __('Next page', 'meditation-and-yoga'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'meditation-and-yoga') . ' </span>',
                        ));
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>
        </div>
        <?php } else { ?>
        <div class="row">
            <div id="" class="content_area col-lg-8 col-md-8">
                <section id="post_section">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            get_template_part('template-parts/post/content');
                        endwhile;
                    else :

                        get_template_part('template-parts/post/content', 'none');
                    endif;
                    ?>
                    <div class="navigation">
                        <?php
                        // Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => __('Previous page', 'meditation-and-yoga'),
                            'next_text' => __('Next page', 'meditation-and-yoga'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'meditation-and-yoga') . ' </span>',
                        ));
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
            <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?>
            </div>
        </div>
        <?php } ?>
        </main>
    </div>
    </div>

<?php get_footer();