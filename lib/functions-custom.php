<?php

// Custom functions (like special queries, etc)

function render_carousel($images) {
  if (!empty($images)) {
    $single = count($images) > 1 ? false : true;
?>
  <div id="carousel-container" class="item-s-12 <?php echo is_front_page() ? 'item-l-9' : ''; ?> grid-row justify-center margin-bottom-basic">
    <?php
      if (!$single && !is_front_page()) {
    ?>
    <div class="slick-arrow-holder grid-item item-m-1 grid-row align-items-center justify-end">
      <div id="slick-prev" class="slick-arrow"></div>
    </div>
    <?php
      }
    ?>
    <div id="slick-carousel" class="grid-item item-s-12 <?php echo !is_front_page() ? 'item-m-10 item-l-8' : ''; ?>">
    <?php
      $image_size = is_front_page() ? 'front-page-carousel' : 'carousel';
      foreach($images as $image_url) {
    ?>
      <div class="slide-content-holder">
        <div class="grid-column align-items-center <?php echo !is_front_page() ? 'justify-center' : ''; ?>">
          <?php
            $image_id = attachment_url_to_postid($image_url);
            echo wp_get_attachment_image($image_id, $image_size, false, array('data-no-lazysizes'=>'true'));
          ?>
        </div>
      </div>
      <?php
      }
    ?>
    </div>
    <?php
      if (!$single && !is_front_page()) {
    ?>
    <div class="slick-arrow-holder grid-item item-m-1 grid-row align-items-center">
      <div id="slick-next" class="slick-arrow"></div>
    </div>
    <?php
      }
    ?>
    <div id="slick-dots-holder" class="grid-item item-m-10 item-l-8 text-align-center margin-top-tiny"></div>
  </div>
<?php
  }
}
