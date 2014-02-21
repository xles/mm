<?php get_header(); ?>
<?php 
$query = ltrim($_SERVER['REQUEST_URI'],'/');
$query = str_replace('-',' ',$query);
$query = str_replace('_',' ',$query);
$s = $query;
$query = htmlentities($query);
?>
<main id="content" role="main">
<header class="header">
<div class="panel callout">
	<p>
		<?php _e('We were unable to locate the page you\'re looking for, sorry for the inconvenience.'); ?>
	</p>
	<p><?php _e('A search for `'.$s.'` has been performed for you automatically:'); ?></p>
</div>
</header>
<div class="entry-content">

<?php
$query = 's='.$query;

$q = new WP_Query($query); ?>

<?php if ( $q->have_posts() ) : ?>

  <?php while ( $q->have_posts() ) : $q->the_post(); ?>
<?php get_template_part( 'entry' ); ?>
  <?php endwhile; ?>

<?php get_template_part( 'nav', 'below' ); ?>

  <?php wp_reset_postdata(); ?>

<?php else:  ?>
  <p>
  	<?php _e( 'Unfortunately, no posts matched the search terms.'); ?>
  	<?php _e('May we suggest you' ); ?>
  	<a href="/archive/"><?php _e('try the archive?'); ?></a>
  </p>
<?php endif; ?>

</div>

</main>

</div>
<div class="large-3 columns sidebar">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
