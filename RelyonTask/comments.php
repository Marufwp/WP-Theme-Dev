<?php /*
	
@package sunsettheme

*/

if( post_password_required() ){
	return;
}

?>

<div id="comments" class="comments-area default-form comment-form">
	
	<?php 
		if( have_comments() ):
		//We have comments
	?>
	
		<h2 class="comment-title">
			<?php
				
				printf(
					esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sunsettheme' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
					
			?>
		</h2>
		<ul class="comment-list">
			
				
				<?php 
					
					$args = array(
						'walker'			=> null,
						'max_depth' 		=> '',
						'style'				=> 'ol',
						'callback'			=> null,
						'end-callback'		=> null,
						'type'				=> 'all',
						'reply_text'		=> 'Reply',
						'page'				=> '',
						'per_page'			=> '',
						'avatar_size'		=> 64,
						'reverse_top_level' => null,
						'reverse_children'	=> '',
						'format'			=> 'html5',
						'short_ping'		=> false,
						'echo'				=> true
					);
					
					wp_list_comments( $args );
				?>

		</ul>
		
		<?php 
			if( !comments_open() && get_comments_number() ):
		?>
			 
			 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sunsettheme' ); ?></p>
			 
		<?php
			endif;
		?>
		
	<?php	
		endif;
	?>
	
	<?php 
		
		$fields = array(
			
			'author' =>
				'<div class="left-form"><div class="form-group"><input id="author" name="author" type="text" class="form-control" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
				
			'email' =>
				'<div class="form-group"><input id="email" placeholder="Email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div></div></div>'
				
		);
		$args = array(
			
			'class_submit' => 'theme-btn submit-btn btn-warning',
			'label_submit' => __( 'Add Comment' ),
			'comment_field' =>
				'<div class="totle-reply"><div class="right-form"><div class="form-group"><textarea id="comment" class="form-control" name="comment" rows="4" placeholder="Your Comment" required="required"></textarea></p></div></div></div>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
			
		);
		
		comment_form( $args ); 
		
	?>
	
</div><!-- .comments-area -->
