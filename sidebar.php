<div id="sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
	<div id="primary" class="widget-area">
	<?php dynamic_sidebar( 'primary-widget-area' ); ?>
	</div>
	<?php endif; ?>

        <div class="widget-container">
          <p class="widget-title">Follow me</p>
          <p>
            <a class="webicon twitter" href="https://twitter.com/ProfessorFari" title="Twitter">Twitter</a>
            <a class="webicon facebook" href="https://www.facebook.com/TheMarti" title="Facebook">Facebook</a>
            <a class="webicon rss" href="<?php bloginfo('rss2_url'); ?>" title="RSS">RSS</a>
          </p>
        </div>

        <div class="widget-container">
          <p class="widget-title">Contact</p>
          <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact' ) ) ); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/img/logo.png">
          </a>
        </div>
</div>
