<form role="search" method="get" class="searchbox" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" placeholder="<?php esc_html_e('SEARCH...', 'amelia'); ?>" name="s" class="searchbox-input" onkeyup="buttonUp();" autocomplete="off" required />
	<span class="fk-submit"><i class="fa fa-search"></i></span>
	<input type="submit" class="searchbox-submit" value="">
	<span class="searchbox-icon"><i class="fa fa-search"></i></span>
</form>