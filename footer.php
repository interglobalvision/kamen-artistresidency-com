<?php
$options = get_site_option('_igv_site_options');
?>

  <footer id="footer" class="padding-top-basic padding-bottom-small">
    <div class="container">
      <div id="footer-row" class="grid-row justify-between align-items-end">
        <div id="footer-logo-holder" class="grid-item item-s-12 item-m-6 item-l-auto margin-bottom-small">
          <a href="<?php echo home_url(); ?>"><img id="footer-logo" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/kamen-logo-white.png" /></a>
        </div>
        <div id="footer-social" class="grid-item item-s-12 item-m-6 item-l-auto margin-bottom-small">
          <?php
            if (!empty($options['socialmedia_facebook_url'])) {
          ?>
            <a class="social-link" href="<?php echo $options['socialmedia_facebook_url']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-fb.png" /></a>
          <?php
            }
            if (!empty($options['socialmedia_instagram'])) {
          ?>
            <a class="social-link" href="https://instagram.com/<?php echo $options['socialmedia_instagram']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/icon-ig.png" /></a>
          <?php
            }
          ?>
        </div>
        <div id="footer-mailinglist" class="grid-item item-s-12 item-m-auto margin-bottom-small">
          <div><span class="font-bold">Mailing List</span></div>
          <form novalidate="true" id="mailchimp-form" class="grid-row">
            <input type="email" name="EMAIL" placeholder="Your email" id="mailchimp-email" class="grid-item no-gutter">
            <button type="submit" id="mailchimp-submit" class="grid-item no-gutter">Submit</button>
          </form>
          <div id="mailchimp-response" class="font-size-small"></div>
        </div>
        <div id="footer-email" class="grid-item item-s-12 item-m-auto margin-bottom-small">
          <div><span class="font-bold">Contact</span></div>
          <?php echo !empty($options['contact_email']) ? '<a href="mailto:' . $options['contact_email'] . '">' . $options['contact_email'] . '</a>' : ''; ?>
        </div>
        <div id="footer-address" class="grid-item item-s-12 item-m-auto margin-bottom-small">
          <?php echo !empty($options['contact_address']) ? apply_filters('the_content', $options['contact_address']) : ''; ?>
        </div>
      </div>
    </div>
  </footer>

</section>

<?php
get_template_part('partials/scripts');
get_template_part('partials/schema-org');
?>

</body>
</html>
