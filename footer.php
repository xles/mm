  </div>
  <footer class="row text-center">
    <div class="large-12 columns">
      <?php 
        echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'draya' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); 
      ?>
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
