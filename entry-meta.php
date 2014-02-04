<p class="right">
<?php if( get_theme_mod( 'post_display_username' ) ) { ?>
	<i class="fi-torso"></i> 
	<?php the_author_posts_link(); ?> &laquo; 
<?php } ?> 
<time datetime="<?php the_time("c"); ?>">
	<i class="fi-clock"></i>
	<?php the_time( get_option( 'date_format' ) ); ?>
	<?php the_time(); ?>
</time>
</p>
