/* jshint esversion: 6, browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, document */

// Import dependencies
import lazySizes from 'lazysizes';
import Swiper from 'swiper';
import Masonry from 'masonry-layout';
import Mailchimp from './mailchimp';

// Import style
import '../styl/site.styl';

class Site {
  constructor() {
    this.mobileThreshold = 601;

    $(window).resize(this.onResize.bind(this));

    $(document).ready(this.onReady.bind(this));

    this.setupSwiperInstance = this.setupSwiperInstance.bind(this);

  }

  onResize() {
    this.setSlideHeight();
  }

  onReady() {
    lazySizes.init();

    this.bindMenuToggles();

    this.initSwiper();
    this.initMasonry();
  }

  fixWidows() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  }

  initSwiper() {
    $('.swiper-container').each(this.setupSwiperInstance);
  }

  setupSwiperInstance(index, element) {
    $(element).addClass('swiper-instance-' + index);
    var selector = '.swiper-instance-' + index;

    var swiperInstance = new Swiper (selector, {
      simulateTouch: true,
      slidesPerView: 'auto',
      freeMode: true,
      mousewheel: {
        sensitivity: 1,
        forceToAxis: true,
        invert: true,
      },
      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        hide: false,
        snapOnRelease: false,
      },
    });
  }

  initMasonry() {
    var msnry = new Masonry( '.masonry-grid', {
      itemSelector: '.masonry-item',
      transitionDuration: 0
    });
  }

  bindMenuToggles() {
    $('.menu-toggle, .current_page_item').on('click', function(e) {
      e.preventDefault();
      $('#menu-holder').toggleClass('active');
    });
  }

}

new Site();
new Mailchimp();
