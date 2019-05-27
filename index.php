<?php
get_header();
?>

<main id="main-content" class="padding-bottom-basic">
  <div class="container">
    <div class="grid-row">
      <h1 class="margin-bottom-basic text-align-center grid-item item-s-12">News</h1>

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $hide_date = get_post_meta($post->ID, '_igv_hide_date', true);
?>

      <article <?php post_class('grid-item item-s-12 item-m-6 item-l-4 margin-bottom-small'); ?> id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink(); ?>">
          <div><?php echo the_post_thumbnail('archive-thumb'); ?></div>
          <date class="font-size-small"><?php echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : ''; ?></date>
          <h2 class="font-size-mid"><?php the_title(); ?></h2>
        </a>
      </article>

<?php
  }
}
?>

    </div>
  </div>
</main>

<?php
get_footer();
?>
