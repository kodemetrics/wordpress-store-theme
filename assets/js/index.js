(function ($) {
 "use strict";


 $('.mobile-nav-wrapper .menu-o-block .tm-open').on('click', function (e) {
    $('.mobile-menu-wrapper').addClass('active');   console.log("i got here");
 });

 $('.tmx .tm-close').on('click', function (e) {
    $('.mobile-menu-wrapper').removeClass('active');
 });


 $('.sassy-mobile-wrapper span i').on('click', function (e) {
    $(this).toggleClass("fa-bars fa-close");
    $('.sassy-mobile-wrapper span i.fa-close').parent().parent().parent().parent().parent().parent().parent().find('.sassy-mobile-menu').show();
    $('.sassy-mobile-wrapper span i.fa-bars').parent().parent().parent().parent().parent().parent().parent().find('.sassy-mobile-menu').hide();
 });


 /*-------Mobile Menu------- */
//
// $('.responsive').on('click', function (e) {
//        /* $('nav ul.nav-menu').slideToggle();*/
//         var checkElement = $(this).next();
// 		  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
// 		    $(this).closest('li').removeClass('active');
// 		    checkElement.slideUp('normal');
// 		  }
// 		  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
// 		    $('#cssmenu ul ul:visible').slideUp('normal');
// 		    checkElement.slideDown('normal');
// 		  }
//
// });

//.mobile-nav-wrapper .menu-o-block


$('.add_to_cart_button').on('click', function (e) {
   setTimeout(function(){
     window.location.reload(false); //location.reload(false);console.log('how');
   },5000);

});


$('p').each(function() {
  var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0) {
    $this.remove();
  }
});

  // var navmenu = $.('.nav-menu li');
  //   if(navmenu.hasClass("intro")){}


$('.carousel-inner .item:first').addClass('active');
$('.client').owlCarousel({
          margin: 10,
          loop: true,
          nav:true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            1000: {
              items: 1
            }
          }
        });

$('.client .owl-nav .owl-prev').html('<i class="fa fa-angle-left"></i>');
$('.client .owl-nav .owl-next').html('<i class="fa fa-angle-right"></i>');

$('.banner').owlCarousel({
          margin: 10,
          loop: true,
          nav:false,
          autoplay:true,
          autoplayHoverPause:true,
          responsive: {
            0: {  items: 1},
            600: {items: 1},
            1000: {items: 1}
          }
});

 /*--------------------------
 scrollUp
---------------------------- */
  $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

function hiddenMenuBar(){
  var  menuWrap = $('.tm-support');
       menuWrap.find('li a i.tm').each(function () {
      			$(this).on('click', function () {
                $(this).parent().parent().find('.sub-menu').toggleClass('active');
        				$(this).toggleClass('mdi-chevron-up mdi-chevron-down');
        				return false;
      			});
    });


  // var  menuWrap = $('.tm-support');
  //   menuWrap.find('li').each(function () {
  //     			$(this).on('click', function () {
  //               $(this).toggleClass('active');
  //               $(this).children('.sub-menu').find('a').each(function () {
  //                  	// $(this).on('click', function (e) {
  //                   //   e.preventDefault()
  //                   //   var url =  $(this).attr('href');
  //                   //   console.log(url);window.location.href(url);
  //                   //   return false;
  //                   // });
  //
  //               });
  //
  //               //$(this).children('.sub-menu').hide();
  //               $(this).find('.sub-menu').toggleClass('active');
  //       				$(this).find('i.tm').toggleClass('mdi-chevron-up mdi-chevron-down');
  //       				return false;
  //     			});
  //
  //
  //           // $(this).children('a').on('click', function () {
  //           //     $(this).parent().find('.sub-menu').find('a').each(function () {
  //           //         $(this).on('click', function (e) {
  //           //           e.preventDefault()
  //           //           var url =  $(this).attr('href');
  //           //           console.log(url);
  //           //           window.location.href(url);
  //           //           return false;
  //           //         });
  //           //     });
  //           //
  //           //     $(this).parent().find('.sub-menu').toggleClass('active');
  //           //     $(this).find('i.tm').toggleClass('mdi-chevron-up mdi-chevron-down');
  //           //     return false;
  //           // });
  //
  //
  //   });
}
hiddenMenuBar();

// $('input.search-submit ').attr('value','Go');
// $('textarea#comment').attr('placeholder','Message');
// $('input#author').attr('placeholder','Name');
// $('input#email').attr('placeholder','Email');
// $('input#url').attr('placeholder','Website');
// $('img.avatar ').attr('src','http://localhost/person-1.jpg');

//
// (function ($) {
//   "use strict";
//    $('#bulkemail').on('submit',function(event){
//           event.preventDefault();
//           $("#bulk-email").val('SENDING...');
//           var that = $(this),contents = that.serialize();
//           console.log(contents);
//           $.ajax({url: 'http://localhost/blog/wp-json/myplugin/v1/author/',dataType: 'json',type: 'post',data: contents,
//             success:function(data){
//                  if(data){
//                     $("#bulk-email").val('DONE');
//                      console.log(data);
//                  }else{
//                    $("#bulk-email").val('FALIED');
//                  }
//             }
//           });
//      return false;
//    });
//
// });





$('.index-template article:first-child a.index-link').attr("href","https://www.abujaelectricity.com/procurement/");
$('#bulk-email').on('click',function(e){
    e.preventDefault();
    $("#bulk-email").val('SENDING...'); // var that = $(this),contents = that.serialize(); // console.log(contents);

    var ordername = $('#ordername').val();
    var orderemail = $('#orderemail').val();
    var orderphoneno = $('#orderphoneno').val();
    var orderqty = $('#orderqty').val();
    var orderdesc = $('#orderdesc').val();
    var orderproduct = $('#orderproduct').val();
    var contents = {name:ordername,email:orderemail,phoneno:orderphoneno,quanity:orderqty,product:orderproduct,description:orderdesc};

    $.ajax({url:'http://localhost/blog/wp-json/myplugin/v1/author/',dataType: 'json',type: 'post',data: contents,
      success:function(data){
           if(data.status = 200){
              $("#bulk-email").val('DONE');
               console.log(data);
           }else{
             $("#bulk-email").val('FALIED');
           }
      }
    });
});

})(jQuery);
