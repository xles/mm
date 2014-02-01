<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content('<span class="button">read more</span>'); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
