(function ($) {
  "use strict";
  $(document).on("ready", function () {
    /*==============================================================================
		  Header Sticky JS
	  ===============================================================================*/
    var activeSticky = $("#active-sticky"),
      winDow = $(window);
    winDow.on("scroll", function () {
      var scroll = $(window).scrollTop(),
        isSticky = activeSticky;
      if (scroll < 150) {
        isSticky.removeClass("is-sticky");
      } else {
        isSticky.addClass("is-sticky");
      }
    });

    /*==============================================================================
		 	Mobile Menu JS
	  ===============================================================================*/
    var $offcanvasNav = $("#offcanvas-menu a");
    $offcanvasNav.on("click", function () {
      var link = $(this);
      var closestUl = link.closest("ul");
      var activeLinks = closestUl.find(".active");
      var closestLi = link.closest("li");
      var linkStatus = closestLi.hasClass("active");
      var count = 0;

      closestUl.find("ul").slideUp(function () {
        if (++count == closestUl.find("ul").length)
          activeLinks.removeClass("active");
      });
      if (!linkStatus) {
        closestLi.children("ul").slideDown();
        closestLi.addClass("active");
      }
    });

    /*==============================================================================
			CounterUp JS
		================================================================================*/
    $(".counter").counterUp({
      time: 1500,
    });

    /*=============================================================================
			Select2 JS
  	===============================================================================*/
    $(document).ready(function () {
      $(".select2").select2();
    });

    /*==============================================================================
		  Wow JS
	  ================================================================================*/
    var window_width = $(window).width();
    if (window_width > 767) {
      new WOW().init();
    }

    /*=============================================================================
      Video Popup JS
    ===============================================================================*/
    $(".popup-video").magnificPopup({
      type: "iframe",
    });

    /*=============================================================================
      Active InActive Toggle JS
    ===============================================================================*/
    $(".sidebar-trigger").click(function () {
      $(".user-d-row, .user-d-sidebar, .user-d-content").toggleClass(
        "inactive"
      );
    });


    // Filter Bar
    function toggleFilterBar() {
        if ($(".biodata-sidebar").hasClass("filter-open")) {
            // Filter is open, so close it
            $(".biodata-sidebar").removeClass("filter-open");
            // Re-enable body scrolling
            $("body").css("overflow", "auto");
            // Remove overlay if it exists
            $(".filter-overlay").remove();
        } else {
            // Filter is closed, so open it
            $(".biodata-sidebar").addClass("filter-open");
            // Disable body scrolling and add overlay
            $("body").css("overflow", "hidden");
            $("body").append('<div class="filter-overlay"></div>');
        }
    }

    // Click event for the filter open button
    $(".filter-open-btn").click(toggleFilterBar);

    // Click event for the close button
    $(".close-btn").click(toggleFilterBar);

    /*==============================================================================
		  About Us Image Slider
	  ================================================================================*/
        $(".about-us-image-slider").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        smartSpeed: 500,
        merge: true,
        nav: true,
        dots: false,
        margin: 12,
        navText: [
            "<i class='fi-rr-angle-small-left'></i>",
            "<i class='fi-rr-angle-small-right'></i>",
        ],
        });
  });

  /*==============================================================================
		Preloader JS
	================================================================================*/
  $(window).on("load", function (event) {
    $("#preloader").delay(800).fadeOut(500);
  });
})(jQuery);

/*==============================================================================
		Language Change Switch JS
================================================================================*/

// (function () {
//   let onpageLoad = localStorage.getItem("systemChange") || "";
//   let element = document.body;
//   element.classList.add(onpageLoad);
//   document.getElementById("systemChange").textContent =
//     localStorage.getItem("systemChange") || "language-change";
// })();
