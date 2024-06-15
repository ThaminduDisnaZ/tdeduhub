// http://bootstrap-menu.com

$(document).ready(function () {
  /// Prevent closing from click inside dropdown
  $(document).on('click', '.dropdown-menu', function (event) {
    event.stopPropagation();
  });


  // refresh window on resize
  // $(window).on('resize', function () { location.reload(); });


  if ($(window).width() < 992) {
    $('.has-megasubmenu a').click(function () {
      // event.preventDefault();
      $(this).next('.megasubmenu').toggle();

      $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.megasubmenu').hide();
      })
    });

    $('.dropdown-menu a').click(function () {
      // event.preventDefault();
      if ($(this).next('.submenu').length) {
        $(this).next('.submenu').toggle();
      }
      $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.submenu').hide();
      })
    });
  }


  /// offcanvas onmobile
  $("[data-trigger]").on("click", function () {
    // event.preventDefault();
    // event.stopPropagation();
    var offcanvas_id = $(this).attr('data-trigger');
    $(offcanvas_id).toggleClass("show");
    $('body').toggleClass("offcanvas-active");
    $(".screen-overlay").toggleClass("show");
  });

  /// Close menu when pressing ESC
  $(document).on('keydown', function (event) {
    if (event.keyCode === 27) {
      $(".mobile-offcanvas").removeClass("show");
      $("body").removeClass("overlay-active");
    }
  });

  $(".btn-close, .screen-overlay").click(function () {
    $(".screen-overlay").removeClass("show");
    $(".mobile-offcanvas").removeClass("show");
    $("body").removeClass("offcanvas-active");

  });



}); // document ready //end