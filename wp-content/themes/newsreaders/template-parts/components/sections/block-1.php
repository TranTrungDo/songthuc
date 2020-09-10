<?php

if( !function_exists('newsreaders_block_1_section') ):

	function newsreaders_block_1_section(){

		$newsreaders_default = newsreaders_get_default_theme_options();
		$ed_block_1 = get_theme_mod( 'ed_block_1',$newsreaders_default['ed_block_1'] );
		if( $ed_block_1 ){

			$fallback_images = get_theme_mod('fallback_images');
			$block_1_verticle_slide_area_title = get_theme_mod( 'block_1_verticle_slide_area_title',$newsreaders_default['block_1_verticle_slide_area_title'] );
			$block_1_verticle_slide_area_title_icon = get_theme_mod( 'block_1_verticle_slide_area_title_icon',$newsreaders_default['block_1_verticle_slide_area_title_icon'] );
			$block_1_verticle_slide_area_ctegory = get_theme_mod( 'block_1_verticle_slide_area_ctegory' );
			$block_1_mid_slide_area_ctegory = get_theme_mod( 'block_1_mid_slide_area_ctegory' );
			$block_1_right_grid_area_ctegory = get_theme_mod( 'block_1_right_grid_area_ctegory' );

			$block_1_verticle_slide_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 10,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $block_1_verticle_slide_area_ctegory ) ) );
			$block_2_verticle_slide_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => -1,'post__in' => get_option("sticky_posts"), 'ignore_sticky_posts' => 1 ) );
			$block_3_verticle_slide_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1,'s' => "LỜI TỰA" ) );

			$ed_block_1_cat = get_theme_mod( 'ed_block_1_cat',$newsreaders_default['ed_block_1_cat'] );
			$ed_block_1_date = get_theme_mod( 'ed_block_1_date',$newsreaders_default['ed_block_1_date'] );
			$ed_block_1_author = get_theme_mod( 'ed_block_1_author',$newsreaders_default['ed_block_1_author'] );

			$play_video_youtube_1 = array(
			    'name' => "Beautiful Piano Music",
                'url' => "https://www.youtube.com/watch?v=lCOF9LN_Zxs",
                'embed' => "https://www.youtube.com/embed/lCOF9LN_Zxs",
                'date' => "30/1/2018"
            );
            $play_video_youtube_2 = array(
                'name' => "Relaxing Piano Music",
                'url' => "https://www.youtube.com/watch?v=77ZozI0rw7w",
                'embed' => "https://www.youtube.com/embed/77ZozI0rw7w",
                'date' => "20/5/2017"
            );
            $play_video_youtube_3 = array(
                'name' => "Nhạc không lời",
                'url' => "https://www.youtube.com/watch?v=Zd_LEy0tbUY",
                'embed' => "https://www.youtube.com/embed/Zd_LEy0tbUY",
                'date' => "06/1/2020"
            );
			?>
			
			<div class="nr-banner-section nr-section-border">
			    <div class="wrapper">
			        <div class="wrapper-inner">

			        	<?php if( $block_1_verticle_slide_query->have_posts() ): ?>

				            <div class="column column-3 nr-order-1">
				                <div class="nr-live-post-section nr-post-layout-1">
				                    
				                    <div class="nr-title-section">
				                        
				                        <?php if( $block_1_verticle_slide_area_title ){ ?>
				                        	<h2 class="nr-section-title nr-section-title-sm">
												<span class="nr-icon"><i class="ion <?php echo esc_html( $block_1_verticle_slide_area_title_icon ); ?>"></i></span>
												<span class="nr-caption"><?php echo esc_html( $block_1_verticle_slide_area_title ); ?></span>
											</h2>

				                        <?php } ?>

				                        <div class="nr-arrow-section">
				                            <span class="nr-arrow banner-arrow-prev"><i class="ion ion-ios-arrow-up"></i></span>
				                            <span class="nr-arrow banner-arrow-next"><i class="ion ion-ios-arrow-down"></i></span>
				                        </div>

									</div>
				                    <div class="nr-banner-vertical-slider nr-post-list">
				                    	<?php
				                    	while( $block_1_verticle_slide_query->have_posts() ):
											$block_1_verticle_slide_query->the_post();
                                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                            if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>
											<div class="nr-wrapper">
												<div class="nr-post nr-post-with-number nr-post-style-2 nr-post-sm nr-d-flex">
                                                    <div class="nr-image-section nr-image-70 nr-image-hover-effect">
                                                        <a href="<?php the_permalink(); ?>"></a>
                                                        <div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')"></div>
                                                    </div>
													<div class="nr-desc">
														<h3 class="nr-post-title nr-post-title-xs">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>

														<?php if( $ed_block_1_author ){ ?>
															<div class="nr-meta-tag nr-meta-sm">
																<?php newsreaders_posted_by(); ?>
															</div>
														<?php } ?>

													</div>
												</div>
											</div>
				                    	<?php endwhile; ?>

				                    </div>

				                </div>
				            </div>

			        	<?php endif; ?>

			        	<?php if( $block_2_verticle_slide_query->have_posts() ): ?>

				            <div class="column column-12 column-lg-5 nr-order-2">
				                <div class="nr-single-post nr-single-slider nr-slick-arrow">

				                	<?php
			                    	while( $block_2_verticle_slide_query->have_posts() ):
			                    		$block_2_verticle_slide_query->the_post();
			                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
			                    		if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

			                    		<div class="nr-post nr-with-bg ">
											<div class="nr-image-section nr-image-with-content nr-image-450 nr-overlay nr-image-hover-effect" >
												<a href="<?php the_permalink(); ?>"></a>

												<div class="nr-image bg-image" style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')">
													
												</div>
												
												<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
					                        	<div class="nr-bookmark">
													<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
												</div>

												<?php newsreaders_post_read_time(); ?>

												<?php if( $ed_block_1_cat ){ ?>
													<div class="nr-category nr-category-with-bg">
														<?php newsreaders_entry_footer( $cats = true, $tags = false, $edits = false,$text = false,$icon = false ); ?>
													</div>
												<?php } ?>
													


											</div>
											
					                        <div class="nr-desc ">
					                            <h3 class="nr-post-title">
					                            	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>

												<?php if( $ed_block_1_author || $ed_block_1_date ){ ?>

													<div class="nr-meta-tag">
														
														<?php
														if( $ed_block_1_author ){
															newsreaders_posted_by();
														}

														if( $ed_block_1_date ){
															newsreaders_posted_on();
														} ?>
														
														<?php newsreaders_post_social_share(); ?>

													</div>
													
												<?php } ?>
												

					                        </div>

					                    </div>

			                    	<?php endwhile; ?>

				                </div>
				            </div>
			            
			            <?php endif; ?>

			            <?php if( $block_3_verticle_slide_query->have_posts() ): ?>

				            <div class="column column-4 nr-order-3">
				                <div class="nr-block-post-list">
				                	<?php
			                    	if( $block_3_verticle_slide_query->have_posts() ):
			                    		$block_3_verticle_slide_query->the_post();
			                    		$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
			                    		
			                    		if( empty( $featured_image[0] ) ){ $featured_image[0] = $fallback_images; } ?>

			                    		<div class="nr-post">
											<div class="nr-image-section nr-image-150 nr-image-hover-effect nr-overlay-hover-effect" >
												<a href="<?php the_permalink(); ?>"></a>
												<div class="nr-image bg-image nr-overlay-hover-effect"  style="background-image:url('<?php echo esc_url( $featured_image[0] ); ?>')">
												</div>
												<?php echo esc_attr(newsreaders_post_format(get_the_ID())); ?>
												<div class="nr-bookmark">
				                            		<?php newsreaders_add_pin_post_html( get_the_ID() ); ?>
												</div>

												<?php newsreaders_post_read_time(); ?>

				                            </div>
				                            
				                            <div class="nr-desc">
				                                <h3 class="nr-post-title nr-post-title-sm">
				                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>

												<?php if( $ed_block_1_date ){ ?>
													<div class="nr-meta-tag nr-meta-sm">
														<?php newsreaders_posted_on(); ?>
													</div>
												<?php } ?>
				                            </div>

				                        </div>

			                    	<?php endif; ?>

                                    <div class="nr-post">
                                        <div class="nr-image-section nr-image-150" >
                                            <div class="nr-image bg-image nr-overlay-hover-effect">
                                                <iframe src="<?php echo $play_video_youtube_1["embed"]?>">
                                                </iframe>
                                            </div>
                                        </div>

                                        <div class="nr-desc">
                                            <h3 class="nr-post-title nr-post-title-sm">
                                                <a href="<?php echo $play_video_youtube_1["url"]?>"><?php echo $play_video_youtube_1["name"] ?></a>
                                            </h3>

                                            <div class="nr-meta-tag nr-meta-sm">
                                                <div class="entry-meta-item entry-meta-date">
                                                    <div class="entry-meta-wrapper">
                                                        <span class="entry-meta-icon calendar-icon">
                                                            <?php newsreaders_the_theme_svg('calendar'); ?>
                                                        </span>
                                                        <span class="posted-on nr-caption">
                                                            <?php echo $play_video_youtube_1["date"] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="nr-post">
                                        <div class="nr-image-section nr-image-150" >
                                            <div class="nr-image bg-image nr-overlay-hover-effect">
                                                <iframe src="<?php echo $play_video_youtube_2["embed"]?>">
                                                </iframe>
                                            </div>
                                        </div>

                                        <div class="nr-desc">
                                            <h3 class="nr-post-title nr-post-title-sm">
                                                <a href="<?php echo $play_video_youtube_2["url"]?>"><?php echo $play_video_youtube_2["name"] ?></a>
                                            </h3>

                                            <div class="nr-meta-tag nr-meta-sm">
                                                <div class="entry-meta-item entry-meta-date">
                                                    <div class="entry-meta-wrapper">
                                                        <span class="entry-meta-icon calendar-icon">
                                                            <?php newsreaders_the_theme_svg('calendar'); ?>
                                                        </span>
                                                        <span class="posted-on nr-caption">
                                                            <?php echo $play_video_youtube_2["date"] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="nr-post">
                                        <div class="nr-image-section nr-image-150" >
                                            <div class="nr-image bg-image nr-overlay-hover-effect">
                                                <iframe src="<?php echo $play_video_youtube_3["embed"]?>">
                                                </iframe>
                                            </div>
                                        </div>

                                        <div class="nr-desc">
                                            <h3 class="nr-post-title nr-post-title-sm">
                                                <a href="<?php echo $play_video_youtube_3["url"]?>"><?php echo $play_video_youtube_3["name"] ?></a>
                                            </h3>

                                            <div class="nr-meta-tag nr-meta-sm">
                                                <div class="entry-meta-item entry-meta-date">
                                                    <div class="entry-meta-wrapper">
                                                        <span class="entry-meta-icon calendar-icon">
                                                            <?php newsreaders_the_theme_svg('calendar'); ?>
                                                        </span>
                                                        <span class="posted-on nr-caption">
                                                            <?php echo $play_video_youtube_3["date"] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

				                </div>
				            </div>

			            <?php endif; ?>

			        </div>
			    </div>
			</div>

		<?php
		}

	}

endif;