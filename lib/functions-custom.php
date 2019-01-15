<?php

// Custom functions (like special queries, etc)

function render_carousel($images) {
  if (!empty($images)) {
    $single = count($images) > 1 ? false : true;
?>
  <div id="carousel-container" class="item-s-12 grid-row justify-center margin-bottom-basic">
    <?php
      if (!$single) {
    ?>
    <div class="slick-arrow-holder grid-item item-m-1 grid-row align-items-center">
      <div id="slick-prev" class="slick-arrow"></div>
    </div>
    <?php
      }
    ?>
    <div id="slick-carousel" class="grid-item item-s-12 item-m-10 item-l-8">
    <?php
      foreach($images as $image_url) {
    ?>
      <div class="slide-content-holder">
        <div class="grid-column justify-center align-items-center">
          <?php
            $image_id = attachment_url_to_postid($image_url);
            echo wp_get_attachment_image($image_id, 'full', false, 'data-no-lazysizes=true');
          ?>
        </div>
      </div>
      <?php
      }
    ?>
    </div>
    <?php
      if (!$single) {
    ?>
    <div class="slick-arrow-holder grid-item item-m-1 grid-row align-items-center">
      <div id="slick-next" class="slick-arrow"></div>
    </div>
    <div id="slick-dots-holder" class="grid-item item-m-10 item-l-8"></div>
    <?php
      }
    ?>
  </div>
<?php
  }
}
