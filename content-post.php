<article class="col-md-4 col-sm-6 col-xs-12">
	 <div class="card">
		<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" />
		<div class="content">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<span class="category"><?php the_category('|');?></span>
			<span><i class="fa fa-calendar-o"></i><?php the_date(); ?></span>
			<span><i class="fa fa-comments-o"></i>5 comments</span>
			<p><?php the_excerpt(); ?> </p>
			<a class="blog-link" href="<?php the_permalink(); ?>">read more</a>
		</div>
	</div>
</article>

