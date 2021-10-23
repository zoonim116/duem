<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>
  <body>
  <header>
      <div class="container">
        <div class="mobile-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="row">
          <div class="col-xxl-6 col-sm-4">
            <div class="logo-wrap">
              <a href="<?php echo site_url(); ?>">Duem</a>
            </div>
          </div>
          <div class="col-xxl-6 col-sm-8 d-flex align-items-center justify-content-between right-menu">
            <?php
                wp_nav_menu([
                    'theme_location' => 'top-header-menu',
                    'container'      => 'ul',
                    'menu_class'     => 'menu d-flex ',
                    'fallback_cb'    => 'wp_page_menu',
                    'echo'           => true,
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ]);
            ?>
            <div class="tel-wrap">
              <a href="tel:0987654321">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tel.svg" alt="phone number">
                <?php the_field('phone', 'option'); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
  <div class="overlay"></div>