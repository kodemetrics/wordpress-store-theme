	<li>
			<a href="<?php the_permalink(); ?>" class="recent-post-image">
			     <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"/>
			</a>
			<div class="recent-post-content">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<span><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date()); ?></span>
			</div>
	</li>
