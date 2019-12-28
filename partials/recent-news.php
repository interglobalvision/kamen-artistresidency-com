<?php
$recent_posts = get_posts(array('posts_per_page' => 4));
if (!empty($recent_posts)) {
?>
<section class="padding-top-small padding-bottom-tiny border-top">
  <div class="container">
    <div class="grid-row">
      <h2 class="grid-item item-s-12 margin-bottom-tiny font-size-large">Recent News & Announcements</h2>
  <?php
    foreach($recent_posts as $recent_post) {
      $hide_date = get_post_meta($recent_post->ID, '_igv_hide_date', true);
  ?>
      <article <?php post_class('grid-item item-s-12 item-m-6 item-l-3 margin-bottom-tiny'); ?> id="post-<?php the_ID(); ?>">
        <a href="<?php echo get_permalink($recent_post->ID); ?>">
          <h3 class="font-size-mid"><?php echo get_the_title($recent_post->ID); ?></h3>
          <date class="font-size-small"><?php echo empty($hide_date) ? get_the_date('j F, Y', $recent_post->ID) : ''; ?></date>
        </a>
      </article>
  <?php
    }
  ?>
    </div>
  </div>
</section>
<?php
}
?>
