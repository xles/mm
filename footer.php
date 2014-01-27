  </div>
  <footer class="row">
    <div class="large-12 columns">
      <hr>
      <div class="row">
        <div class="large-6 columns">
          <?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'draya' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'draya' ), '<a href="http://tidythemes.com/">TidyThemes</a>' ); ?>
        </div>
        <div class="large-6 columns">
          <ul class="inline-list right">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <script src="//cdn.jsdelivr.net/foundation/5.0.3/js/vendor/jquery.js"></script>
  <script src="//cdn.jsdelivr.net/foundation/5.0.3/js/foundation.min.js"></script>
  <script src="//cdn.jsdelivr.net/foundation/5.0.3/js/foundation/foundation.topbar.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/Hyphenator.js"></script>
  <script>
    $(document).foundation();
    Hyphenator.run();
  </script>
</body>
</html>
