jQuery(document).ready(function ($) {
    if ($('#loader-wrapper').length > 0) {
        // hide preloader when everthing in the document load
        $('#loader-wrapper').css('display', 'none');
    }

    if(window.matchMedia("(max-width: 768px)").matches){
        $('.carousel-control-prev').css('display', 'none');
        $('.carousel-control-next').css('display', 'none');
    }

    $('.custom-carousel-interval').carousel({
        interval: 6000,
        pause: "false"
    });

    $('#outerCarousel').carousel({
        pause: true,
        interval: false
    });

    $('.fdi-Carousel .carousel-item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        //this will only work for carousel with 3 items since it only adds next() and  next.next();

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });

    $(".carousel").on("touchstart", function(event){
        var xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function(event){
            var xMove = event.originalEvent.touches[0].pageX;
            if( Math.floor(xClick - xMove) > 5 ){
                $(this).carousel('next');
            }
            else if( Math.floor(xClick - xMove) < -5 ){
                $(this).carousel('prev');
            }
        });
        $(".carousel").on("touchend", function(){
            $(this).off("touchmove");
        });
    });

    // Initialize gototop button
    if ($('#toTop').length > 0) {
        // Hide the toTop button when the page loads.
        $("#toTop").css("display", "none");

        // This function runs every time the user scrolls the page.
        $(window).scroll(function () {

            // Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
            if ($(window).scrollTop() > 0) {

                // If it's more than or equal to 0, show the toTop button.
                $("#toTop").fadeIn("slow");
            } else {
                // If it's less than 0 (at the top), hide the toTop button.
                $("#toTop").fadeOut("slow");

            }
        });

        // When the user clicks the toTop button, we want the page to scroll to the top.
        jQuery("#toTop").click(function (event) {

            // Disable the default behaviour when a user clicks an empty anchor link.
            // (The page jumps to the top instead of // animating)
            event.preventDefault();

            // Animate the scrolling motion.
            jQuery("html, body").animate({
                scrollTop: 0
            }, "slow");

        });
    }

    if (jQuery('.sticky-header').length > 0) {
        // grab the initial top offset of the navigation
        var stickyNavTop = $('.sticky-header').offset().top;


        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function () {
            var width = $(window).width();
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if ((scrollTop > stickyNavTop) && (width > 768)) {
                $('.sticky-header').addClass('ct-sticky');
                $('.sticky-header').removeClass('hide');
            } else {
                $('.sticky-header').removeClass('ct-sticky');
                $('.sticky-header').addClass('hide');
            }
        };

        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function () {
            stickyNav();
        });
    }
});