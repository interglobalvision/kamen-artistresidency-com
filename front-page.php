<?php
get_header();
?>

<main id="main-content">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    if (!empty(get_the_post_thumbnail())) {
?>
  <section class="padding-bottom-small">
    <div class="container grid-row">
      <div class="grid-item item-s-12">
        <div id="home-banner" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
      </div>
    </div>
  </section>
<?php
    }

    get_template_part('partials/recent-news');
  }
}
?>


</main>

<?php
get_footer();
?>
