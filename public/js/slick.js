$(document).ready(function(){
    $('.logo-slider').slick({
      dots: false,
      infinite: true,
      speed: 100,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 6,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });    
});


$(document).ready(function(){
    $('.sliding-announcement').slick({
      dots: true,
      infinite: true,
      speed: 800,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: true,
      variableWidth: true,
       adaptiveHeight: true,
      prevArrow: $('.prev-arrow'),
    nextArrow: $('.next-arrow'),
    appendDots: $('.slick-slider-dots'),
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });    
});


$(document).ready(function(){
    $('.homepage-news-bar').slick({
      dots: false,
      infinite: true,
      speed: 8000,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });    
});






 $('.org-slider-featured-news').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.org-slider-nav'
});
$('.org-slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.org-slider-featured-news',
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
  





// $(document).ready(function(){
//  $('.slider-single').slick({
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   arrows: false,
//   fade: false,
//   adaptiveHeight: true,
//   infinite: false,
//   useTransform: true,
//   speed: 400,
//   cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
//  });
    
// });

// $(document).ready(function(){
    
//  $('.slider-nav')
//   .on('init', function(event, slick) {
//     $('.slider-nav .slick-slide.slick-current').addClass('is-active');
//   })
//   .slick({
//     slidesToShow: 7,
//     slidesToScroll: 7,
//     dots: false,
//     focusOnSelect: false,
//     infinite: false,
//     responsive: [{
//       breakpoint: 1024,
//       settings: {
//         slidesToShow: 5,
//         slidesToScroll: 5,
//       }
//     }, {
//       breakpoint: 640,
//       settings: {
//         slidesToShow: 4,
//         slidesToScroll: 4,
//       }
//     }, {
//       breakpoint: 420,
//       settings: {
//         slidesToShow: 3,
//         slidesToScroll: 3,
//     }
//     }]
//   });

//  $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
//   $('.slider-nav').slick('slickGoTo', currentSlide);
//   var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
//   $('.slider-nav .slick-slide.is-active').removeClass('is-active');
//   $(currrentNavSlideElem).addClass('is-active');
//  });

//  $('.slider-nav').on('click', '.slick-slide', function(event) {
//   event.preventDefault();
//   var goToSingleSlide = $(this).data('slick-index');

//   $('.slider-single').slick('slickGoTo', goToSingleSlide);
//  });
// });



 $(document).ready(function(){
 $('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   fade: true,
   asNavFor: '.slider-nav'
 });
 $('.slider-nav').slick({
   slidesToShow: 5,
   slidesToScroll: 1,
   asNavFor: '.slider-for',
   dots: true,
   focusOnSelect: true,
   responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    }, {
      breakpoint:800,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    }, {
      breakpoint: 420,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
    }
    }]
 });

 $('a[data-slide]').click(function(e) {
   e.preventDefault();
   var slideno = $(this).data('slide');
   $('.slider-nav').slick('slickGoTo', slideno - 1);
 });
});







$(document).ready(function(){
    $('.homepage-events-slick').slick({
      dots: true,
      infinite: true,
      speed: 2000,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: true,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });    
});



$(document).ready(function(){
    $('.newspage-events-slick').slick({
      dots: true,
      infinite: true,
      speed: 2000,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: false,
      autoplaySpeed: 2000,
      arrows: true,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });    
});





$(document).ready(function(){
    $('.homepage-announcement-slick').slick({
      dots: false,
      infinite: true,
      speed: 2000,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: false,
      autoplaySpeed: 2000,
      arrows: true,
      variableWidth: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });    
});




























$(document).ready(function(){
  $(".HPLatestNews").click(function(){
    // $("#div1").fadeIn();
    // $("#div2").fadeIn("slow");
    $("#homepageLatestNewsDiv").fadeIn(3000);
    $("#homepageFeaturedNewsDiv").fadeOut(3000);
  });
});

$(document).ready(function(){
  $(".HPFeaturedNews").click(function(){
    // $("#div1").fadeIn();
    // $("#div2").fadeIn("slow");
    $("#homepageLatestNewsDiv").fadeOut(3000);
    $("#homepageFeaturedNewsDiv").fadeIn(3000);
  });
});