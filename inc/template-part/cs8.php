<?php 
/**
 * 
 * @author Kapamau
*/
?>

<div class="col-lg-12">
    <div class="lazyload lazyload-image"  
      style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');height:175px;margin-bottom: 10px;">
	      	<div class="mustmg_post_data">
		      <div class="featured-text pts-3">
				     <h2 class="t-medium f-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				     <div class="meta-loop small c-meta f-text">
				        <span class="meta-cat "><?php the_category('|');?></span>
				     	<span class="date"><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date()); ?></span>
				     </div>
			 </div>
		 </div>
    </div>
</div>
