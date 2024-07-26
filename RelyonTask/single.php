<?php /*
	
@package RT

*/

get_header(); ?>

<div class="sidebar-page-container blog-page">
    <div class="container">
        <div class="row clearfix">
            <?php
                while( have_posts() ): the_post();

                $thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
                $content    = get_the_content();
                //Post Views Counts
                $setPostViews   = setPostViews(get_the_ID());
                //$month_year = get_the_date( 'M y' );
                //Cooments Number Count
                $comments_num   = get_comments_number();
                $day            = get_the_date();
                $month_year     = get_the_date( 'M y' );
                $post_images    = get_field('post_images');
                $linkedinurl    = get_field('linkdin_url');
                $author_name    = get_field('author_name');

                $designations   = get_field('designations');

            ?>
                <?php if ($comments_num == 0) {
                        $comments = __('No Comments');
                        } elseif ($comments_num > 1) {
                            $comments = $comments_num.__(' Comments');
                        } else {
                            $comments = __('1 Comment');
                    }
                ?>
               
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="blog-single">
                         <div class="news-block-three">
                            <div class="inner-box">
                                <div class="image">
                                    <?php if(!empty($thumbnails)): ?>
                                        <img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" >
                                    <?php endif; ?>
                                </div>
                                <div class="lower-content">
                                    <div class="upper-box">
                                        <div class="post-date"><?php echo $date; ?></div>
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <div class="lower-box">
                                        <ul class="post-info">
                                            <li>By :  <?php the_author(); ?></li>
                                            <li>Comments: <?php echo $comments; ?></li>
                                        </ul>
                                        <div class="text">
                                            <?php echo wpautop($content); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pager -->
                        <ul class="pager">
                            <?php // if need post next previous 
                                $prev_post  = get_previous_post(); 
                                $id         = $prev_post->ID ;
                                $permalink  = get_permalink( $id );
                            ?>
                            <?php 
                                $next_post  = get_next_post();
                                $nid        = $next_post->ID ;
                                $permalink  = get_permalink($nid);
                            ?>

                            <li class="prev"><?php previous_post_link( '%link', __('← New Posts', 'mywebsite' ) ); ?></li>
                            <li class="next"><?php next_post_link( '%link', __( 'Older Posts →', 'mywebsite' ) ); ?></li>
                        </ul>
                        <!-- comments -->
                        
                        <div class="fb-social-comments">
                            <?php echo do_shortcode('[gs-fb-comments]');?>
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
                
            <?php endwhile;  wp_reset_postdata(); ?>
        </div>
    </div>
</div>
    
	
<?php get_footer(); ?>