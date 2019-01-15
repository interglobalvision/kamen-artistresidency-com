<?php
get_header();
?>

<main id="main-content" class="margin-top-basic item-s-12 item-m-9 offset-m-3 item-l-10 offset-l-2">
  <section id="posts">
    <div class="grid-row">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $category = get_the_category();
?>

        <article <?php post_class('grid-item item-s-12 item-m-6 item-l-4 margin-bottom-basic'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('full'); ?>
            <?php echo $category[0]->slug !== 'uncategorized' ? $category[0]->cat_name : ''; ?>
            <h2><?php the_title(); ?></h2>
          </a>
        </article>

<?php
  }
}
?>

    </div>
  </section>
</main>

<?php
get_footer();
?>
