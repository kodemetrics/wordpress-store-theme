<?php
add_action('widgets_init', 'theme_recent_tags_widget_register');

function theme_recent_tags_widget_register() {
	register_widget('Theme_RecentTags_Widget');
}

class Theme_RecentTags_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'recent_tags_widget',
			esc_attr__('Theme Tags', 'theme'),
			array('description' => esc_attr__('Shows theme tags ', 'theme'))
		);
	}

	public function widget( $args, $instance ) {
	   $title = apply_filters('widget_title', $instance['title']);
	   $limit = is_numeric($instance['limit']) ? $instance['limit'] : 0;

	    echo $args['before_widget'];
	    if (!empty($title)) {
	    echo $args['before_title'] . esc_attr($title) . $args['after_title'];
	    }

	  	$tags = get_tags();
			if ( $tags ) {
				  echo "<ul class='custom-tags'>";
					foreach ( $tags as $tag ) {
				  ?> <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li> <?php
						}
						echo "</ul>";
				}

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
		if (isset($instance['limit'])) {
			$limit = $instance['limit'];
		} else {
			$limit = '';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_attr_e('Number of projects to show:', 'theme'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="text" value="<?php echo esc_attr($limit); ?>" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 0;
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : 0;
		return $instance;
	}
}
?>
