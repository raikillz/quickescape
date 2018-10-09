<?php 
/**
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */
 
/** 
* Set the theme's content width.
*/
if ( ! isset( $content_width ) )
	$content_width = 1170;

/**
* Theme set up
*/
add_action( 'after_setup_theme', 'pixelshow_theme_setup' );

if ( !function_exists('pixelshow_theme_setup') ) {
	
	function pixelshow_theme_setup() {
	
		// Register menu
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'amelia' ),
			)
		);
		
		// Localization
		load_theme_textdomain('amelia', get_template_directory() . '/languages');
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		
		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'amelia-full-thumb', 1170, 0, true );
		add_image_size( 'amelia-misc-thumb', 520, 400, true );
		
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		// Page Title
		add_theme_support( 'title-tag' );

		//Woocommerce support
		add_theme_support( 'woocommerce' );
	}
}

/** 
* Register & enqueue styles/scripts
*/
add_action( 'wp_enqueue_scripts', 'pixelshow_load_scripts' );

function pixelshow_load_scripts() {

	// Register scripts and styles
	wp_enqueue_style('plugins-css', get_template_directory_uri() . '/css/plugins.css', array(), null);
	wp_enqueue_style('amelia-main-styles', get_template_directory_uri() . '/style.css', array(), null);
	wp_enqueue_style('default', get_template_directory_uri() . '/css/woocommerce.css', array(), null);
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/media.css', array(), null);
	
	wp_enqueue_script('plugins', get_template_directory_uri(). '/js/plugins.js', array('jquery'), '4.1.2', true);
	wp_enqueue_script('amelia-main-scripts', get_template_directory_uri(). '/js/main.js', array('jquery'), '1.0', true);
	
	wp_add_inline_script(
		'amelia-main-scripts',
		'function buttonUp(){ var inputVal = jQuery(".searchbox-input").val(); inputVal = jQuery.trim(inputVal).length; if( inputVal !== 0){ jQuery(".searchbox-icon").css("display","none"); } else { jQuery(".searchbox-input").val(""); jQuery(".searchbox-icon").css("display","block"); } }'
	);

	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}	
}

/** 
* Google Fonts
*/
if ( ! function_exists( 'pixelshow_theme_fonts_url' ) ) :
function pixelshow_theme_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';

    if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'amelia' ) ) {
        $fonts[] = 'Open Sans:400,400i,700,700i';
    }

    if ( 'off' !== esc_html_x( 'on', 'Montserrat font: on or off', 'amelia' ) ) {
        $fonts[] = 'Montserrat:400,600';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function pixelshow_theme_scripts() {

    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'amelia_theme-fonts', pixelshow_theme_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_theme_scripts' );

/** 
* Include files
*/
// Theme Options
require_once(get_template_directory() .'/functions/customizer/pxs_custom_controller.php');
require_once(get_template_directory() .'/functions/customizer/pxs_customizer_settings.php');
require_once(get_template_directory() .'/functions/customizer/pxs_customizer_style.php');

// Widgets
require_once(get_template_directory() .'/inc/widgets/about_widget.php');
require_once(get_template_directory() .'/inc/widgets/social_widget.php');
require_once(get_template_directory() .'/inc/widgets/post_widget.php');
require_once(get_template_directory() .'/inc/widgets/facebook_widget.php');

/** 
* Register footer widgets
*/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__( 'Sidebar', 'amelia' ),
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Instagram Footer', 'amelia' ),
		'id' => 'instagram_footer',
		'before_widget' => '<div id="%1$s" class="widget instagram-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="instagram-title">',
		'after_title' => '</h4>',
		'description' => esc_html__( 'Use the Instagram widget here. IMPORTANT: For best result select "Large" under "Photo Size" and set number of photos to 6.', 'amelia' ),
	)); 
	register_sidebar(array(
		'name' => esc_html__( 'Glide Sidebar', 'amelia' ),
		'id' => 'glide_sidebar',
		'before_widget' => '<div id="%1$s" class="widget glide-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="glide-widget-title">',
		'after_title' => '</h4>',
	));
}

/** 
* Comments
*/
function pixelshow_comments($pixelshow_comment, $args, $depth) {
	$GLOBALS['pixelshow_comment'] = $pixelshow_comment;
	
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="thecomment">
					
			<div class="author-img">
				<?php echo get_avatar($pixelshow_comment,$args['avatar_size']); ?>
			</div>
			
			<div class="comment-text">
				<span class="reply">
					<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'amelia'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $pixelshow_comment->comment_ID); ?>
					<?php edit_comment_link(esc_html__('Edit', 'amelia')); ?>
				</span>
				<span class="author"><?php echo get_comment_author_link(); ?></span>
				<span class="date"><?php printf(esc_html__('%1$s at %2$s', 'amelia'), get_comment_date(),  get_comment_time()) ?></span>
				<?php if ($pixelshow_comment->comment_approved == '0') : ?>
					<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'amelia'); ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
					
		</div>
	</li>

	<?php 
}

