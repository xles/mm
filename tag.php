<?php get_header(); ?>
<section id="content" role="main">
<header class="header">
<h1 class="entry-title"><?php _e( 'Tag Archives: ', 'draya' ); ?><?php single_tag_title(); ?></h1>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
</div>
<div class="large-3 columns">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
