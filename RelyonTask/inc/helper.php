<?php 
	
	//SECTION TITLE
	function sectionTitle_shortcode( $atts, $content=null ){
		extract(shortcode_atts( array(
			'section_title'		=> '',
			'section_subtitle'	=> '',
		), $atts ));
		

		ob_start(); ?>
			<!-- title -->
			<div class="titles">
				<div class="title"><?php echo $section_title; ?></div>
				<div class="subtitle"><?php echo $section_subtitle; ?></div>
			</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'sectionTitle', 'sectionTitle_shortcode' );	

	//ABOUT ELEMENTS
	function aboutlement_shortcode( $atts, $content=null ){
		extract(shortcode_atts( array(

			'about_left'		=> '',
			'about_right'		=> '',
			'about_description'	=> '',
			
			'aboutitem'	 		=> '',
			'abouticon'			=> '',
			'aboutitemtitle'	=> '',
			'aboutitemcontent'	=> '',
			
		), $atts ));
		
		global $redux_opt;

		$social_all_data 	= vc_param_group_parse_atts( $atts['aboutitem'] );

		ob_start(); ?>

		<!-- text -->
		<div class="cols">

			<div class="col">
				<div class="single-post-text">
					<p>
						<?php echo $about_left; ?>
					</p>
				</div>
			</div>
			<div class="col">
				<div class="single-post-text">
					<p>
						<?php echo $about_right; ?>
					</p>
				</div>
			</div>
			<div class="col col-full">
				<div class="single-post-text">
					<p>
						<?php echo $about_description; ?>
					</p>
				</div>
			</div>
		</div>

		<!-- info list -->
		<div class="info-list">
			<ul>
				<?php foreach ( $social_all_data as $social_single_data ) : ?>
				<li><i class="<?php echo $social_single_data['abouticon']; ?>"></i> <strong> <?php echo $social_single_data['aboutitemtitle']; ?></strong> <?php echo $social_single_data['aboutitemcontent']; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="clear"></div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'aboutmeElement', 'aboutlement_shortcode' );
	
	//CUSTOM BUTTON
	function custombtn_shortcode( $atts, $content=null ){
		extract(shortcode_atts( array(
			'btntitle'	=> '',
			'btn_url'	=> '',
		), $atts ));

		$link 		= vc_build_link( $btn_url );
		ob_start(); ?>

		<div class="btn-wrapper">
			<div class="btn-title">
				<h6><?php echo $btntitle; ?></h6>
			</div>
			<div class="view-btn">
				<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" download><i class="fas fa-download"></i>   <?php echo $link['title']; ?></a>
			</div>
		</div>
		<?php return ob_get_clean();
	}
	add_shortcode( 'custombtn', 'custombtn_shortcode' );
	
	// ADDRESS BOX
    function contact_withSocial( $atts, $content=null ){
        extract(shortcode_atts( array(

        'contacttitle'  	=> 'Bhumit Pal',
        'contactsubtitle'  	=> 'Dynamic Game Programmer',
        'contactinfo'	=> '',
        'addressicon'	=> '',
        'addresstitle'	=> '',
        'addressdesc'	=> '',
        'signature'		=> 'Bhumit Pal',

        ), $atts ));
        
        $contact_all_data 	= vc_param_group_parse_atts( $atts['contactinfo'] );
        
        ob_start(); ?>
			
			<!-- contact info -->
			<div class="contact-info">
				<?php if($contacttitle): ?>
		        	<div class="name"><?php echo $contacttitle; ?></div>
		        <?php endif; ?>
		        <?php if($contactsubtitle): ?>
		        	<div class="subname"><?php echo $contactsubtitle; ?></div>
		        <?php endif; ?>
		
				<div class="info-list">
					<ul>
						<?php foreach ( $contact_all_data as $contact_single_data ) : ?>
						<li><i class="<?php echo $contact_single_data['addressicon']; ?>"></i> <strong><?php echo $contact_single_data['addresstitle']; ?></strong> <?php echo $contact_single_data['addressdesc']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php if($signature): ?>
		        	<div class="author"><?php echo $signature; ?></div>
		        <?php endif; ?>
				
			</div>
			
        <?php return ob_get_clean();
    }
    add_shortcode( 'contactwithsocial', 'contact_withSocial' );
    
	// Other Tools & Systems
    function otherToolSystem( $atts, $content=null ){
        extract(shortcode_atts( array(

        'skillinfos'	=> '',

        'percentage'		=> '',
        'toolskill'			=> '',
        'toolsDescriptio'	=> '',

        ), $atts ));
        
        $tools_all_data 	= vc_param_group_parse_atts( $atts['skillinfos'] );
        
        ob_start(); ?>
			
			<div class="skills circles">
				<ul>

					<?php foreach ( $tools_all_data as $tool_single_data ) : ?>
						<li>
							<div class="progress p<?php echo $tool_single_data['percentage']; ?>"> <!-- p90 = 90% circle fill color -->
								<div class="percentage"></div>
								<span><?php echo $tool_single_data['percentage']; ?>%</span>
							</div>
							<div class="name"><?php echo $tool_single_data['toolskill']; ?></div>
							<div class="single-post-text">
								<p>
									<?php echo $tool_single_data['toolsDescriptio']; ?>
								</p>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			
        <?php return ob_get_clean();
    }
    add_shortcode( 'otherToolSystemView', 'otherToolSystem' );

	//PROJECT CUSTOM POST
	function how_many_project_view_show_in_page($atts, $content=null){
		extract(shortcode_atts( array(

			'projects'		=> '6',
			'post_order'	=> 'DESC'

		), $atts ));
		
		
		$paged = get_query_var('paged');
		$args = array(
			'posts_per_page'   => $projects,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'projects',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	   	   => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'pages'            => true,
			'paged' => $paged,
		);
		
		$posts = new WP_Query($args);
		
		ob_start(); ?>

			<div class="service-items">
				<?php
					if ( $posts->have_posts() ) :
						while( $posts->have_posts() ) : $posts->the_post();

						$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
						$content 	=  get_the_content();
						$terms 		= wp_get_post_terms( get_the_ID(), 'project_cat');
						$view_on_github 		= get_field('view_on_github');
						$view_on_github_url 		= get_field('view_on_github_url');
						$upload_video     = get_field('intro_video');
						$video_thumbnail     = get_field('video_thumbnail');
						
					?>

					<div class="service-col per70">
						<div class="service-item">
							<div class="name"><?php the_title(); ?></div>
							<div class="single-post-text">
								<?php echo wpautop($content); ?>
							</div>
							<div class="view-btn">
								<a href="<?php echo $view_on_github_url; ?>" target="_blank"><i class="fab fa-github"></i> <?php echo $view_on_github; ?></a>
							</div>
						</div>
					</div>

					<div class="service-col per30">
						<?php if( $thumbnails): ?>
                            <div class="service-images">
                                <img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                            </div>
                        <?php else: ?>
                            <video poster="<?php echo $video_thumbnail; ?>" id="player" playsinline controls>
                                <source src="<?php echo $upload_video; ?>" type="video/mp4" />
                                <source src="<?php echo $upload_video; ?>" type="video/webm" />

                                <!-- Captions are optional -->
                                <track kind="captions" label="<?php the_title(); ?>" src="/path/to/captions.vtt" srclang="en" default />
                            </video>
                        <?php endif; ?>
					</div>

					<?php endwhile;  wp_reset_postdata(); ?>

					<?php else : //ECHO POST NOT FOUND ?>
	                <p>
	                <?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
	            <?php  endif; ?>
        	</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'project_view', 'how_many_project_view_show_in_page' );
	
    //THE PACKAGES CUSTOM POST 
	function packages_view_show_in_page($atts, $content=null){
		extract( shortcode_atts( array(

			'package'		=> '6',
			'post_order'	=> 'DESC'

		), $atts ));

		$args = array(
			'posts_per_page'   => $package,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'package',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	       => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		
		$posts = new WP_Query($args);
		ob_start(); ?>
		
		<!-- pricing items -->
		<div class="content-carousel">
			<div class="owl-carousel" data-slidesview="2" data-slidesview_mobile="1">
				<?php
				if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE

					$post_count = 1;

					while( $posts->have_posts() ) : $posts->the_post();
						
						$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
						$content 	= wp_trim_words( get_the_content(), '20', '....' );
						
						$price 				= get_field('price_value');
						$package_duration 	= get_field('package_duration');
						$currency 			= get_field('price_currency');
						$order_url 			= get_field('order_now_url');
						$order_bname 		= get_field('order_now_button_name');

					?>
					<div class="item">
						<div class="pricing-item">
							
							<div class="icons">
								<?php if(!empty($thumbnails)): ?>
                                	<img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" >
                                <?php endif; ?>
							</div>
							<div class="name"><?php the_title(); ?></div>
							
							<div class="amount">
								<span class="number">
									<span class="dollar"><?php echo $currency; ?></span>
									<span><?php echo $price; ?></span>
									<span class="period"><?php echo $package_duration; ?></span>
								</span>
							</div>

							<div class="feature-list">
								<ul>
									<?php
										if( have_rows('include_membership_service') ):
	                                    while ( have_rows('include_membership_service') ) : the_row();

	                                    $incld_service = get_sub_field('include_service');
	                                    $notinc_service = get_sub_field('not_include_service');
	                                    $batch = get_sub_field('batch');
	                                ?>

									<?php if ( $incld_service ) : ?>

										<li><?php echo $incld_service; ?> <?php if ( $batch ) : ?><strong><?php echo $batch; ?></strong><?php endif; ?></li>

                                	<?php else: ?>
                                		<li class="disable"><?php echo $notinc_service; ?> <?php if ( $batch ) : ?><strong><?php echo $batch; ?></strong><?php endif; ?></li>
                                		
                                	<?php endif; ?>
									
									<?php endwhile;  ?>

	                                <?php else: ?>
	                                    <h3>Nothing</h3>
	                                <?php endif; ?>
								</ul>
							</div>

							<a href="<?php echo $order_url; ?>" class="btn">
								<span class="animated-button"><span><?php echo $order_bname; ?></span></span>
								<i class="icon fas fa-chevron-right"></i>
							</a>
						</div>
					</div>
				<?php $post_count++; endwhile;  wp_reset_postdata(); ?>

                <?php else : //ECHO POST NOT FOUND ?>
                    <p class="text-center" style="color: red; font-weight: bold;"><?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
                <?php  endif; ?>
			</div>
			<!-- navigation -->
			<div class="navs">
				<span class="prev fas fa-chevron-left"></span>
				<span class="next fas fa-chevron-right"></span>
			</div>
		</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'packages_view', 'packages_view_show_in_page' );

	//THE EXPERIENCE CUSTOM POST 
	function how_many_experiences_view_show_in_page($atts, $content=null){

		extract( shortcode_atts( array(

			'experience'	=> '',
			'post_order'	=> 'DESC'

		), $atts ));

		$args = array(
			'posts_per_page'   => $experience,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'experience',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	       => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		
		$posts = new WP_Query($args);
		ob_start(); ?>

			<!-- resume items -->
			<div class="content-carousel">
				<div class="owl-carousel" data-slidesview="2" data-slidesview_mobile="1">

				<?php
					if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE

						$post_count = 1;

						while( $posts->have_posts() ) : $posts->the_post();
							$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
							$content 	= get_the_content();
							$workdur	= get_field('working-duration');

					?>


					<div class="item">
						<div class="resume-item active">
							<div class="date"><?php echo $workdur; ?></div>
							<div class="name"><?php the_title(); ?></div>
							<div class="single-post-text">
								<p>
									<?php echo $content; ?>
								</p>
							</div>
						</div>
					</div>

				<?php $post_count++; endwhile;  wp_reset_postdata(); ?>

	            <?php else : //ECHO POST NOT FOUND ?>
	                <p class="text-center" style="color: red; font-weight: bold;"><?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
	            <?php  endif; ?>
					
			</div>

			<!-- navigation -->
			<div class="navs">
				<span class="prev fas fa-chevron-left"></span>
				<span class="next fas fa-chevron-right"></span>
			</div>
		</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'experiences', 'how_many_experiences_view_show_in_page' );
	
	//THE EDUCATIONS CUSTOM POST 
	function how_many_educations_view_show_in_page($atts, $content=null){

		extract( shortcode_atts( array(

			'education'	=> '',
			'post_order'=> 'DESC'

		), $atts ));

		$args = array(
			'posts_per_page'   => $education,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'education',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	       => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		
		$posts = new WP_Query($args);
		ob_start(); ?>

			<!-- Educations items -->
			<div class="content-carousel">
				<div class="owl-carousel" data-slidesview="2" data-slidesview_mobile="1">
				<?php
					if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE

						$post_count = 1;

						while( $posts->have_posts() ) : $posts->the_post();
						
						$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
						$content 	= get_the_content();
						
						$eduses		= get_field('education_diurtation');
						$institute	= get_field('institute_name');

					?>


					<div class="item">
						<div class="resume-item active">
							<div class="date"><?php echo $eduses; ?></div>
							<div class="name"><?php the_title(); ?> <br /> <span><?php echo $institute; ?></span></div>
							<div class="single-post-text">
								<?php echo wpautop($content); ?>
							</div>
						</div>
					</div>

				<?php $post_count++; endwhile;  wp_reset_postdata(); ?>

	            <?php else : //ECHO POST NOT FOUND ?>
	                <p class="text-center" style="color: red; font-weight: bold;"><?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
	            <?php  endif; ?>
					
			</div>

			<!-- navigation -->
			<div class="navs">
				<span class="prev fas fa-chevron-left"></span>
				<span class="next fas fa-chevron-right"></span>
			</div>
		</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'educations', 'how_many_educations_view_show_in_page' );

	//THE SKILL CUSTOM POST
	function how_many_skill_view_show_in_page($atts, $content=null){
		extract( shortcode_atts( array(

			'skills' 		=> '',
			'post_order'	=> 'DESC'

		), $atts ));

		$args = array(
			'posts_per_page'   => $skills,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'skills',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	       => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		
		$posts = new WP_Query($args);
		ob_start(); ?>

			<!-- skills items -->
			<div class="skills percent">
				<ul>
						
					<?php
					if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE

						$post_count = 1;

						while( $posts->have_posts() ) : $posts->the_post();
						$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
						
						$content 		= get_the_content();
						$skills_lavel	= get_field('skills_lavel');

					?>
					<li>
						<div class="name"><?php the_title(); ?></div>
						<div class="single-post-text">
							<?php echo wpautop($content); ?>
						</div>
						<div class="progress">
							<div class="percentage" style="width: <?php echo $skills_lavel; ?>;">
								<span class="percent"><?php echo $skills_lavel; ?></span>
							</div>
						</div>
					</li>
					<?php $post_count++; endwhile;  wp_reset_postdata(); ?>

	                <?php else : //ECHO POST NOT FOUND ?>
	                    <p class="text-center" style="color: red; font-weight: bold;"><?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
	                <?php  endif; ?>
	            </ul>
			</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'skill_view', 'how_many_skill_view_show_in_page' );

	//PORTFOLIO CUSTOM POST
	function how_many_portfolio_view_show_in_page($atts, $content=null){
		extract(shortcode_atts( array(

			'portfolios'	=> '6',
			'post_order'	=> 'DESC'

		), $atts ));
		
		
		$paged = get_query_var('paged');
		$args = array(
			'posts_per_page'   => $portfolios,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'portfolios',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	   	   => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'pages'            => true,
			'paged' => $paged,
		);
		
		$posts = new WP_Query($args);
		
		ob_start(); ?>

			<!-- filter -->
			<div class="filter-menu">
				<div class="filters">
					<div class="btn-group">
						<label data-text="All" class="glitch-effect">
							<input type="radio" name="fl_radio" value=".box-col" />All
						</label>
					</div>

						<?php 
							$topics = get_terms( array(
								'hide_empty' 	=> 0,
								'taxonomy' 		=> 'portfolio_cat',
								'orderby' 		=> 'id',
							));     
					 
							foreach($topics as $topic){
								$link = get_term_link( $topic, 'portfolio_cat' );
								$performperform = $topic->name;
								$performname = $topic->slug;

								echo '<div class="btn-group">
									<label data-text=".'.$performname.'">
										<input type="radio" name="fl_radio" value=".f-.'.$performname.'" />'.$performperform.'
									</label>
								</div>';
							}
						?>
					
				</div>
            </div>

			<!-- portfolio items -->
			<div class="box-items">	
			<?php
				if ( $posts->have_posts() ) :
					
					$post_count = 1;

					while( $posts->have_posts() ) : $posts->the_post();

					$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
					$content 	= wp_trim_words( get_the_content(), '3', '.' );
					$contentfull = get_the_content();
					$terms 		= wp_get_post_terms( get_the_ID(), 'portfolio_cat');
					$live_pro_url	= get_field('live_project_url');
					

					?>

					<div class="box-col f-<?php foreach( $terms as $term ){
						$performperform = $term->slug; echo ' '.$performperform; } ?>">
						<div class="box-item">
							
							<div class="image">
								<a href="#popup-<?php echo $post_count; ?>" class="has-popup-media">
									<img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
									<span class="info">
										<span class="centrize full-width">
											<span class="vertical-center">
												<i class="icon fas fa-plus"></i>
											</span>
										</span>
									</span>
								</a>
							</div>

							<div class="desc">
								<div class="category"><?php the_title(); ?></div>
								<a href="#popup-<?php echo $post_count; ?>" class="name has-popup-media"><?php echo $content; ?></a>
							</div>

							<!-- POP UP CONTENT -->
							<div id="popup-<?php echo $post_count; ?>" class="popup-box mfp-fade mfp-hide">
								<div class="content">
									<div class="image">
										<img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
									</div>
									<div class="desc">
										<h4><?php the_title(); ?></h4>
										<?php echo wpautop($contentfull); ?>
										<a href="<?php echo $live_pro_url; ?>" class="btn">
											<span class="animated-button"><span>View Project</span></span>
											<i class="icon fas fa-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>
							<!-- POP UP CONTENT END -->
						</div>
					</div>

					<?php $post_count++; endwhile;  wp_reset_postdata(); ?>

					<?php else : //ECHO POST NOT FOUND ?>
	                <p>
	                <?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
	            <?php  endif; ?>
        	</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'portfolio_view', 'how_many_portfolio_view_show_in_page' );

	//THE TESTIMONIAL CUSTOM POST 
	function how_many_testimonial_view_show_in_page($atts, $content=null){

		extract( shortcode_atts( array(

			'testimonial'	=>'',
			'post_order'	=>'DESC'

		), $atts ));

		$args = array(
			'posts_per_page'   => $testimonial,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'testimonial',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	       => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		
		$posts = new WP_Query($args);
		ob_start(); ?>

			<!-- testimonials items -->
			<div class="content-carousel">
				<div class="owl-carousel" data-slidesView="2" data-slidesview_mobile="1">

					<?php
					if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE

						while( $posts->have_posts() ) : $posts->the_post();
						$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
						$content = wp_trim_words( get_the_content(), '1080', '....' );

						$author_profession	= get_field('reviewer_degination');

						?>


						<div class="item">
							<div class="reviews-item">
								<?php if($thumbnails): ?>
								<div class="image">
									<img src="<?php echo $thumbnails[0]; ?>" class="img-responsive" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
								</div>
								<?php endif; ?>
								<div class="info">
									<div class="name"><?php the_title(); ?></div>
									<div class="company"><?php echo $author_profession; ?></div>
								</div>
								<div class="text">
									<?php echo wpautop($content); ?>
								</div>
							</div>
						</div>
					<?php endwhile;  wp_reset_postdata(); ?>

                    <?php else : //ECHO POST NOT FOUND ?>
                        <p class="text-center" style="color: red; font-weight: bold;"><?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
                    <?php  endif; ?>
				</div>
				<!-- navigation -->
				<div class="navs">
					<span class="prev fas fa-chevron-left"></span>
					<span class="next fas fa-chevron-right"></span>
				</div>
			</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'testimonial', 'how_many_testimonial_view_show_in_page' );

	// PIT PARTNER SLIDER
	function partnerCurowsel_shortcode( $atts, $content=null ){
	    extract(shortcode_atts( array(

	        'partnerlogo'    => '',

	    ), $atts ));
	    

	    $image_ids     = explode( ',', $partnerlogo );

	    ob_start(); ?>

			<div class="content-carousel">
				<div class="owl-carousel" data-slidesview="4" data-slidesview_mobile="2">
		           	<?php foreach ($image_ids as $image_id ):
		            	$images = wp_get_attachment_image_src($image_id, 'full');
		        	?>
					<div class="item">
						<div class="clients-item">
							<a target="_blank" href="#">
								<img src="<?php echo $images[0]; ?>" alt="">
							</a>
						</div>
					</div>

		           <?php $images++; endforeach; ?>
				</div>

				<!-- navigation -->
				<div class="navs">
					<span class="prev fas fa-chevron-left"></span>
					<span class="next fas fa-chevron-right"></span>
				</div>

			</div>
	    <?php return ob_get_clean();
	}
	add_shortcode( 'partnerCurowsel', 'partnerCurowsel_shortcode' );

	//THE WORDPRESS POST 
	function how_many_post_view_show_in_page($atts, $content=null){

		extract( shortcode_atts( array(

			'post'				=> '',
			'post_order'		=> 'DESC'

		), $atts ));

		$paged = get_query_var('paged');

		$args = array(
			'posts_per_page'   => $post,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => $post_order,
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	       => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'paged' => $paged,
		);
		
		$posts = new WP_Query($args);
		ob_start(); ?>

			<div class="row">
				<?php
					if ( $posts->have_posts() ) : //IF SERVICES POST AVAILABLE
						$post_count = 1;
						while( $posts->have_posts() ) : $posts->the_post(); ?>
						

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

						<?php $post_count++; endwhile;  wp_reset_postdata(); ?>

		                <?php else : //ECHO POST NOT FOUND ?>
		                    <p class="text-center" style="color: red; font-weight: bold;"><?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
		               	<?php  endif; ?>
				</div>

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
		<?php return ob_get_clean();
	}
	add_shortcode( 'blogpost', 'how_many_post_view_show_in_page' );

	//FUN FACTS ELEMENTS
	function funfact_shortcode( $atts, $content=null ){
		extract(shortcode_atts( array(
			'factimages'	=> '',
			'facticon'		=> '',
			'factnumber'	=> '',
			'facttitle'		=> '',
		), $atts ));
		

		$image_ids 	= explode( ',', $factimages );

		ob_start(); ?>

		<div class="text-center wow zoomIn" data-wow-duration="1s" data-wow-delay=".1s">
			<?php if($factimages): ?>
				<div class="fun-fact-icon">
					<?php foreach ($image_ids as $image_id ):
						$images = wp_get_attachment_image_src($image_id, 'full');
					?>
	           			<img src="<?php echo $images[0]; ?>" alt="">
	           		<?php endforeach; ?>
	           	</div>
			<?php else: ?>
				<div class="fun-fact-icon">
					<span class="fa <?php echo $facticon; ?>"></span>
				</div>
			<?php endif; ?>
			
			<h4 class="fun-fact-count" data-from="0" data-to="<?php echo $factnumber; ?>" data-speed="2000"><?php echo $factnumber; ?></h4>
			<p class="fun-fact-title"><?php echo $facttitle; ?></p>
		</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'funfact', 'funfact_shortcode' );

