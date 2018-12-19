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

<section id="main-container" class="grid-row">

  <header id="header" class="item-s-12 item-m-3 item-l-2">
    <h1 class="u-visuallyhidden"><?php bloginfo('name'); ?></a></h1>
    <a class="logo-holder" href="<?php echo home_url(); ?>">Logo</a>
    <div id="menu-holder">
      <nav id="main-nav">
        <ul>
          <li>
            <a href="<?php echo home_url('residency'); ?>">Residency</a>
          </li>
          <li>
            <a href="<?php echo home_url('apply'); ?>">Apply</a>
          </li>
          <li>
            <a href="<?php echo get_post_type_archive_link('resident'); ?>">Residents</a>
          </li>
          <li>
            <a href="<?php echo get_post_type_archive_link('post'); ?>">Archive</a>
          </li>
          <li>
            <a href="<?php echo home_url('about'); ?>">About</a>
          </li>
        </ul>
      </nav>
      <div id="contact">
        Contact
      </div>
    </div>
  </header>
