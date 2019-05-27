<?php
get_header();
?>

<main id="main-content" class="padding-bottom-basic">
  <div class="container">
    <div class="grid-row justify-center">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $images = get_post_meta($post->ID, '_igv_images', true);
    $recent_posts = get_posts(array('posts_per_page'   => 2));

    render_carousel($images);
    if (!empty($recent_posts)) {
?>
      <div class="item-s-12 item-l-3 grid-row align-items-start align-content-start">
        <h2 class="grid-item item-s-12 margin-bottom-tiny font-size-large">Recent News</h2>
        <ul id="recent-news-list">
<?php
      foreach($recent_posts as $recent_post) {
        $hide_date = get_post_meta($recent_post->ID, '_igv_hide_date', true);
?>
          <li>
            <article <?php post_class('grid-item item-s-12 item-m-6 item-l-12 margin-bottom-small'); ?> id="post-<?php the_ID(); ?>">
              <a href="<?php echo get_permalink($recent_post->ID); ?>">
                <h3 class="font-size-mid"><?php echo get_the_title($recent_post->ID); ?></h3>
                <date class="font-size-small"><?php echo empty($hide_date) ? get_the_date('j F, Y', $recent_post->ID) : ''; ?></date>
              </a>
            </article>
          </li>
<?php
      }
?>
        </ul>
        <div class="grid-item item-s-12 margin-bottom-small">
          <a href="<?php echo home_url('news'); ?>" class="link-underline">See more...</a>
        </div>
      </div>
<?php
    }
  }
}
?>

    </div>
  </div>

</main>

<?php
get_footer();
?>
