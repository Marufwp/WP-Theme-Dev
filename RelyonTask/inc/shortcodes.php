<?php

/*
	@package RT
	
	========================
		SHORTCODE OPTIONS
	========================
*/


if (!function_exists('blogPostShortCode')) :
function blogPostShortCode(){

    ob_start(); ?>

        <div class="row">
        	<?php
    			$args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    =>  3,
                    'orderby'           => 'DESC',
                    'order'             => 'date',
                    'paged'             => $paged,
                );

                $posts = new WP_Query($args);
        	?>
            <div class="col-lg-12">
                <?php

                    if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE
                        
                        while( $posts->have_posts() ) : $posts->the_post();
                        
                        $thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
                        $month_m = get_the_date( 'F j, Y' );
                        $content    = wp_trim_words( get_the_content(), '30', $more );
                    ?>
                    <article class="single-blog-post-item wow fadeInUp"><!-- single blog post item -->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="thumb">
                                    <?php if(!empty($thumbnails)): ?>
                                        <img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" >
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="content">
                                    <a href="<?php the_permalink(); ?>"><h4 class="title"><?php the_title(); ?></h4></a>
                                    <ul class="meta-data">
                                        <li>Posted By: <a href="javascript:void(0)"><?php the_author(); ?></a></li>
                                        <li><a href="#"><i class="fa fa-clock"></i> <?php echo $month_m; ?></a></li>
                                    </ul>
                                    <div class="description">
                                        <p><?php echo $content; ?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="readmore">read more <i class="icofont">long_arrow_right</i></a>
                                </div>
                            </div>
                        </div>
                    </article><!-- //.single blog post item -->
                    <?php endwhile;  wp_reset_postdata(); ?>

                    <?php else : //ECHO POST NOT FOUND ?>
                    <p style=" color: red; text-align: center;">
                    <?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
                <?php  endif; ?>
            </div><!-- //.testiomonial carousel -->
        </div>

    <?php
        return ob_get_clean();
    }
endif;
add_shortcode('BlogPosts', 'blogPostShortCode');
// show page [shortcodename]