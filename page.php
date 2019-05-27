<?php
get_header();
?>

<main id="main-content" class="padding-bottom-basic">
  <div class="container">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $images = get_post_meta($post->ID, '_igv_images', true);
    $sections = get_post_meta($post->ID, '_igv_sections', true);
?>

        <article <?php post_class('grid-row'); ?> id="post-<?php the_ID(); ?>">
          <header id="single-header" class="margin-bottom-basic text-align-center grid-item item-s-12 item-m-10 offset-m-1 item-l-8 offset-l-2 item-xl-6 offset-xl-3">
            <h1><?php the_title(); ?></h1>
          </header>
          <?php render_carousel($images); ?>
          <div id="single-content" class="grid-item item-s-12 item-m-10 offset-m-1 item-l-8 offset-l-2 item-xl-6 offset-xl-3">
            <div class="text-columns text-columns-s-1 text-columns-m-2">
              <section>
                <?php the_content(); ?>
              </section>
            <?php
              if (!empty($sections)) {
                foreach($sections as $section) {
            ?>
              <section class="margin-top-small">
                <?php echo !empty($section['content']) ? apply_filters('the_content', $section['content']) : ''; ?>
              </section>
            <?php
                }
              }
            ?>
            </div>
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
