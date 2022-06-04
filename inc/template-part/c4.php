<?php 
/**
 * 
 * @author Kapamau
*/
?>
 <div class="col-lg-12 col-md-12 ">
	   <div class="card-small">
			<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"/>
			<div class="card-small-wrapper col">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date()); ?></span>
			</div>
		</div>
	</div>	
