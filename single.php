<?php
get_header();
?>

<main id="main-content" class="padding-bottom-basic">
  <div class="container">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $category = get_the_category();
    $images = get_post_meta($post->ID, '_igv_images', true);
    $residency = get_post_meta($post->ID, '_igv_residency', true);
    $hide_date = get_post_meta($post->ID, '_igv_hide_date', true);
?>

        <article <?php post_class('grid-row'); ?> id="post-<?php the_ID(); ?>">
          <header id="single-header" class="grid-item item-s-12 item-m-6 offset-m-3 item-l-6">
            <div class="text-align-center margin-bottom-basic">
              <span class="font-size-small font-uppercase"><?php
                if (is_singular('resident')) {
                  echo 'Resident';
                } else if ($category[0]->slug !== 'uncategorized') {
                  echo $category[0]->cat_name;
                }
              ?></span>
              <h1 class="text-align-center margin-bottom-micro"><?php the_title(); ?></h1>
              <date class=""><?php
                if (is_singular('resident')) {
                  echo !empty($residency) ? $residency : '';
                } else {
                  echo empty($hide_date) ? get_the_date('j F, Y', $post->ID) : '';
                }
              ?></date>
            </div>
          </header>
          <?php render_carousel($images); ?>
          <div id="single-content" class="grid-item item-s-12 item-m-6 offset-m-3 item-l-6 margin-bottom-basic">
            <?php the_content(); ?>
          </div>
        </article>

<?php
  }
}
?>

  </div>
</main>

<?php
get_footer();
?>
