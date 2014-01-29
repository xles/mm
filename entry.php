<?php 
if( get_theme_mod( 'post_display_hyphenation' ) ) { 
	$hyphenate = 'hyphenate';
} else {
	$hyphenate = '';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($hyphenate); ?>>
	<header>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
		</a>

		<?php edit_post_link(); ?>

		<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
	</header>

	<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
	<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>
