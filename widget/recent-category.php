<?php
add_action('widgets_init', 'theme_recent_projects_widget_register');

function theme_recent_projects_widget_register() {
	register_widget('Theme_RecentProjects_Widget');
}

class Theme_RecentProjects_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'recent_projects_widget',
			esc_attr__('Theme Categories', 'theme'),
			array('description' => esc_attr__('Show theme category ', 'theme'))
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters('widget_title', $instance['title']);
	  $limit = is_numeric($instance['limit']) ? $instance['limit'] : 0;

	    echo $args['before_widget'];
	    if (!empty($title)) {
	    echo $args['before_title'] . esc_attr($title) . $args['after_title'];
	    }

      echo "<ul class='custom-category'>";
			$terms = get_terms(['taxonomy' =>'category','hide_empty' => false,]);
			//echo json_encode($terms );
      foreach ($terms as $key => $value) {//foreach (get_the_category() as $key => $value) {
	      ?>
	           <li>
							 <a href="<?php echo home_url().'/category/'.$value->slug ?> ">
								 <?php echo $value->name ?> <span>(<?php echo $value->count ?>)</span></a>
						 </li>
				<?php
			 }
      echo "</ul>";
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
