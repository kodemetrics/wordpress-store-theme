<?php
add_action('widgets_init', 'theme_social_widget_register');

function theme_social_widget_register() {
	register_widget('Theme_Social_Widget');
}

class Theme_Social_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'social_widget',
			esc_attr__('Theme Social Widget', 'theme'),
			array('description' => esc_attr__('Displays social links', 'theme'))
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters('widget_title', $instance['title']);

	    echo $args['before_widget'];
	    if (!empty($title)) {
	    	echo $args['before_title'] . esc_attr($title) . $args['after_title'];
	    }
	   echo '<div class="social_link_wrapper"><ul class="widget-social-link">';
					$social_links = theme_social_links() ;
					foreach($social_links as $link) {
						echo '<li>';
					   	echo '<a class="'.esc_attr(strtolower($link->name)).'"  href="' . esc_attr($link->url) . '"  target="_blank">
							             <i class="fa fa-' . esc_attr($link->class=="facebook-square" ? "facebook": $link->class ) . '"></i>
									</a>';
						  //echo '<a class="'.esc_attr(strtolower($link->name)).'"  href="'. esc_attr($link->url) .'"> </a>';
						echo '</li>';
					}
		echo '</ul></div>';
	  echo $args['after_widget'];
	}

	public function form($instance) {
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'theme'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
?>
