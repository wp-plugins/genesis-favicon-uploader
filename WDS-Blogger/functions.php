<?php
require_once( TEMPLATEPATH.'/core/init.php' );

add_editor_style('editor-styles.css');

if ( ! isset( $content_width ) )
	$content_width = 595;

// post thumbnail sizes registered throught the site.
add_image_size( 'post-thumb', 175, 118, true );
add_image_size( 'archive-post-thumb', 120, 81, true );


if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		  'primary' => 'This is the Primary Navigation below the header.',
	));
}

wds_register_sidebar( array(
	'name'		  =>'Primary Sidebar',
	'description' => __('This is the primary sidebar', 'wds'),
	'id' 		  => 'sidebar',
));
wds_register_sidebar( array(
	'name'		  =>'Footer Left',
	'description' => __('This is the primary sidebar', 'wds'),
	'id' 		  => 'sidebar-fl',
));
wds_register_sidebar( array(
	'name'		  =>'Footer Middle Left',
	'description' => __('This is the primary sidebar', 'wds'),
	'id' 		  => 'sidebar-fml',
));
wds_register_sidebar( array(
	'name'		  =>'Footer Middle Right',
	'description' => __('This is the primary sidebar', 'wds'),
	'id'		  => 'sidebar-fmr',
));
wds_register_sidebar( array(
	'name'		  =>'Footer Right',
	'description' => __('This is the primary sidebar', 'wds'),
	'id' 		  => 'sidebar-fr',
));

function wds_cat_name( $link = true ) {
	foreach( ( get_the_category() ) as $category ) { 
 
    $catID      = $category->cat_ID;
    $cat_name   = $category->cat_name; 
    $cat_slug   = $category->category_nicename; 
    $cat_desc   = $category->category_description; 
    $cat_parent = $category->category_parent;
    $cat_count  = $category->category_count;
    
    if ( $link = true ) : return '<a title="' . $cat_name . '" href="' . get_category_link($catID) . '">' . $cat_name . '</a>';
    else : return $cat_name;
    endif;
    }
    
} 


function wds_byline( $authlink = true ) { ?>

	<div class="byline">
	
		 <?php if ( $authlink = true ) { ?> 
			 By <?php the_author_posts_link() ?> 
		 <?php } ?> 
		 	on <time datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'l, F j, Y' ); ?></time>		 	
		 <?php edit_post_link( '(Edit)' ); ?> 
		 
	</div>
	
<?php }

add_filter( 'the_excerpt', 'add_read_more' );
function add_read_more( $content ) {
	if ( !is_home() ) {
		$string		 = $content;
		$pattern 	 = '</p>$';
		$replacement = '<span class="readmore"><a href="' . get_permalink() . '">read more</a></span></p>';
		$content 	 =  str_replace( $pattern, $replacement, $string );
	}
	return $content;
}


function wds_pagination( $pages = '', $range = 4) {
	$showitems = ( $range * 2 )+1;  
 
	global $paged;
	if( empty( $paged ) ) $paged = 1;
 
	if( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if( !$pages ) {
			$pages = 1;
		}
	}   
 
	if( 1 != $pages ) {
		echo '<div class="pagination">';
		
		if ( $paged > 2 ) echo '<a href="' . get_pagenum_link( 1 ) . '">&#9664;&#9664;</a>';
		if ( $paged > 1 ) echo '<a href="'. get_pagenum_link( $paged - 1 ) . '">&#9664;</a>';
		
		echo '<span>Page ' . $paged . ' of ' . $pages . '</span>';
 
		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
				if ( $paged == $i ) { 
					echo '<span class="current">' . $i . '</span>';
				} else {
					echo '<a href="' . get_pagenum_link( $i ) . '" class="inactive">' . $i . '</a>';
				}
			}
		}
 
		if ($paged < $pages) 	echo '<a href="' . get_pagenum_link( $paged + 1 ) . '">&#9654;</a>';
		if ($paged < $pages-1)  echo '<a href="' . get_pagenum_link( $pages ) . '">&#9654;&#9654;</a>';
		
		echo '</div>';
	}
}

add_filter( 'get_comments_number', 'separate_comment_count', 0 );
function separate_comment_count( $id, $type = "comment" ) {
    global $id;
    $comments_by_type = &separate_comments( get_comments( 'post_id=' . $id ) );
    return count( $comments_by_type[$type] );
    }
?>