<?php get_header(); ?>
<main id="content" role="main">
<header>

<ul class="breadcrumbs">
  <li><a href="/archive/">Archive</a></li>
  <li class="unavailable"><?php _e( 'Tag', 'draya' ); ?></li>
  <li class="current"><?php single_tag_title(); ?></li>  
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
