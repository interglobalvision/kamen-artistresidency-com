<?php
get_header();
?>

<main id="main-content" class="margin-top-basic item-s-12 item-m-9 offset-m-3 item-l-10 offset-l-2">
  <section id="post">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $category = get_the_category();
    $images = get_post_meta($post->ID, '_igv_images', true);
?>

        <article <?php post_class('grid-row justify-center'); ?> id="post-<?php the_ID(); ?>">
          <?php render_carousel($images); ?>
          <div class="grid-item item-s-12 item-m-10 item-l-8">
            <span class="font-sans"><?php echo $category[0]->slug !== 'uncategorized' ? $category[0]->cat_name : ''; ?></span>
            <h1 class="margin-bottom-basic"><?php the_title(); ?></h1>
            <?php the_content(); ?>
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
