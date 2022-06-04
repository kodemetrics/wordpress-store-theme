<?php
add_action('widgets_init', 'theme_recent_comments_widget_register');

function theme_recent_comments_widget_register() {
	register_widget('Theme_RecentComments_Widget');
}

class Theme_RecentComments_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'recent_comments_widget',
			__('Theme Comments', 'theme'),
			array('description' => esc_attr__('Shows recent comments with user avatars', 'theme'))
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters('widget_title', $instance['title']);
	    $limit = is_numeric($instance['limit']) ? $instance['limit'] : 4;

	    echo $args['before_widget'];
	    if (!empty($title)) {
	    	echo $args['before_title'] . esc_attr($title) . $args['after_title'];
	    }
	    if($limit > 0) {
		    $c_opts = array('status' => 'approve','number' => $limit);
		    $comments = get_comments($c_opts);
		    if(count($comments)) : ?>
		    <ul class="recent-comments custom">

		    	<?php foreach($comments as $com) :
					    	$pid = $com->comment_post_ID;
					    	$post = get_post($pid);
					    	$words = explode(" ", $com->comment_content);
					    	$comm_short = implode(" ", array_slice($words, 0, 10)) . "...";
					    	?>
								<div class="custom-item custom-recent-comments">
										 <a class="entry-image-link" href="<?php the_permalink(); ?>">
											 <span class="entry-thumb" style="background-image: url(<?php echo get_avatar_url($com->comment_author_email)?>)"></span>
										 </a>
										 <div class="entry-content comment">
												 <a href="<?php echo esc_attr($com->comment_author_url) ?>"><?php echo esc_attr($com->comment_author) ?></a>
												 <p><?php echo esc_attr($comm_short); ?></p>
										 </div>
								</div>

		    	<?php endforeach; ?>
		    </ul><?php
		    endif;
		}
	    echo $args['after_widget'];
	}

	public function FunctionName($value=''){
		?>
				<li>
						<?php echo get_avatar($com->comment_author_email, 50); ?>
						<div class="comment-content">
							<span class="who"><?php echo esc_attr($com->comment_author) ?></span>
							<p><?php echo esc_attr($comm_short); ?></p>
						</div>
				</li>
			<?php
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
		<label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_attr_e('Number of comments to show:', 'theme'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="text" value="<?php echo esc_attr($limit); ?>" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
		return $instance;
	}
}
?>
