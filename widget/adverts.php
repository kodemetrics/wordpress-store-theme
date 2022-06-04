<?php
add_action('widgets_init', 'theme_advert_widget_register');

function theme_advert_widget_register() {
	register_widget('Theme_Advert_Widget');
}

class Theme_Advert_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'advert_widget',
			__('Theme Advert', 'theme'),
			array('description' => esc_attr__('Place adverts on sidebar', 'theme'))
		);
	}

	public function widget( $args, $instance ) {
	  $title = apply_filters('widget_title', $instance['title']);
	  $limit = $instance['limit'] ? $instance['limit'] : "#";
	  //$image = $instance['image'] ? $instance['image'] : "https://davidwalsh.name/demo/tailor-brands.jpg";
	  $image = $instance['image'] ? $instance['image'] : "https://1.bp.blogspot.com/-u5qmRuxw5P4/XKZgJMxU7JI/AAAAAAAAEVQ/wGYjdcpKw4Mx2dmG8NezwZ_cleG4NRs3ACK4BGAYYCw/s1600/ads300.png";
	  
	  echo $args['before_widget'];
			if (!empty($title)) {
				echo $args['before_title'] . esc_attr($title) . $args['after_title'];
			}

			?>
				<div class="widget-thumbnail">
					<a href="<?php echo $limit ?>">
						<img src="<?php echo $image ?>" alt="">
					</a>
				</div>
			<?php

	    echo $args['after_widget'];
	}


	public function form($instance) {
		     if (isset($instance['title'])) {$title = $instance['title'];} else {$title = '';}

		?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"> <?php esc_attr_e('Title:', 'theme'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>

			<?php
				if (isset($instance['limit']) ) {$limit = $instance['limit'];} else {$limit = '';}
			?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('limit')); ?>">  <?php esc_attr_e('Link to:', 'theme'); ?></label>
				<input class="widefat" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="text" value="<?php echo esc_attr($limit); ?>" placeholder="http://" />
			</p>


			<?php
				if ( isset($instance['image'])) {$image = $instance['image']; } else {$image = '';}
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('image')); ?>"> <?php esc_attr_e('IMG URL:', 'theme'); ?></label>
				<input class="widefat" name="<?php echo esc_attr($this->get_field_name('image')); ?>" type="text" value="<?php echo esc_attr($image); ?>" placeholder="http://" />
			</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		return $instance;
	}
}
?>
