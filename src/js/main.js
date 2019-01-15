/* jshint esversion: 6, browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, document */

// Import dependencies
import lazySizes from 'lazysizes';
import slick from 'slick-carousel';

// Import style
import '../styl/site.styl';

class Site {
  constructor() {
    this.mobileThreshold = 601;

    $(window).resize(this.onResize.bind(this));

    $(document).ready(this.onReady.bind(this));

  }

  onResize() {
    this.setSlideHeight();
  }

  onReady() {
    lazySizes.init();

    this.bindMenuToggles();

    this.$slickCarousel = $('#slick-carousel');

    this.initCarousel();
  }

  fixWidows() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  }

  initCarousel() {
    if (this.$slickCarousel.length) {
      this.$slickCarousel.slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: false,
        variableWidth: false,
        dots: true,
        arrows: true,
        prevArrow: '#slick-prev',
        nextArrow: '#slick-next',
        focusOnSelect: false,
        appendDots: '#slick-dots-holder',
        rows: 0
      });

      this.setSlideHeight();
    }
  }

  setSlideHeight() {
    if ($('.slick-slide').length) {
      $('.slick-slide').height($('.slick-list').height());
    }
  }

  bindMenuToggles() {
    $('.menu-toggle, .current_page_item').on('click', function(e) {
      e.preventDefault();
      $('#menu-holder').toggleClass('active');
    });
  }

}

new Site();
