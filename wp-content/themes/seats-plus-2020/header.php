<!doctype html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo('charset'); ?>">
<title>
  <?php wp_title(''); ?>
  <?php if (wp_title('', false)) echo ' |'; ?> <?php bloginfo('name'); ?></title>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/wp-content/themes/seats-plus-2020/images/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/wp-content/themes/seats-plus-2020/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/wp-content/themes/seats-plus-2020/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/wp-content/themes/seats-plus-2020/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/wp-content/themes/seats-plus-2020/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/wp-content/themes/seats-plus-2020/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/wp-content/themes/seats-plus-2020/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/wp-content/themes/seats-plus-2020/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="/wp-content/themes/seats-plus-2020/images/favicon/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="/wp-content/themes/seats-plus-2020/images/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="/wp-content/themes/seats-plus-2020/images/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="/wp-content/themes/seats-plus-2020/images/favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="/wp-content/themes/seats-plus-2020/images/favicon/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="/wp-content/themes/seats-plus-2020/images/favicon/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="/wp-content/themes/seats-plus-2020/images/favicon/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="/wp-content/themes/seats-plus-2020/images/favicon/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="/wp-content/themes/seats-plus-2020/images/favicon/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="/wp-content/themes/seats-plus-2020/images/favicon/mstile-310x310.png" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="clear">
    <div class="container">
      <div class="row">
        <div class="logo">
          <a href="/" title="<?php bloginfo('name') ?>">
            <?php bloginfo('name') ?>
          </a>
        </div>
        <nav class="nav main" role=" navigation">
          <?php main_nav(); ?>
          <a class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </nav>
        <nav class="nav secondary">
          <?php secondary_nav(); ?>
        </nav>
      </div>
    </div>
  </header>