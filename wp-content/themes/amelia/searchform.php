<?php
/**
 * Template for displaying search forms
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" placeholder="<?php esc_html_e('SEARCH...', 'amelia'); ?>" name="s" />
	<button type="submit" class="btn btn-default"></button>
</form>
