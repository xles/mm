<?php get_header(); ?>
<main id="content" role="main">
<header>
<ul class="breadcrumbs">
  <li class="unavailable"><?php _e( 'Search', 'draya' ); ?></li>
  <li class="current"><?php echo get_search_query(); ?></li>  
</ul>
</header>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
<?php else : ?>

  <p>
  	<?php _e( 'Unfortunately, no posts matched the search terms.'); ?>
  	<?php _e('May we suggest you' ); ?>
  	<a href="/archive/"><?php _e('try the archive?'); ?></a>
  </p>

<?php endif; ?>
</main>
</div>
<div class="large-3 columns sidebar">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
