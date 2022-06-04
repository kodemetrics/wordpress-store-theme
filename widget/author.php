<?php
add_action('widgets_init', 'theme_author_widget_register');

function theme_author_widget_register() {
	register_widget('Theme_Author_Widget');
}

class Theme_Author_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'recent_author_widget',
			__('Theme Author', 'theme'),
			array('description' => esc_attr__('Shows author profile', 'theme'))
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters('widget_title', $instance['title']);

	    echo $args['before_widget'];
	    if (!empty($title)) {
	    	echo $args['before_title'] . esc_attr($title) . $args['after_title'];
	    }
      ?>
		    <div class="post-author-wrapper">
						<div class="post-author-image"><?php echo get_avatar( get_the_author_meta( 'user_email' ), $size = '105' ); ?></div>
						<div class="post-author-meta">
								<h5><?php the_author(); ?></h5>
								<p><?php the_author_meta( 'description' ); ?></p>
						</div>

        </div>
     <?php
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
