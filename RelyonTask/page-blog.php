<?php get_header();
/**
* Template Name: Blog
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>


<div class="sidebar-page-container blog-page">
    <div class="container">
        <div class="row clearfix">
            
            <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
    	        <div class="our-blog">
                    <?php
                 
                    $paged = get_query_var('paged');
                    $args = array(
                        'post_type'         => 'post',
                        'posts_per_page'    =>  3,
                        'orderby'           => 'DESC',
                        'order'             => 'date',
                        'paged'             => $paged,
                    );

                    $posts = new WP_Query($args);

                    if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE
                        $post_count = 1;
                        while( $posts->have_posts() ) : $posts->the_post();

                            $thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
                            $content    = wp_trim_words( get_the_content(), '20', '...' );
                            $month_m    = get_the_date( 'F' );
                            $month_d    = get_the_date( 'j' );
                            $date    	= get_the_date( 'F j, Y' );
                            //Post Views Counts
                            $setPostViews   = setPostViews(get_the_ID());
                            //$month_year = get_the_date( 'M y' );
                            //Cooments Number Count
                            $comments_num = get_comments_number();
                        ?>
                        <?php if ($comments_num == 0) {
                            $comments = __('No Comments');
                            } elseif ($comments_num > 1) {
                                $comments = $comments_num.__(' Comments');
                            } else {
                                $comments = __('1 Comment');
                            }
                        ?>

                        <div class="news-block-three">
                            <div class="inner-box">
                                <div class="image">
                                    <?php if(!empty($thumbnails)): ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <div class="lower-content">
                                    <div class="upper-box">
                                        <div class="post-date"><?php echo $date; ?></div>
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    </div>
                                    <div class="lower-box">
                                        <ul class="post-info">
                                            <li>By :  <?php the_author(); ?></li>
                                            <li>Comments: <?php echo $comments; ?></li>
                                        </ul>
                                        <div class="text"><?php echo $content; ?></div>
                                        <a href="<?php the_permalink(); ?>" class="theme-btn btn-style-three">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                 	<?php $post_count++; endwhile;  wp_reset_postdata(); ?>
                    <?php else : //ECHO POST NOT FOUND ?>
                        <p class="text-center" style="color: red; font-weight: bold;"><?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
                    <?php  endif; ?>
                </div>
                <!-- Pager -->
               	<div class="row">
    	            <div class="col-md-12">
    	                <div class="styled-pagination custom-paginations text-center clearfix">
    	                    <?php 
    	                        if (function_exists("pagination")) {
    	                            pagination($posts->max_num_pages);
    	                        }
    	                    ?>
    	                </div>
    	            </div>
    	        </div>
            </div>

        <!-- ==== Sidebar Starts Here ==== -->
        <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
        	<aside class="sidebar default-sidebar">
                
    			<div id="search" class="sidebar-widget search-box">
                    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="form-group">

                            <input type="search" method="get" value="<?php echo get_search_query(); ?>" name="s" placeholder="Enter Search" required>
                            <button type="submit"><span class="icon fa fa-search"></span></button>
                        </div>
                    </form>
                </div>

                <div class="sidebar-widget popular-tags">
                    <div class="sidebar-title"><h2>Tages</h2></div>
    				<?php
    			    $tags = get_tags();
    			    if ( $tags ) :
    			        foreach ( $tags as $tag ) : ?>

    			            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a>
    			        <?php endforeach; ?>
    			    <?php endif; ?>
                </div>

                <div class="sidebar-widget popular-tags">
                    <div class="sidebar-title"><h2>Share On</h2></div>
                    <div class="sidebar-social">

    				<?php
    				 	$url = urlencode(get_the_permalink());
    				    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    				    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
    				?>
        				<a alt="Whatsapp" href="whatsapp://send" data-text="Text to share" data-href="http://example.com/url-to-share" class="whatsapp wa_btn"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>

        				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" title="Share on Facebook" onclick="javascript:window.open(this.href,
        				  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook" aria-hidden="true"></i></a>

        				<a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" onclick="javascript:window.open(this.href,
        				  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter" aria-hidden="true"></i></a>

        				<a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Share on LinkedIn" onclick="javascript:window.open(this.href,
        				  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

        				<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" title="Share on Pinterest" onclick="javascript:window.open(this.href,
        				  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
            </aside>
        </div>
        <!-- ==== Sidebar Ends Here ==== -->
    </div>
</div>


<?php get_footer(); ?>