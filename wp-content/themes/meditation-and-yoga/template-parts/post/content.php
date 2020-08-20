<?php
/**
 * Template part for displaying posts
 * 
 * @subpackage meditation-and-yoga
 * @since 1.0
 * @version 1.4
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="article_content">
    <div class="metabox"> 
      <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?></span>  
      <span class="entry-author"><i class="fas fa-user"></i><?php esc_html(the_author()); ?></span>
      <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','meditation-and-yoga'), __('0 Comments','meditation-and-yoga'), __('% Comments','meditation-and-yoga') ); ?></span>
      <span class="entry-author"><i class="fas fa-eye"></i><?php echo esc_html(getPostViews(get_the_ID())); ?></span>
    </div>
    <?php if(has_post_thumbnail()) { ?>
      <?php the_post_thumbnail(); ?>  
    <?php }?>
    <div class="<?php if(has_post_thumbnail()) { ?>"<?php } else { ?>"<?php } ?>">
      <a href="<?php esc_url(the_permalink()); ?> "><h3><?php esc_html(the_title()); ?></h3></a>
      <p><?php the_excerpt(); ?></p>
      <div class="read-btn">
        <a href="<?php esc_url(the_permalink()); ?>" class="" title="<?php esc_attr_e( 'Đọc tiếp', 'meditation-and-yoga' ); ?>"><?php esc_html_e('Đọc tiếp','meditation-and-yoga'); ?>
        </a>
      </div>
    </div>
    <div class="clearfix"></div> 
  </div>
</div>