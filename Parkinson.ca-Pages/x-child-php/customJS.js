jQuery(document).ready(function($) {

  // mobile drop-down toggle onclick
  $('.top-menu-mobile li:first-child').click(function(event) {
    $(this).toggleClass('active');
    $('.top-menu-list-mobile').toggleClass('active');
  });

  // add ubermenu class to fix search styling but keep functionality
  $('.x-btn-navbar-search').addClass('ubermenu-target');

  // cd mobile custom search
  $('#cd-mobile-search').click(function() {
    console.log('clicked');
    $('.x-searchform-overlay').addClass('in');
  });

  // Hide topbar on scroll down
  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarHeight = $('.x-topbar').outerHeight();

  $(window).scroll(function(event){
    didScroll = true;
  });

  setInterval(function() {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 100);

  function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
      return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
      // Scroll Down
      $('.x-topbar, .x-navbar').removeClass('nav-down').addClass('nav-up');
    } else {
      // Scroll Up
      if(st + $(window).height() < $(document).height()) {
          $('.x-topbar, .x-navbar').removeClass('nav-up').addClass('nav-down');
      }
    }

    lastScrollTop = st;
  }

  // replace placeholder for GWP
  // $('#gmw-address-1').attr('placeholder', 'Enter address or city...');

  // move GWP fields
  $('.single-post').each(function(index, el) {
    $(this).find('.get-directions-link').insertAfter($(this).find('.email'));
    $(this).find('.address-wrapper').insertAfter($(this).find('.email'));
    $(this).find('.get-directions-link a').addClass('x-btn');
  });

  // webinar border wrap
  $('#webinar-column img, #webinar-column .webinar-text-box').wrapAll('<div class="webinar-border-box"></div>');
  
  // french labels for sign-up in footer
  if (window.location.href.search('/fr/') > -1) {
    $('label[for=survey-cons-first-name]').text('Prénom').attr('style', 'font-size: 12px !important');;
    $('label[for=survey-cons-last-name]').text('Nom de famille').attr('style', 'font-size: 12px !important');;
    $('label[for=survey-cons-email]').text('Adresse de courriel').attr('style', 'font-size: 12px !important');;
    $('label[for=survey-cons-zip-code]').text('Code postal').attr('style', 'font-size: 12px !important');;
  }

}); // end doc ready

