<?php
/**
 * Plugin Name: Facebook Widget
 */

add_action( 'widgets_init', 'pixelshow_facebook_load_widget' );

function pixelshow_facebook_load_widget() {
	register_widget( 'pixelshow_facebook_widget' );
}

class pixelshow_facebook_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct()
	{
		$widget_ops = array( 'classname' => 'pixelshow_facebook_widget', 'description' => esc_html__('A widget that displays a Facebook Like Box', 'amelia') );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'pixelshow_facebook_widget' );
		parent::__construct( 'pixelshow_facebook_widget', esc_html__('Amelia: Facebook Like Box', 'amelia'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$page_url = $instance['page_url'];
		$faces = $instance['faces'];
		$stream = $instance['stream'];
		$header = $instance['header'];
		$width = $instance['width'];
		$height = $instance['height'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		
			<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo esc_url($page_url); ?>&amp;width=<?php echo esc_html($width); ?>&amp;colorscheme=light&amp;show_faces=<?php if($faces) { echo 'true'; } else { echo 'false'; } ?>&amp;border_color&amp;stream=<?php if($stream) { echo 'true'; } else { echo 'false'; } ?>&amp;header=<?php if($header) { echo 'true'; } else { echo 'false'; } ?>&amp;height=<?php echo esc_html($height); ?>&amp;show_border=false" style="border:none; overflow:hidden; width:<?php echo esc_html($width); ?>px; height:<?php echo esc_html($height); ?>px; background:#fff;" ></iframe>
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['faces'] = strip_tags( $new_instance['faces'] );
		$instance['stream'] = strip_tags( $new_instance['stream'] );
		$instance['header'] = strip_tags( $new_instance['header'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Find us on Facebook', 'width' => 260, 'height' => 290, 'header' => 'on', 'faces' => 'on', 'page_url' => '', 'stream' => false);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html( 'Title:', 'amelia' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:96%;" />
		</p>
		
		<!-- Page url -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>"><?php echo esc_html( 'Facebook Page URL:', 'amelia' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'page_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'page_url' )); ?>" value="<?php echo esc_attr($instance['page_url']); ?>" style="width:96%;" />
			<small>EG. http://www.facebook.com/envato</small>
		</p>

		<!-- Faces -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'faces' )); ?>"><?php echo esc_html( 'Show Faces:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'faces' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'faces' )); ?>" <?php checked( (bool) $instance['faces'], true ); ?> />
		</p>
		
		<!-- Stream -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'stream' )); ?>"><?php echo esc_html( 'Show Stream:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'stream' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'stream' )); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />
		</p>
		
		<!-- Header -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'header' )); ?>"><?php echo esc_html( 'Show Header:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'header' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'header' )); ?>" <?php checked( (bool) $instance['header'], true ); ?> />
		</p>
		
		<!-- Widget width -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'width' )); ?>"><?php echo esc_html( 'Like Box width:', 'amelia' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'width' )); ?>" value="<?php echo esc_attr($instance['width']); ?>" style="width:20%;" />
		</p>
		
		<!-- Widget height -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'height' )); ?>"><?php echo esc_html( 'Like Box height:', 'amelia' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'height' )); ?>" value="<?php echo esc_attr($instance['height']); ?>" style="width:20%;" />
			<small><?php echo esc_html( 'Note: If you are showing the stream the height should be around 500.', 'amelia' ); ?></small>
		</p>

	<?php
	}
}

?>