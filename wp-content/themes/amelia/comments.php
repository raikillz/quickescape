<?php
if ( post_password_required() ){
    return;
}
?>

<div class="post-comments" id="comments">
	
	<?php 
		echo '<div class="post-box"><div class="post-related-title"><h2>';
		comments_number(esc_html__('No Comments','amelia'), esc_html__('1 Comment','amelia'), '% ' . esc_html__('Comments','amelia') );
		echo '</h2></div>';

		echo "<div class='comments'>";
		
			wp_list_comments(array(
				'avatar_size'	=> 50,
				'max_depth'		=> 5,
				'style'			=> 'ul',
				'callback'		=> 'pixelshow_comments',
				'type'			=> 'all'
			));

		echo "</div>";

		echo "<div id='comments_pagination'>";
			paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;'));
		echo "</div>";

		$custom_comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';  

		comment_form(array(
			'comment_field'			=> $custom_comment_field,
			'comment_notes_after'	=> '',
			'logged_in_as' 			=> '',
			'comment_notes_before' 	=> '',
			'title_reply'			=> esc_html__('Leave a Reply', 'amelia'),
			'cancel_reply_link'		=> esc_html__('Cancel Reply', 'amelia'),
			'label_submit'			=> esc_html__('Post Comment', 'amelia')
		));
	 ?>

	</div><!-- .post-box -->
</div><!-- .comments div -->
