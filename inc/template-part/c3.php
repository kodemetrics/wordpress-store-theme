<?php 
/**
 * 
 * @author Kapamau
*/
?>

  <div class="col-lg-4 col-md-4 col-sm-6 featured-big mb-4">
			<div class="lazyload bg bg-49" 
			style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>') ;height:150px;"></div>
			
			<div class="content-wrapper">
			   <h3 class="t-medium f-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			     <div class="meta-loop small c-meta f-text">
			        <span class="meta-cat meta-category f-cat"><?php the_category('|');?></span>
			     	<span class="author">by 
			     	  <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
			     	</span> -
			     	<span class="date"><?php echo esc_html(get_the_date()); ?></span>
			     </div>
			</div>
			
	</div>