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
    $team = get_post_meta($post->ID, '_igv_team', true);
?>

        <article <?php post_class('grid-row'); ?> id="post-<?php the_ID(); ?>">
          <header id="single-header" class="grid-item item-s-12 item-m-10 offset-m-1 item-l-8 offset-l-2 item-xl-6 offset-xl-3">
            <h1 class="margin-bottom-basic text-align-center"><?php the_title(); ?></h1>
            <div class="margin-bottom-basic">
              <?php the_content(); ?>
            </div>
          </header>
          <?php render_carousel($images); ?>
          <div id="single-content" class="grid-item item-s-12 item-m-10 offset-m-1 item-l-8 offset-l-2 item-xl-6 offset-xl-3">
            <div class="text-columns text-columns-s-1 text-columns-m-2">
            <?php
              if (!empty($sections)) {
                foreach($sections as $section) {
            ?>
              <section class="content-section">
                <?php echo !empty($section['content']) ? apply_filters('the_content', $section['content']) : ''; ?>
              </section>
            <?php
                }
              }
            ?>
            </div>
            <?php
              if (!empty($team)) {
            ?>
            <h2 class="margin-bottom-small text-align-center grid-item item-s-12 font-size-large margin-top-small">Team</h2>
            <div class="text-columns text-columns-s-1 text-columns-m-2">
            <?php
                foreach($team as $member) {
            ?>
              <section class="content-section">
                <?php echo !empty($member['member']) ? apply_filters('the_content', $member['member']) : ''; ?>
              </section>
            <?php
                }
            ?>
            </div>
            <?php
              }
            ?>
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
