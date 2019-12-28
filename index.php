<?php
get_header();
?>

<main id="main-content">
  <header class="padding-bottom-small border-bottom">
    <div class="container">
      <div class="grid-row">
        <h1 class="text-align-center grid-item item-s-12">News & Announcements</h1>
      </div>
    </div>
  </header>

<?php
global $wp_query;

if (have_posts()) {
  $post_count = $wp_query->post_count;
  $max_highlights = 1;

  while (have_posts()) {
    the_post();
    $post_num = $wp_query->current_post + 1;

    if ($post_num === 1) {
?>
  <section>
<?php
    }

    if ($post_num <= $max_highlights) {
?>

    <article class="news-highlight padding-top-small padding-bottom-small border-bottom">
      <div class="container">
        <div class="grid-row">
          <div class="grid-item item-s-12 item-m-6 item-l-5 offset-l-1 font-size-zero">
            <a href="<?php the_permalink(); ?>">
              <?php echo the_post_thumbnail('archive-thumb'); ?>
            </a>
          </div>
          <div class="grid-item item-s-12 item-m-6 item-l-5 padding-top-tiny grid-column justify-between">
            <div>
              <date class="font-size-small"><?php echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : ''; ?></date>
              <h2 class="font-size-mid"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div><?php the_excerpt(); ?></div>
          </div>
        </div>
      </div>
    </article>

<?php
    }

    if ($post_num === $max_highlights && $post_count > $max_highlights) {
?>
  </section>
  <section>
    <div class="container">
      <div class="grid-row">
<?php
    }

    if ($post_num > $max_highlights) {
      $hide_date = get_post_meta($post->ID, '_igv_hide_date', true);
?>

        <article <?php post_class('grid-item item-s-12 item-m-6 item-l-4 padding-top-small margin-bottom-small text-align-center'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink(); ?>">
            <div><?php echo the_post_thumbnail('archive-thumb'); ?></div>
            <date class="font-size-small"><?php echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : ''; ?></date>
            <h2 class="font-size-mid"><?php the_title(); ?></h2>
          </a>
        </article>

<?php
    }

    if ($post_num > $max_highlights && $post_num === $post_count && $post_count > $max_highlights) {
?>
      </div>
    </div>
  </section>
<?php
    }
  }
}
?>

</main>

<?php
get_footer();
?>
