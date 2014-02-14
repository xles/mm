<?php
/**
 * Template Name: Archives
 */
?>
<?php get_header(); ?>

<?php the_post(); ?>
<ul class="breadcrumbs">
  <li class="current"><?php the_title(); ?></li>
</ul>

<h2>Archives by Month:</h2>
<ul class="no-bullet">
	<?php wp_get_archives('type=monthly'); ?>
</ul>

<h2>Archives by category:</h2>
<ul class="no-bullet">
	 <?php wp_list_categories( array('title_li' => '') ); ?>
</ul>

<h2>Archives by tag:</h2>
<ul class="no-bullet">
<?php
$tags = get_tags( array('orderby' => 'count', 'order' => 'DESC') );
foreach ( (array) $tags as $tag ) {
echo '<li><a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . ' (' . $tag->count . ') </a></li>';
}
?>
</ul>


</div>
<div class="large-3 columns sidebar">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
