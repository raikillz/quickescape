<?php if(get_comments_number()){ ?>
	<div class="comment-counter"><i class="fa fa-comment-o"></i> <?php comments_popup_link( '0 Comments', '1 Comment', '% Comments'); ?></div>
<?php } ?>