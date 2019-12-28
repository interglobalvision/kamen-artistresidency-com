<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
get_template_part('partials/globie');
get_template_part('partials/seo');
?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<?php
$options = get_site_option('_igv_site_options');
?>

<section id="main-container">

  <header id="header" class="padding-top-tiny padding-bottom-tiny border-bottom margin-bottom-small">
    <h1 class="u-visuallyhidden"><?php bloginfo('name'); ?></a></h1>

    <div class="container">
      <div class="grid-row align-items-center justify-between">

        <div id="logo-holder" class="grid-item item-s-6 item-l-2">
          <a href="<?php echo home_url(); ?>"><img id="header-logo" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/kamen-logo.png" /></a>
        </div>

        <nav id="main-nav" class="grid-item item-s-12 item-l-auto flex-grow">
          <?php
            wp_nav_menu( array(
              'menu' => 'main'
            ) );
          ?>
        </nav>

        <div class="grid-item item-s-12 item-l-2 text-align-right">
          <?php
            if (!empty($options['socialmedia_instagram'])) {
          ?>
            <a class="social-link" href="https://instagram.com/<?php echo $options['socialmedia_instagram']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-ig.png" /></a>
          <?php
            }
            if (!empty($options['socialmedia_facebook_url'])) {
          ?>
            <a class="social-link" href="<?php echo $options['socialmedia_facebook_url']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-fb.png" /></a>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </header>
