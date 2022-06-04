<?php
/**
 *
 * @author Kapamau
*/
?>
	<div class="col-lg-6 featured-big mb-3">
			<div class="lazyload bg bg-49"
			style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>') ;height:150px;"></div>
			<div class="position-relative c-meta l-white">
			<div class="featured-text p-3">
			   <span class="meta-cat mb-2"><?php the_category(' ');?></span>
			   <h2 class="t-medium f-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			     <div class="meta-loop small c-meta f-text">
			     	<span class="author">by
			     	  <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
			     	</span> -
			     	<span class="date"><?php echo esc_html(get_the_date()); ?></span>
			     </div>
			</div>
			</div>
	</div>
