<?php
/*
| ===================================================
| RM FUNCTIONS SHEET V1.3
| ===================================================
*/

/*
|====================================================
| MAKES ADVANCED CUSTOM FIELDS OPTIONS PAGE
|====================================================
*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/*
|====================================================
| CUSTOM PAGINATION SUPPORT
|====================================================
*/

function rufus_pagination($pages = '', $range = 2)
{  
  $showitems = ($range * 1)+1;  
  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == '')
  {
	global $wp_query;
	$pages = $wp_query->max_num_pages;
	if(!$pages)
	{
		$pages = 1;
	}
  }   

  if(1 != $pages)
  {
	echo "<div class='pagination'>";
	if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
	if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
	for ($i=1; $i <= $pages; $i++)
	{
	  if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	  {
		echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
	  }
	}
	if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
	echo "</div>\n";
  }
}

/*
|====================================================
| CHANGE EXCERPT LENGTH
|====================================================
*/

function custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
       global $post;
	return '<br><a class="readmore-link" href="'. get_permalink($post->ID) . '">View Post &rarr;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
/*
|====================================================
| WIDGETIZED SIDEBAR SUPPORT
|====================================================
*/
if (function_exists('register_sidebar')) {

	register_sidebar(array('name'=>'footer-left',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array('name'=>'footer-right',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

/*
|====================================================
| ADDS SUPPORT FOR WORDPRESS CUSTOM MENUS
| ===================================================
*/

function register_my_menus() {
	register_nav_menus(
		array('header-menu' => __( 'Header Menu' ))
	);
}
add_action( 'init', 'register_my_menus' );

/*
|====================================================
| REMOVE UNNEEDED CALLS TO WP-HEAD
| ===================================================
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/*
|====================================================
| REMOVE DEFAULT DASHBOARD WIDGETS
|====================================================
*/
function disable_default_dashboard_widgets() {

	//COMMENT AND UN-COMMENT AS NEEDED TO CUSTOMIZE.
	//remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

/*
|====================================================
| CUSTOM COMMENT CALLBACK
|====================================================
*/
function rm_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-meta">
			<?php printf(__('%s'), get_comment_date()) ?><?php edit_comment_link(__('Edit Comment'),'  <span class="post-edit-link">','</span>') ?>
		</div><!-- end .comment-meta -->
		<div class="comment-author vcard">
			<?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?>
			<?php echo(__('<p><strong>'.get_comment_author().':</strong></p>')) ?>
		</div><!-- end .comment-author.vcard -->
		<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
		<?php endif; ?>

		<?php comment_text() ?>

		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' =>'Reply to this comment'))) ?>
		</div><!-- end .reply -->
	</div><!-- end #comment -->
<?php
}

/*
|====================================================
| ADD POST THUMBNAIL SUPPORT TO THEME
|====================================================
*/
// ENABLE THIS AS NEEDED
add_theme_support( 'post-thumbnails' );

/*
|====================================================
| lOAD CUSTOM JAVASCRIPT FILE
|====================================================
*/
function rm_ready_scripts() {
	wp_enqueue_script(
		'rm_javascript',
		get_template_directory_uri() . '/js/scripts.js',
		array('jquery'),
		'1.0',
		true
	);
}
add_action('wp_enqueue_scripts', 'rm_ready_scripts');

/*
|====================================================
| CUSTOMIZE THE ADMIN FOOTER AREA
|====================================================
*/
function custom_admin_footer() {
	echo 'Website design by <a href="http://rufusmedia.com/">Rufusmedia</a> &copy; '.date("Y").'. For site support please <a href="http://rufusmedia.com/contact">contact us</a>.';
}
add_filter('admin_footer_text', 'custom_admin_footer');
