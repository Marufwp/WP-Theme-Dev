    <?php
        $thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
        $content    = wp_trim_words( get_the_content(), '15', '..' );
        //$day      = get_the_date();
        //Post Views Counts
        $setPostViews   = setPostViews(get_the_ID());
        $month_year = get_the_date( 'F j, Y' );
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
<div class="col-md-4 wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
    <article class="blog-post">
        <?php if(!empty($thumbnails)): ?>
            <div class="post-img">
                <img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" >
            </div>
        <?php endif; ?>
        <div class="post-content">
            <h2 class="post-title"><?php the_title(); ?></h2>
            <div class="post-meta">
                <?php the_author(); ?> | <?php echo $month_year; ?>
            </div>
            <div class="blog-content">
                <?php echo wpautop($content); ?>
            </div>
            
            <a href="<?php the_permalink(); ?>" class="btn btn-theme mt-2">Read more</a>
        </div>
    </article>
</div>