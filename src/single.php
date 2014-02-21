<?php get_header(); ?>
<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
</main>
<footer class="footer">
<?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</div>
<div class="large-3 columns sidebar">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
