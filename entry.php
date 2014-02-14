<?php 
if( get_theme_mod( 'post_display_hyphenation' ) ) { 
	$hyphenate = 'hyphenate';
} else {
	$hyphenate = '';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($hyphenate); ?>>
	<header>
		<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
		<h1>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>

	</header>

	<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
	<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>
