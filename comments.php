<?php 
/**
 * The template for displaying Comments.
 * @author Kapamau
 */

if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 100,
				) );
			?>
		</ol><!-- .comment-list -->
	<?php endif; // have_comments() ?>
	
	

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'wthemes' ); ?></p>
	<?php endif; ?>

<?php comment_form(); ?>
</div>

