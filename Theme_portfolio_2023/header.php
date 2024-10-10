<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dist/styles/main.css" />

    <script>
       iconsPath = '<?php bloginfo('template_url') ?>/dist/';
    </script>
    <script src="<?php bloginfo('template_url') ?>/dist/scripts/main.js" defer></script>
  </head>

  <body>

    <header class="header" data-component="Header">
      <a href="<?php bloginfo('url'); ?>" class="header__brand">
      <?php bloginfo('name'); ?>
      </a>
      <?php wp_nav_menu(array(
                'theme_location' => 'menu_principal',
                'container' => 'nav',
                'container_class' => 'nav-primary',
                'menu_class' => 'nav__primary',
            )); ?>
     <button class="header__toggle js-button">
        <span></span>
        <span></span>
        <span></span>
     </button>
    </header>