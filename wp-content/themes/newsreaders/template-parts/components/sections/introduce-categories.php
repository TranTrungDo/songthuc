<?php

if( !function_exists('introduce_categories_section') ):

    function introduce_categories_section() { ?>
        <div class="<?php if( !is_page() ){ ?>archive-main-block<?php }else{ ?> singular-main-block <?php } ?>">
            <div class="wrapper">
                <div class="wrapper-inner">
                    <?php
                    $wp_categories = get_categories();
                    foreach ($wp_categories as $category) {
                        if ($category->parent == 0) {
                            $child_categories = get_categories(array('parent' => $category->cat_ID)); ?>
                            <hgroup class="title-box-category width_common">
                                <h4 class="tt-primary parent-cate">
                                    <a class="inner-title" href="<?php echo get_category_link($category->cat_ID) ?>"><?php echo $category->name ?></a>
                                </h4>
                                <?php foreach ($child_categories as $child) { ?>
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
                            if ($q->have_posts()) { ?>
                                <div class="article-wraper archive-layout-grid">
                                <?php while ($q->have_posts()) {
                                    $q->the_post();
                                    if( !is_page() ) {
                                        get_template_part( 'template-parts/content', get_post_format() );
                                    } else {
                                        get_template_part('template-parts/content', 'single');
                                    }
                                }
                                wp_reset_postdata(); ?>
                                </div>
                            <?php } ?>
                            <div class="readmore-topic">
                                <a href="<?php echo get_category_link($category->cat_ID) ?>" class="readmore-link"
                                    title="<?php esc_attr_e($category->name, 'songthuc.vn'); ?>"><?php esc_html_e('Đọc thêm', 'songthuc.vn'); ?>
                                </a>
                            </div> <?php
                        }
                    } ?>
                </div>
            </div>
        </div> <?php
    }
endif;