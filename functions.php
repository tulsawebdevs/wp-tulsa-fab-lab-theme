<?php

require_once('functions/custom_gallery.php');

add_action( 'after_setup_theme', 'theme_init' );

function theme_init(){

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'nav-menus' );
	add_theme_support( 'automatic-feed-links' );
	
	//add_image_size( 'post-header', 500, 400, true );
	add_image_size( 'post-excerpt-thumb', 113, 73, true );
	add_image_size( 'post-full-thumb', 620, 250, true );
	add_image_size( 'quote-full-thumb', 290, 190, true );
	
	register_nav_menus(array(
		'primary' => 'Navigation in header',
		'front-right' => 'Menu next to Quotes on front page'
	));
	
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'fablab' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'fablab' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// main theme js functionality file
	wp_register_script( 'theme_func',
	get_bloginfo('template_directory') . '/js/theme.js',
	array( 'jquery' ), '0.3'); //, 'typekit' , 'jquery.fancybox', 'tipsy' 
	
	if(!is_admin()){
		wp_enqueue_script( 'theme_func' );
	}

}

add_action('init', 'register_post_types_theme');

function register_post_types_theme(){

	// quotes post type
	register_post_type('quotes',array(
		'labels' => array(
			'name' => __( 'Quotes' ),
			'singular_name' => __( 'Quote' ),
			'add_new_item' => __('Add New Quote'),
			'edit_item' => __('Edit Quote'),
			'new_item' => __('New Quote'),
			'view_item' => __('View Quotes'),
			'search_items' => __('Search Quotes'),
			'not_found' => __('No quotes found'),
			'not_found_in_trash' => __('No quotes found in Trash')
		),
		'exclude_from_search' => true,
		'public'  => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'query_var' => false,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
	));
	
	add_post_type_support('page',array('thumbnail', 'excerpt'));
}


// Control excerpt length
function theme_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'theme_excerpt_length' );

// Make a nice read more link on excerpts
function theme_excerpt_more( $more ) {
	return '&hellip;&nbsp;<a href="'. get_permalink() . '">' . __('Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'pat_themes') . '</a>';
}

add_filter( 'excerpt_more', 'theme_excerpt_more' );
add_filter( 'the_content_more_link', 'theme_excerpt_more' );

function nice_title(){

	if ( is_single() ) {
		single_post_title(); echo ' | '; bloginfo( 'name' );
	} elseif ( is_home() || is_front_page() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' ); get_page_number();
	} elseif ( is_page() ) {
		single_post_title( '' ); echo ' | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		printf( __( 'Search results for "%s"', 'theme' ), esc_html( $s ) ); get_page_number(); echo ' | '; bloginfo( 'name' );
	} elseif ( is_404() ) {
		_e( 'Not Found', 'theme' ); echo ' | '; bloginfo( 'name' );
	} else {
		wp_title( '' ); echo ' | '; bloginfo( 'name' ); get_page_number();
	}

}

function get_page_number(){
	if ( get_query_var( 'paged' ) )
		return ' | ' . __( 'Page ' , 'theme' ) . get_query_var( 'paged' );
}

// custom comment html
function comment_html( $comment, $args, $depth ) {
	$GLOBALS ['comment'] = $comment; ?>
	<?php if ( '' == $comment->comment_type ) : ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		
		<div class="comment-info">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>', 'notey' ), get_comment_author_link() ); ?>
			</div>
			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'notey' ), get_comment_date(),  get_comment_time() ); ?></a></div>
		</div>
		<div class="comment-body">
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'notey' ); ?></em>
			<br />
			<?php endif; ?>
		<?php comment_text(); ?></div>

		<div class="reply">
			<?php edit_comment_link( __( 'Edit', 'notey' ),'  ','' ); ?> <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php else : ?>
	<li class="post pingback">
		<p><?php _e( 'Pingback: ', 'theme' ); ?><?php comment_author_link(); ?><?php edit_comment_link ( __('edit', 'theme'), '&nbsp;&nbsp;', '' ); delete_comment_link( $comment->comment_ID ) ?></p>
	<?php endif;
}

function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">'.__('Delete', 'theme').'</a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">'.__('Spam', 'theme').'</a>';
  }
}