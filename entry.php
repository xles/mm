<?php 
if( get_theme_mod( 'post_display_hyphenation' ) ) { 
	$hyphenate = 'hyphenate';
} else {
	$hyphenate = '';
}
var_dump( get_theme_mod( 'post_display_hyphenation' ));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($hyphenate); ?>>
<header>
<?php 
if ( is_singular() ) { 
	echo '<h1 class="entry-title">'; 
} else { 
	echo '<h2 class="entry-title">'; 
} ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
<?php the_title(); ?>
</a>
<?php 
if ( is_singular() ) { 
	echo '</h1>'; 
} else { 
	echo '</h2>'; 
} ?> 

<?php edit_post_link(); ?>

<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
</header>

<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>
