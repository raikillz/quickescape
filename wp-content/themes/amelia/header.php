<?php 
/**
 * The template for displaying the header
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- title -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- preloader -->
	<div id="preloader"></div>
	
	<!-- glide-navigation -->
	<div class="glide-navigation">
		<div class="sidebar-scroll scrollbar-macosx">
			
			<!-- close-glide-button -->
			<div class="close-glide-button">
				<a href="#" class="close-btn">
					<span><?php echo esc_html__( 'Close Sidebar', 'amelia' ); ?></span>
					<i><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="<?php echo esc_html__( 'close', 'amelia' ); ?>"></i>
				</a>
			</div>

			<!-- glide-navigation-logo -->
			<div class="glide-navigation-logo">
				<?php if(!get_theme_mod('pixelshow_pxs_logo')) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
					
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod('pixelshow_pxs_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					
				<?php endif; ?>
			</div>
			
			<!-- navbar -->
			<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary-menu', 'menu_class' => 'navbar' ) ); ?>
			<?php dynamic_sidebar( 'glide_sidebar' ); ?>
			
			<!-- glide-navigation-copyright -->
			<div class="glide-navigation-copyright">
				<p><?php echo wp_kses_post(get_theme_mod('pixelshow_pxs_footer_copyright_left')); ?></p>
			</div>

		</div>
	</div>

	<!-- glide-navigation-copyright -->
	<div class="glide-overlay close-btn"></div>

	<!-- header -->
	<header>
		<div class="navigation-container">
			<div class="container">
			
				<!-- navigation -->
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary-menu', 'menu_class' => 'navigation' ) ); ?>
		        <!-- mobile-logo -->
		        
				<div class="logo">
					<?php if(!get_theme_mod('pixelshow_pxs_logo')) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
						
					<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod('pixelshow_pxs_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
						
					<?php endif; ?>
				</div>
				
				<!-- searchbox -->
				<?php get_template_part('inc/templates/custom_search'); ?>

			    <!-- menu-tumbl -->
			    <div class="menu-tumbl"><i class="fa fa-navicon"></i></div>
			</div>
		</div>
	</header>
	
	<!-- main-panel -->
	<div class="main-panel">
		<div class="logo-wrapper">
			<div class="container">
			
				<div class="logo <?php if(get_theme_mod('pixelshow_pxs_header_view_style') == 'logo_socials') : ?>logo-left<?php endif; ?>">
					<?php if(!get_theme_mod('pixelshow_pxs_logo')) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod('pixelshow_pxs_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php endif; ?>
				</div>
				
				<?php if(get_theme_mod('pixelshow_pxs_header_view_style') == 'logo_socials') : ?>
				<ul class="socials">
					<?php get_template_part('inc/templates/socials_list'); ?>
				</ul>
				<?php endif; ?>
				
			</div>
		</div>