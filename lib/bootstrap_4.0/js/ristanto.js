(function($){
  "use strict";

//efek scroll
$('.page-scroll').on('click', function(){
  var target = $(this).attr('href');
  var elemenTarget = $(target);

  $('html').animate({
    scrollTop : elemenTarget.offset().top -57
  }, 1250, "easeInOutExpo");
});

  $('body').scrollspy({
    target: '#mainNav',
    offset: 71
  });

   $('.page-scroll').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

//parallax effect
  $(window).scroll(function(){
    var wScroll = $(this).scrollTop();

    $('.jumbotron h3').css({
      'transform':'translate(0px, '+wScroll/0.8+'%)'
    });
    $('.jumbotron h1').css({
      'transform':'translate(0px, '+wScroll/2.2+'%)'
    });
    $('.jumbotron h4').css({
      'transform':'translate(0px, '+wScroll/2.5+'%)'
    });
  });

  window.sr = ScrollReveal();
  sr.reveal('.sr-icons', {
    duration: 1000,
    scale: 0.3,
    distance: '0px'
  }, 300);
  sr.reveal('.sr-button', {
    duration: 1000,
    delay: 200
  });
  sr.reveal('.sr-contact', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 300);

  //membuat fungsi navbar collapse
  var navbarCollapse = function(){
    if ($("#mainNav").offset().top>100){
      $("#mainNav").addClass("navbar-shrink");
    }else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };

  //mengaktifkan navbarCollapse saat tidak diatas
  navbarCollapse();

  //jalankan fungsi navbarCollapse saat di scroll
  $(window).scroll(navbarCollapse);

})(jQuery);
