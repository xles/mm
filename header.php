<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php wp_title( ' | ', true, 'right' ); ?></title>
  
  <meta name="description" content="Draya's awesome blog thing.">
  
  <meta name="author" content="ZURB, inc. ZURB network also includes zurb.com">
  <meta name="copyright" content="ZURB, inc. Copyright (c) 2013">

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/foundation/5.0.3/css/foundation.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
  <script src="//cdn.jsdelivr.net/foundation/5.0.3/js/vendor/modernizr.js"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="row" id="main">
          <div class="contain-to-grid sticky">
            <nav class="top-bar" data-topbar>
              <ul class="title-area">
                <li class="name">
                  <h1><a href="/">Marti's</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
              </ul>

              <section class="top-bar-section">
                <ul class="left">
                  <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </ul>
                <ul class="right">
                  <?php get_search_form(); ?>
                </ul>
              </section>
            </nav>
          </div>
    <div class="large-9 columns" role="content">
      <div class="row">
        <div class="large-12 columns">
          <header>
			      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'draya' ); ?>" rel="home">
	            <p id="site-title">
	              <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
	            </p>
	            <p id="site-description"><?php bloginfo( 'description' ); ?></p>
            </a>
          </header>

        </div>
      </div>
