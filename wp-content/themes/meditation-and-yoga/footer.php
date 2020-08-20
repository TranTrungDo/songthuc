<?php
/**
 * The template for displaying the footer
 * @package Meditation And Yoga
 * @subpackage meditation-and-yoga
 * @since 1.0
 * @version 0.1
 */

?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
			</div>
			<div class="clearfix"></div>
			<div class="copyright"> 
				<div class="container">
					<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
				</div>
			</div>
		</footer>
	</div>
</div>
<a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Lên đầu trang', 'songthuc'); ?>">
    <i class="fa fa-angle-double-up"></i>
</a>
<?php wp_footer(); ?>

</body>
</html>