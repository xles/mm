<?php 
if( get_theme_mod( 'post_display_hyphenation' ) ) { 
	$hyphenate = 'hyphenate';
} else {
	$hyphenate = '';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($hyphenate); ?>>
	<header class="hide-for-print">
		<?php if ( !is_search() && !is_404() ) get_template_part( 'entry', 'meta' ); ?>
		<h1>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>
	</header>
	<header class="show-for-print">
		<p>
			<span class="left">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</span>
			<span class="right">
				<?php bloginfo( 'description' ); ?>
			</span>
		</p>
		<h1>
			<?php the_title(); ?>
		</h1>
	</header>

	<?php get_template_part( 'entry', ( is_archive() || is_search() || is_404() ? 'summary' : 'content' ) ); ?>
	<?php if ( !is_search() && !is_404() ) get_template_part( 'entry-footer' ); ?>
</article>
