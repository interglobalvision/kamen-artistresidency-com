<?php

// Custom functions (like special queries, etc)

function render_carousel($images) {
  if (!empty($images)) {
    $is_single = count($images) > 1 ? false : true;
?>
  <section class="border-top">
    <div class="container">
      <div class="swiper-container">
        <div class="swiper-wrapper <?php echo $is_single ? 'justify-center' : ''; ?> ">
        <?php
          $image_size = is_front_page() ? 'front-page-carousel' : 'carousel';
          foreach($images as $image) {
        ?>
          <figure class="swiper-slide text-align-center grid-column justify-start padding-top-small padding-bottom-small">
            <div class="font-size-zero">
              <?php
                echo wp_get_attachment_image($image['image_id'], $image_size, false, array('data-no-lazysizes'=>'true'));
              ?>
            </div>
            <?php if (!empty($image['caption'])) { ?>
            <figcaption class="font-size-small text-align-center padding-top-micro">
              <?php echo $image['caption']; ?>
            </figcaption>
            <?php } ?>
          </figure>
        <?php
          }
        ?>
        </div>
        <?php if (!$is_single) { ?>
        <div class="padding-bottom-small">
          <div class="swiper-scrollbar"></div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php
  }
}
