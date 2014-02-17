<?php

require_once ( get_template_directory() . '/customizer.php' );
require_once ( get_template_directory() . '/comment-hooks.php' );
add_action( 'after_setup_theme', 'draya_setup' );

function draya_setup()
{
	load_theme_textdomain( 'draya', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) 
		$content_width = 640;
	
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'draya' ) )
	);
}

add_action( 'wp_enqueue_scripts', 'draya_load_scripts' );

function draya_load_scripts()
{
	wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'draya_enqueue_comment_reply_script' );

function draya_enqueue_comment_reply_script()
{
	if ( get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
}

add_filter( 'the_title', 'draya_title' );

function draya_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

add_filter( 'wp_title', 'draya_filter_wp_title' );

function draya_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'draya_widgets_init' );

function draya_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'draya' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );
}

function draya_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<?php echo comment_author_link(); ?>
	</li>
	<?php 
}

add_filter( 'get_comments_number', 'draya_comments_number' );

function draya_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 
			'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

add_filter('stylesheet_uri','wpi_stylesheet_uri',10,2);

function wpi_stylesheet_uri($stylesheet_uri, $stylesheet_dir_uri)
{
		//return $stylesheet_dir_uri.'/style.css';
		return $stylesheet_dir_uri.'/css/draya.css';

}
add_filter('next_post_link', 'next_link_attributes');
add_filter('previous_post_link', 'prev_link_attributes');
 
function next_link_attributes($output) {
		$attr = 'class="right small secondary button"';
		return str_replace('<a href=', '<a '.$attr.' href=', $output);
}
function prev_link_attributes($output) {
		$attr = 'class="left small secondary button"';
		return str_replace('<a href=', '<a '.$attr.' href=', $output);
}



function stick_admin_bar_to_bottom_css() {
	echo '
	<style type="text/css">
		body {
			margin-top: -28px;
			padding-bottom: 28px;
		}
		body.admin-bar #wphead {
			padding-top: 0;
		}
		body.admin-bar #footer {
			padding-bottom: 28px;
		}
		#wpadminbar {
			top: auto !important;
			bottom: 0;
		}
		#wpadminbar .quicklinks .menupop ul {
			bottom: 28px;
		}
		#wpadminbar{
			top:auto;
			bottom:0;
		}
		@media screen and (max-width: 600px) {
			#wpadminbar{
				position:fixed;
			}
		}
		#wpadminbar .menupop .ab-sub-wrapper,
		#wpadminbar .shortlink-input {
			bottom:32px;
		}
		@media screen and (max-width: 782px) {
			#wpadminbar .menupop .ab-sub-wrapper,
			#wpadminbar .shortlink-input {
				bottom:46px;
			}
		}
		@media screen and (min-width: 783px) {
			.admin-bar.masthead-fixed .site-header {
				top:0;
			}
		}
	</style>
	';
}

#add_action('admin_head', 'stick_admin_bar_to_bottom_css');
add_action('wp_head', 'stick_admin_bar_to_bottom_css');
