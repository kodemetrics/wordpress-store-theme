<?php
add_action('widgets_init', 'theme_recent_blog_posts_widget_register');

function theme_recent_blog_posts_widget_register() {
	register_widget('Theme_RecentBlogPosts_Widget');
}

class Theme_RecentBlogPosts_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'recent_blog_posts_widget',
			esc_attr__('Theme Blog Posts', 'theme'),
			array('description' => esc_attr__('Shows recent posts', 'theme'))
		);
	}

	public function widget( $args, $instance ) {
		 $title = apply_filters('widget_title', $instance['title']);
		 $limit = is_numeric($instance['limit']) ? $instance['limit'] : 5;
		 $type = is_numeric($instance['type'])  ? $instance['type'] : 1;

	    echo $args['before_widget'];
	    if (!empty($title)) {
	    	echo $args['before_title'] . esc_attr($title) . $args['after_title'];
	    }

	    $options = array(
				'post_type' => 'post',
				// 'category_name' => 'fashion',
				//'meta_key' => 'wpb_post_views_count',
				//'meta_key' => 'popular_posts',
        //'orderby' => 'meta_value_num',
				'post_status' => 'publish',
				'posts_per_page' => $limit,
				'ignore_sticky_posts' => true,
				'orderby' => 'date',
				'order' => 'desc',
				'meta_key' => '_thumbnail_id'
		   );
			$posts_query = new WP_Query($options);
			if($posts_query->have_posts()) {
				 //echo $type."-".$limit ;
				if($type == 1){
					?><div class="widget-content-wrapper"><?php
					while($posts_query->have_posts()) {
						$posts_query->the_post(); ?>
								<div class="custom-item">
									<a class="entry-image-link" href="<?php the_permalink(); ?>">
										<span class="entry-thumb" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>)"></span>
									</a>
									<div class="entry-content">
										<h6 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h6>
										<span><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date('M j, Y')); ?></span>
									</div>
								</div>
						<?php
					}
					?></div><?php
		    	}elseif ($type == 2){
				    ?><div class="grid-post-wrapper"> <div class="client owl-carousel"><?php
								while($posts_query->have_posts()) {
									$posts_query->the_post();
								  	?>
										  <div class="item">
													<div class="grid-post">
													    <a class="grid-image-link" href="<?php the_permalink(); ?>">
															<span class="grid-thumb" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>)"></span>
														</a>
															<div class="grid-post-content">
																	<h6><a href="<?php the_permalink(); ?>"> <?php the_title();?> </a></h6>
																	<span><?php the_category('-');?></span>
																	<span><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date('M j, Y')); ?></span>
															</div>
													</div>
										  </div>
										<?php



									}
							}elseif ($type == 3) {
								?><div class="tm-wrapper"><?php
	 	 								while($posts_query->have_posts()) {
	 	 									$posts_query->the_post();
	 	 								  	?>
	 	 											<div class="tm-post">
	 	 											    <a href="<?php the_permalink(); ?>">
	 	 												   	<span class="tm-thumb" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>)"></span>
	 	 												  </a>
	 	 													<div class="tm-content">
	 	 															<h6><a href="<?php the_permalink(); ?>"> <?php the_title();?> </a></h6>
	 	 															<span><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date('M j, Y')); ?></span>
	 	 													</div>
	 	 											</div>
	 	 										<?php
	 	 									}
									?></div><?php
							}
					}//end of first if statement

	    echo $args['after_widget'];
	}

	public function form($instance) {
		if (isset($instance['title'])) {$title = $instance['title'];} else {$title = '';}

		?>
			<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'theme'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
		<?php


		if (isset($instance['limit'])) {$limit = $instance['limit'];} else {$limit = '';}
		?>
			<p>
			  <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_attr_e('Number of posts:', 'theme'); ?></label>
			  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="text" value="<?php echo esc_attr($limit); ?>" />
			</p>
		<?php

		// if (isset($instance['type'])) {$type = $instance['type'];} else {$type = '';}

		?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_attr_e('Post Type:', 'theme'); ?></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>">
								 <option <?php selected( $instance['type'], 1 ); ?> value="<?php echo esc_attr($type = 1); ?>">List</option>
								 <option <?php selected( $instance['type'], 2 ); ?> value="<?php echo esc_attr($type = 2); ?>">Grid</option>
								 <option <?php selected( $instance['type'], 3 ); ?> value="<?php echo esc_attr($type = 3); ?>">Grid 2x2</option>
				</select>
			</p>
		<?php

	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['type'] =  ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) :'';
		return $instance;
	}
}
?>
