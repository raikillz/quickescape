<?php
/**
 * Plugin Name: Social Widget
 */

add_action( 'widgets_init', 'pixelshow_social_load_widget' );

function pixelshow_social_load_widget() {
	register_widget( 'pixelshow_social_widget' );
}

class pixelshow_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct()
	{
		$widget_ops = array( 'classname' => 'pixelshow_social_widget', 'description' => esc_html__('A widget that displays your social icons', 'amelia') );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'pixelshow_social_widget' );
		parent::__construct( 'pixelshow_social_widget', esc_html__('Amelia: Social Icons', 'amelia'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$googleplus = $instance['googleplus'];
		$instagram = $instance['instagram'];
		$bloglovin = $instance['bloglovin'];
		$youtube = $instance['youtube'];
		$tumblr = $instance['tumblr'];
		$pinterest = $instance['pinterest'];
		$dribbble = $instance['dribbble'];
		$soundcloud = $instance['soundcloud'];
		$vimeo = $instance['vimeo'];
		$linkedin = $instance['linkedin'];
		$rss = $instance['rss'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		
			<ul class="social-widget socials">
				<?php if($facebook) : ?><li><a href="http://facebook.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
				<?php if($twitter) : ?><li><a href="http://twitter.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
				<?php if($instagram) : ?><li><a href="http://instagram.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
				<?php if($pinterest) : ?><li><a href="http://pinterest.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
				<?php if($bloglovin) : ?><li><a href="http://bloglovin.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a></li><?php endif; ?>
				<?php if($googleplus) : ?><li><a href="http://plus.google.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_google')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
				<?php if($tumblr) : ?><li><a href="http://<?php echo esc_html(get_theme_mod('pixelshow_pxs_tumblr')); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a></li><?php endif; ?>
				<?php if($youtube) : ?><li><a href="http://youtube.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>
				<?php if($dribbble) : ?><li><a href="http://dribbble.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_dribbble')); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php endif; ?>
				<?php if($soundcloud) : ?><li><a href="http://soundcloud.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_soundcloud')); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li><?php endif; ?>
				<?php if($vimeo) : ?><li><a href="http://vimeo.com/<?php echo esc_html(get_theme_mod('pixelshow_pxs_vimeo')); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li><?php endif; ?>
				<?php if($linkedin) : ?><li><a href="<?php echo esc_html(get_theme_mod('pixelshow_pxs_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
				<?php if($rss) : ?><li><a href="<?php echo esc_html(get_theme_mod('pixelshow_pxs_rss')); ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php endif; ?>
			</ul>
			
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
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['bloglovin'] = strip_tags( $new_instance['bloglovin'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
		$instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
		$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Subscribe & Follow', 'facebook' => '1', 'twitter' => '1', 'instagram' => '1', 'googleplus' => '0', 'bloglovin' => '0', 'youtube' => '0', 'tumblr' => '0', 'pinterest' => '0', 'dribbble' => '0', 'soundcloud' => '0', 'vimeo' => '0', 'linkedin' => '0', 'rss' => '0');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html( 'Title:', 'amelia' ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:90%;" />
		</p>
		
		<p><?php echo esc_html( 'Note: Set your social links in the Customizer', 'amelia' ); ?></p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php echo esc_html( 'Show Facebook:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" value="facebook" <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php echo esc_html( 'Show Twitter:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" value="twitter" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php echo esc_html( 'Show Instagram:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" value="instagram" <?php checked( (bool) $instance['instagram'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>"><?php echo esc_html( 'Show Pinterest:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' )); ?>" value="pinterest" <?php checked( (bool) $instance['pinterest'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>"><?php echo esc_html( 'Show Bloglovin:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'bloglovin' )); ?>" value="bloglovin" <?php checked( (bool) $instance['bloglovin'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>"><?php echo esc_html( 'Show Google Plus:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'googleplus' )); ?>" value="googleplus" <?php checked( (bool) $instance['googleplus'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>"><?php echo esc_html( 'Show Tumblr:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr' )); ?>" value="tumblr" <?php checked( (bool) $instance['tumblr'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php echo esc_html( 'Show Youtube:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" value="youtube" <?php checked( (bool) $instance['youtube'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>"><?php echo esc_html( 'Show Dribbble:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble' )); ?>" value="dribbble" <?php checked( (bool) $instance['dribbble'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>"><?php echo esc_html( 'Show Soundcloud:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud' )); ?>" value="soundcloud" <?php checked( (bool) $instance['soundcloud'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>"><?php echo esc_html( 'Show Vimeo:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo' )); ?>" value="vimeo" <?php checked( (bool) $instance['vimeo'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>"><?php echo esc_html( 'Show Linkedin:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin' )); ?>" value="linkedin" <?php checked( (bool) $instance['linkedin'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php echo esc_html( 'Show RSS:', 'amelia' ); ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'rss' )); ?>" value="rss" <?php checked( (bool) $instance['rss'], true ); ?> />
		</p>

	<?php
	}
}

?>