/** 
* Pagination
*/
function pixelshow_pagination() {
	
	?>
	<div class="pagination">
		<div class="older widget-title"><?php next_posts_link(__( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'amelia')); ?></div>
		<div class="newer widget-title"><?php previous_posts_link(__( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'amelia')); ?></div>
	</div>			
	<?php
	
}

/** 
* Remove more link
*/
function pixelshow_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'pixelshow_remove_more_link_scroll' );

/** 
* Exclude
*/
function pixelshow_category($separator) {
	
	if(get_theme_mod( 'pixelshow_pxs_featured_cat_hide' ) == true) {
		
		$excluded_cat = get_theme_mod('pixelshow_pxs_featured_cat');
		
		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($category->cat_ID != $excluded_cat) {
				if ($first_time == 1) {
					echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "amelia" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
					$first_time = 0;
				} else {
					echo $separator . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "amelia" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
				}
			}
		}
	
	} else {
		
		$first_time = 1;
		foreach((get_the_category()) as $category) {
			if ($first_time == 1) {
				echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "amelia" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
				$first_time = 0;
			} else {
				echo $separator . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( esc_html__( "View all posts in %s", "amelia" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
			}
		}
	
	}
}

/** 
* Except
*/
function pixelshow_custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'pixelshow_custom_excerpt_length', 999 );

function pixelshow_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}

/** 
* Content
*/
if(!function_exists('amelia_content')) {
    function amelia_content($limit)
    {
        $content = explode(' ', get_the_content(), $limit);
        if (count($content) >= $limit) {
            array_pop($content);
            $content = implode(" ", $content) . '...';
        } else {
            $content = implode(" ", $content) . '';
        }
        $content = preg_replace('/\[.+\]/', '', $content);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }
}

/** 
* Register the required plugins
*/
require_once(get_template_directory() .'/class-tgm-plugin-activation.php');

add_action( 'amelia_register', 'pixelshow_theme_register_required_plugins' );
function pixelshow_theme_register_required_plugins() {

	$plugins = array(
		// This is an example of how to include a plugin pre-packaged with a theme.
		array(
			'name'               => esc_html__('Amelia Theme Addons', 'amelia' ),
			'slug'               => 'amelia-theme-addons',
			'source'             => get_template_directory() . '/plugins/amelia-theme-addons.zip',
			'required'           => true,
		),
		//Vafpress Post Formats UI
		array(
			'name'               => esc_html__('Vafpress Post Formats UI', 'amelia' ),
			'slug'               => 'vafpress-post-formats-ui-develop',
			'source'             => get_template_directory() . '/plugins/vafpress-post-formats-ui-develop.zip',
			'required'           => true,
		),
		//WP Instagram Widget
		array(
			'name'     				=> esc_html__('WP Instagram Widget', 'amelia' ),
			'slug'     				=> 'wp-instagram-widget',
			'required' 				=> false,
		),
		//Contact Form 7
		array(
			'name'     				=> esc_html__('Contact Form 7', 'amelia' ),
			'slug'     				=> 'contact-form-7',
			'required' 				=> false,
		),
		//Loco Translation Manager
		array(
			'name'     				=> esc_html__('Loco Translation Manager', 'amelia' ),
			'slug'     				=> 'loco-translate',
			'required' 				=> false,
		),
		//MailChimp for WordPress
		array(
			'name'     				=> esc_html__('MailChimp for WordPress (Newsletter signup)', 'amelia' ),
			'slug'     				=> 'mailchimp-for-wp',
			'required' 				=> false,
		),
		//Woocommerce
		array(
			'name'     				=> 'WooCommerce',
			'slug'     				=> 'woocommerce',
			'required'				=> false
		)
	);

	$config = array(
		'id'           => 'amelia',
		'default_path' => '',
		'menu'         => 'amelia-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	amelia( $plugins, $config );
}

//copyright based on the year of latest post
function create_copyright() {
$all_posts = get_posts( 'post_status=publish&order=ASC' );
$first_post = $all_posts[0];
$first_date = $first_post->post_date_gmt;
_e( 'Copyright &copy; ' );
if ( substr( $first_date, 0, 4 ) == date( 'Y' ) ) {
echo date( 'Y' );
} else {
echo substr( $first_date, 0, 4 ) . "-" . date( 'Y' );
}
echo ' <strong>' . get_bloginfo( 'name' ) . '</strong> ';
_e( 'All rights reserved.' );
}
