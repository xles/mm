<?php get_header(); ?>
<main id="content" role="main">
<header>


<ul class="breadcrumbs">
  <li><a href="/archive/">Archive</a></li>

<?php 
$link = '/';
if ( is_year() || is_month() || is_day()) { 
	$link .= get_the_time( 'Y' ).'/';
	if (is_year()) {
		echo '<li class="current">'.get_the_time( 'Y' ).'</li>';
	} else {
		echo '<li><a href="'.$link.'">'.get_the_time( 'Y' ).'</a></li>';
	}
} 
if ( is_month() || is_day()) { 
	$link .= get_the_time( 'm' ).'/';
	if (is_month()) {
		echo '<li class="current">'.get_the_time( 'F' ).'</li>';
	} else {
		echo '<li><a href="'.$link.'">'.get_the_time( 'F' ).'</a></li>';
	}
}
if ( is_day() ) { 
	$link .= get_the_time( 'd' ).'/';
	if (is_day()) {
		echo '<li class="current">'.get_the_time( 'd' ).'</li>';
	} else {
		echo '<li><a href="'.$link.'">'.get_the_time( 'd' ).'</a></li>';
	}
}
?>
</ul>

</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</main>

</div>
<div class="large-3 columns sidebar">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
