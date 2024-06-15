$(document).ready(function () {
	// ------------------------------------------------------------------------------ //
	// Loading
	// ------------------------------------------------------------------------------ //
	$(".loading-container").delay(400).fadeOut();
	$(".animationload").delay(400).fadeOut("fast");
	// ------------------------------------------------------------------------------ //
	// Navigation
	// ------------------------------------------------------------------------------ //

	$(window).scroll(function () {
		if ($(this).scrollTop() > 50) {

			$(".navbar-soft").addClass("fixed-top");
		} else {
			$(".navbar-soft").removeClass("fixed-top");

		}
	});


	/*=============================
		  Card post carousel
	  =============================*/

	$(".card__post-carousel").slick({
		slidesToShow: 1,
		autoplay: true,
		dots: false,
		lazyLoad: "progressive",
		prevArrow:
			"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
		nextArrow:
			"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
	});


	/*=============================
   Top news slider
  =============================*/
	$(".top__news__slider").slick({
		slidesToShow: 4,
		slidesToScroll: 4,
		autoplay: true,
		loop: true,
		dots: false,
		lazyLoad: "progressive",
		prevArrow: false,
		nextArrow: false,
		// mobileFirst: true,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	/*=============================
	  article entry carousel
  =============================*/

	$(".article__entry-carousel").slick({
		slidesToShow: 4,
		autoplay: true,
		dots: false,
		lazyLoad: "progressive",
		prevArrow:
			"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
		nextArrow:
			"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 3,
					infinite: true,
					dots: false,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			}
		]
	});


	/*=============================
	  article entry 3 carousel
  =============================*/
	$(".article__entry-carousel-three").slick({
		slidesToShow: 3,
		autoplay: true,
		dots: false,
		lazyLoad: "progressive",
		prevArrow:
			"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
		nextArrow:
			"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});



	/*=============================
	  post carousel height
  =============================*/
	$(".card__post-carousel-height").slick({
		slidesToShow: 4,
		autoplay: true,
		dots: true,
		lazyLoad: "progressive",
		prevArrow:
			"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
		nextArrow:
			"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});


	/*=============================
		  List article carousel
	  =============================*/

	$(".wrapp__list__article-responsive-carousel").slick({
		slidesToShow: 3,
		slidesToScroll: 3,
		autoplay: true,
		dots: false,
		lazyLoad: "progressive",
		prevArrow: false,
		nextArrow: false,
		// mobileFirst: true,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});


	/*=============================
		  Trending News
	  =============================*/

	$(".trending-news-slider").slick({
		infinite: true,
		arrows: true,
		dots: false,
		autoplay: true,
		autoplaySpeed: 5000,
		prevArrow:
			"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
		nextArrow:
			"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
		responsive: [
			{
				breakpoint: 768,
				settings: {
					dots: false,
					arrows: false
				}
			}
		]
	});



    /*=============================
	    Serach Bar
	=============================*/

	$("li.search > a", this).on("click", function (event) {
		event.preventDefault();
		$(".top-search").slideToggle("4000");
		$(this).find('i').toggleClass('fa-times');
	});



	/*=============================
		  Sidebar sticky
	  =============================*/

	$(".sidebar-sticky").stickySidebar({
		topSpacing: 60,
		bottomSpacing: 60
	});

    /*=============================
   Dropdown footer
=============================*/
	$(".dropdown-footer").on("click", function () {
		$(this)
			.toggleClass("is-active")
			.next(".option-content")
			.stop()
			.slideToggle(500);
	});



	/* =================================
	  SCROLL TO
	  =================================== */
	$('a[href^="#"]').on('click', function (event) {

		var target = $(this.getAttribute('href'));

		if (target.length) {
			event.preventDefault();
			$('html, body').stop().animate({
				scrollTop: target.offset().top
			}, 1000);
		}

	});

	// ------------------------------------------------------------------------------ //
	// Scroll To Top
	// ------------------------------------------------------------------------------ //
	$(window).scroll(function () {
		if ($(this).scrollTop() >= 50) {
			// If page is scrolled more than 50px
			$("#return-to-top").fadeIn(200); // Fade in the arrow
		} else {
			$("#return-to-top").fadeOut(200); // Else fade out the arrow
		}
	});
	$("#return-to-top").click(function () {
		// When arrow is clicked
		$("body,html").animate(
			{
				scrollTop: 0 // Scroll to top of body
			},
			500
		);
	});


});
