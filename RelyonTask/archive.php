<?php get_header();  ?>

		<?php if ( have_posts() ) : ?>

		    <!-- Start Blog content -->
		    <section class="ctp-page ptb">
		        <div class="container">
		            <div class="row">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

						<?php  endwhile; ?>
					</div>

				</div>
			</section>
			<div class="row">
		      	<div class="col-sm-12">
		        	<div class="theme-pagination">
		          		<ul class="list-inline text-center">
							<?php 
								if (function_exists("pagination")) {
									pagination($posts->max_num_pages);
								}
							?>
						</ul>
				   	</div>
				</div>
			</div>
			

			<?php else : // If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif; ?>

<?php get_footer(); ?>
