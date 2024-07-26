<?php
/*
* @package RT
*/

get_header(); ?>
	
	<div id="index" class="index-area">
		<div class="container">   
			<div class="row">
				<?php if( have_posts() ):
				    while( have_posts() ): the_post(); ?>
						<div class="col-md-12">
							<?php the_content();?>
						</div>
				 	<?php endwhile; ?>
				 	<?php else : ?>
						<p><?php _e( 'Sorry, nothing to index.php content. Please add index content.', 'RT' ); ?></p>
					<?php endif; ?>
			</div>  
		</div><!-- .container --> 
	</div><!-- #primary -->
	
<?php get_footer(); ?>