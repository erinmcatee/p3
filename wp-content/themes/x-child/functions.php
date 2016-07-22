<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );


// Additional Functions
// =============================================================================

function favicons() {
echo '<link rel="apple-touch-icon" sizes="57x57" href="'.get_bloginfo('wpurl').'/apple-touch-icon-57x57.png"/>';
echo '<link rel="apple-touch-icon" sizes="60x60" href="'.get_bloginfo('wpurl').'/apple-touch-icon-60x60.png"/>';
echo '<link rel="apple-touch-icon" sizes="72x72" href="'.get_bloginfo('wpurl').'/apple-touch-icon-72x72.png"/>';
echo '<link rel="apple-touch-icon" sizes="76x76" href="'.get_bloginfo('wpurl').'/apple-touch-icon-76x76.png"/>';
echo '<link rel="apple-touch-icon" sizes="114x114" href="'.get_bloginfo('wpurl').'/apple-touch-icon-114x114.png"/>';
echo '<link rel="apple-touch-icon" sizes="120x120" href="'.get_bloginfo('wpurl').'/apple-touch-icon-120x120.png"/>';
echo '<link rel="apple-touch-icon" sizes="144x144" href="'.get_bloginfo('wpurl').'/apple-touch-icon-144x144.png"/>';
echo '<link rel="apple-touch-icon" sizes="152x152" href="'.get_bloginfo('wpurl').'/apple-touch-icon-152x152.png"/>';
echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo('wpurl').'/apple-touch-icon-180x180.png"/>';
echo '<link rel="icon" type="image/png" href="'.get_bloginfo('wpurl').'/favicon-32x32.png" sizes="32x32"/>';
echo '<link rel="icon" type="image/png" href="'.get_bloginfo('wpurl').'/android-chrome-192x192.png" sizes="192x192"/>';
echo '<link rel="icon" type="image/png" href="'.get_bloginfo('wpurl').'/favicon-96x96.png" sizes="96x96"/>';
echo '<link rel="icon" type="image/png" href="'.get_bloginfo('wpurl').'/favicon-16x16.png" sizes="16x16"/>';
echo '<link rel="manifest" href="'.get_bloginfo('wpurl').'/manifest.json"/>';
echo '<link rel="mask-icon" href="'.get_bloginfo('wpurl').'/safari-pinned-tab.svg" color="#5bbad5"/>';
echo '<meta name="msapplication-TileColor" content="#da532c"/>';
echo '<meta name="msapplication-TileImage" content="'.get_bloginfo('wpurl').'/mstile-144x144.png"/>';
echo '<meta name="theme-color" content="#ffffff"/>';
}
add_action('wp_head', 'favicons');


/* Custom options page in admin */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'P3 Settings',
		'menu_title'	=> 'P3 Settings',
		'menu_slug' 	=> 'p3-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	
}

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments


/*Override Entry Meta styles */
function x_integrity_entry_meta() {

	//
	// Date.
	//
	
	$date = sprintf( '<span><time class="entry-date" datetime="%1$s"><i class="x-icon-calendar" data-x-icon="&#xf073;"></i> %2$s</time></span>',
	  esc_attr( get_the_date( 'c' ) ),
	  esc_html( get_the_date() )
	);
	
	
	//
	// Output.
	//
	
	if ( x_does_not_need_entry_meta() ) {
	  return;
	} else {
	  printf( '<p class="p-meta">%1$s%2$s%3$s%4$s</p>',
	    $author,
	    $date,
	    $categories_list,
	    $comments
	  );
	}
}

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
