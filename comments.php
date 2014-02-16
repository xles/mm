<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<div id="comments">
<?php 
if ( have_comments() ) : 
global $comments_by_type;
$comments_by_type = &separate_comments( $comments );
if ( ! empty( $comments_by_type['comment'] ) ) : 
?>
<div id="comments-list" class="comments">
<h3 class="comments-title"><?php comments_number(); ?></h3>
<?php if ( get_comment_pages_count() > 1 ) : ?>
<nav id="comments-nav-above" class="comments-navigation" role="navigation">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</nav>
<?php endif; ?>
<ul>
<?php wp_list_comments( 'type=comment&callback=comment_callback' ); ?>
</ul>
<?php if ( get_comment_pages_count() > 1 ) : ?>
<nav id="comments-nav-below" class="comments-navigation" role="navigation">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</nav>
<?php endif; ?>
</div>
<?php 
endif; 
if ( ! empty( $comments_by_type['pings'] ) ) : 
$ping_count = count( $comments_by_type['pings'] ); 
?>
<div id="trackbacks-list" class="comments">
<h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'draya' ) : __( 'Trackback', 'draya' ) ); ?></h3>
<ul>
<?php wp_list_comments( 'type=pings&callback=draya_custom_pings' ); ?>
</ul>
</div>
<?php 
endif; 
endif;
if ( comments_open() ) get_template_part( 'comment-form' );


?>
</div>