<?php 
/**
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */

add_action( 'customize_register', 'pixelshow_customize_register' );
function pixelshow_customize_register($wp_customize) {

	class Pixelshow_Customize_Number_Control extends WP_Customize_Control {
		public $type = 'number';
	 
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" name="quantity" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" style="width:70px;">
			</label>
			<?php
		}
	}
	
	class Pixelshow_Customize_CustomCss_Control extends WP_Customize_Control {
		public $type = 'custom_css';
	 
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea style="width:100%; height:150px;" <?php $this->link(); ?>><?php echo esc_html( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
	
	class Pixelshow_Customize_Radio_Image_Control extends WP_Customize_Control {

	public $type  = 'radio-image';
	public $default = '';

		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo esc_html( $this->id ); ?>" class="pixelshow-radio-image-control">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input class="radio-image" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_html( $this->id . $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
						<label for="<?php echo esc_html( $this->id . $value ); ?>">
							<img src="<?php echo esc_html( $label['image'] ); ?>" alt="<?php echo esc_attr( $label['title'] ); ?>" title="<?php echo esc_attr( $label['title'] ); ?>"><br>
							<?php echo esc_attr( $label['title'] ); ?>
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}

if (class_exists('WP_Customize_Control')) {
    class Pixelshow_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'amelia' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

?>