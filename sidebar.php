<?php
/**
 * The template for the sidebar containing the main widget area
 * @author Kapamau
 */
?>

<?php if ( is_active_sidebar( 'hm-sidebar' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'hm-sidebar' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
