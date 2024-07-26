<?php

get_header(); 
?>

<div class="search-page">
	<div class="container">
		<?php
		if( have_posts() ):
			while( have_posts() ): the_post();
			$content 	= wp_trim_words( get_the_content(), '15', '.' );
		?>
		<div class="row search-singleposts-info">
			<div class="col-md-12 col-sm-12">
				<article class="single-post solutions">	
					<a href="<?php the_permalink(); ?>"> <h4><?php the_title(); ?></h4></a>
					<p><?php echo $content; ?></p>
				</article>
			</div>
		</div>
		<?php endwhile; 
		else : ?>
		<div class="row">
			
	        <div class="col-md-6 col-sm-6 content">
	            <h2 class="heading">OOPS!</h2>
	            <p>I THINK I AM LOST</p>
	            <p><small>Sorry, we can't find the page you're looking for. While we look into it..</small></p>
	            <a href="<?php echo home_url('/'); ?>" class="button">Back to home</a>
	        </div>
	        <div class="col-md-6 col-sm-6 imgSec">
	            <div class="icon">
	                <div class="victor"></div>
	                <div class="animation"></div>
	            </div>
	        </div>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
