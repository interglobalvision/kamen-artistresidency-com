<?php
get_header();
?>

<main id="main-content" class="margin-top-basic item-s-12 item-m-9 offset-m-3 item-l-10 offset-l-2">
  <section id="page">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $images = get_post_meta($post->ID, '_igv_images', true);
    $deadlines = get_post_meta($post->ID, '_igv_apply_deadlines', true);
    $period = get_post_meta($post->ID, '_igv_apply_period', true);
    $submission = get_post_meta($post->ID, '_igv_apply_submission', true);
?>

        <article <?php post_class('grid-row justify-center'); ?> id="post-<?php the_ID(); ?>">
          <?php render_carousel($images); ?>
          <div class="grid-item item-s-12 item-m-10 item-l-8">
            <h1 class="margin-bottom-basic"><?php the_title(); ?></h1>
            <div class="text-columns text-columns-s-1 text-columns-m-2">
              <section id="apply-guidelines">
                <h2>Guidelines</h2>
                <?php the_content(); ?>
              </section>
            <?php
              if (!empty($deadlines)) {
            ?>
              <section id="apply-deadlines" class="margin-top-small">
                <h2>Deadlines</h2>
                <?php echo apply_filters('the_content', $deadlines); ?>
              </section>
            <?php
              }

              if (!empty($period)) {
            ?>
              <section id="apply-period" class="margin-top-small">
                <h2>Residence Period</h2>
                <?php echo apply_filters('the_content', $period); ?>
              </section>
            <?php
              }

              if (!empty($submission)) {
            ?>
              <section id="apply-period" class="margin-top-small">
                <h2>Submission</h2>
                <?php echo apply_filters('the_content', $submission); ?>
              </section>
            <?php
              }
            ?>
            </div>
          </div>
        </article>

<?php
  }
}
?>

  </section>
</main>

<?php
get_footer();
?>
