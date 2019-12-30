<?php
$recent_args = array(
  'posts_per_page' => 4,
);

$recent_query = new WP_Query($recent_args);

if ($recent_query->have_posts()) {
?>
<section class="padding-top-small border-top">
  <div class="container">
    <div class="grid-row">
      <h2 class="grid-item item-s-12 margin-bottom-tiny font-size-mid font-bold">Recent News & Announcements</h2>
    </div>
    <div class="swiper-container padding-bottom-small">
      <div class="swiper-wrapper">
      <?php
        while ($recent_query->have_posts()) {
          $recent_query->the_post();
          $hide_date = get_post_meta($post->ID, '_igv_hide_date', true);
      ?>
        <article <?php post_class('swiper-slide text-align-center padding-bottom-small'); ?> id="post-<?php the_ID(); ?>">
          <div>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('archive-thumb'); ?>
            </a>
          </div>
          <div>
            <date class="font-size-micro"><?php echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : ''; ?></date>
            <a href="<?php the_permalink(); ?>">
              <h3 class="font-size-basic font-bold"><?php echo the_title(); ?></h3>
            </a>
          </div>
        </article>
      <?php
        }
      ?>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
</section>
<?php
}
wp_reset_postdata();
?>
