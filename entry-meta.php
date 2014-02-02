<?php if( get_theme_mod( 'post_display_username' ) ) { ?>
<!--
	<span class="author vcard"><?php the_author_posts_link(); ?></span>
-->
	<?php the_author_posts_link(); ?> | 
<?php } ?> 
<time datetime="<?php the_time("c"); ?>"><?php the_time( get_option( 'date_format' ) ); ?></span>
