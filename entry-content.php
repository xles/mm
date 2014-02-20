<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content('<span class="radius button right">Read more <i class="fi-arrow-right"></i></span>'); ?>
<div class="entry-links hide-for-print"><?php wp_link_pages(); ?></div>
