$(document).ready(function () {
var $portfolio;
var $masonry_block;
var $portfolio_selectors;
var $portfolio_selectors_li;
var hashfilter;
    "use strict";
/* -------------------------------------------------------- */
// PreLoader - start
/* -------------------------------------------------------- */
// Initialize functions after elements are loaded.
    $(window).on('load', function() {
        // Preloader
        $('.preloader img').fadeOut(); // will first fade out
        $('.preloader').delay(320).fadeOut('slow', function() {

        });
    });
/* -------------------------------------------------------- */
// PreLoader - end
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
//Sliders owlCarousel - start
/* -------------------------------------------------------- */
    $("#owl-clients").owlCarousel({
        navigation: true,
        items: 6,
        itemsDesktop: [1200, 6],
        itemsTablet: [800, 3],
        itemsMobile: [700, 2],
    });
    $("#owl-main-slider").owlCarousel({
        navigation: true,
        slideSpeed: 400,
        paginationSpeed: 400,
        singleItem: true,
        transitionStyle : "fade",
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
    $("#testimonial-settings").owlCarousel({
        navigation: false,
        items: 1,
        itemsDesktop: [1300, 1],
        itemsTablet: [800, 1],
        itemsMobile: [700, 1]
    });
    //owl button next
    $(".owl-buttons > .owl-next").on('click', function (e) {
        if ($(e.target).is('.mfp-close'))
            return;
        return false;
    });
    //owl button prev
    $(".owl-buttons > .owl-prev").on('click', function (e) {
        if ($(e.target).is('.mfp-close'))
            return;
        return false;
    });
    //owl pagination
    $(".owl-pagination > .owl-page").on('click', function (e) {
        if ($(e.target).is('.mfp-close'))
            return;
        return false;
    });
/* -------------------------------------------------------- */
//  Owl Carousels - end
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// Scroll To Top - start
/* -------------------------------------------------------- */
    $(window).scroll(function () {
        if ($(this)
                .scrollTop() > 100) {
            $('.scrollTop')
                    .fadeIn();
        } else {
            $('.scrollTop')
                    .fadeOut();
        }
    });
    $('.scrollTop').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
/* -------------------------------------------------------- */
// Scroll To Top - end
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// Accordion Settings  - start
/* -------------------------------------------------------- */
    $('.nav.navbar-nav a.internal-link').on('click', function () {

    $(this).parents('ul.navbar-nav').find('a.internal-link').removeClass('active');
     
    $(this).addClass('active');
       if ($('.navbar-header .navbar-toggle').is(':visible'))
     
     $(this).parents('.navbar-collapse').collapse('hide');
    });
/* -------------------------------------------------------- */
// Accordion Settings - end
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// Counter Settings - start
/* -------------------------------------------------------- */
    animatecounters();
    // counts on scrolling
    $('.counter-timing').appear();
    $(document.body).on('appear', '.counter-timing', function (e) {
        if (!$(this).hasClass('appear')) {
        animatecounters();
        $(this).addClass('appear');
        }
    });
    function animatecounters() {
    $('.counter-timing').each(count);
        function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
        }
     }
/* -------------------------------------------------------- */
// Counter Settings - end
/* -------------------------------------------------------- */
  

/* -------------------------------------------------------- */
// Contact Form - start
/* -------------------------------------------------------- */
    $("#alert").hide();
    $("#btn-contact").on('click', function () {
        var error = validationContactUsForm();
        if (error) {
            $.ajax({
                type: "POST",
                url: "contact-form.php",
                data: $("#contactusform").serialize(),
                success: function (result) {
                    $('input[type=text],textarea').each(function () {
                        $(this).val('');
                    })
                    $("#alert").html(result);
                    $("#alert").fadeIn("slow");
                    $('#alert').delay(3000).fadeOut("slow");
                }
            });
        }
    });
    function validationContactUsForm() {
        var error = true;
        $('#contactusform input[type=text]').each(function (index) {

            if (index == 1) {
                if (!(/(.+)@(.+){2,}\.(.+){2,}/.test($(this).val()))) {
                    $("#contactusform").find("input:eq(" + index + ")").css({"border": "1px solid #e40000"});
                    error = false;
                } else {
                    $("#contactusform").find("input:eq(" + index + ")").css({"border": "1px solid #e8e8e8"});
                }
            }
            else if (index == 0) {
                if ($(this).val() == null || $(this).val() == "") {
                    $("#contactusform").find("input:eq(" + index + ")").css({"border": "1px solid #e40000"});
                    error = false;
                }
                else {
                    $("#contactusform").find("input:eq(" + index + ")").css({"border": "1px solid #e8e8e8"});
                }
            }
        });
        return error;
    }
/* -------------------------------------------------------- */
// Contact Form - end
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// WOW Animations  - start
/* -------------------------------------------------------- */
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 90,
        mobile: false,
        live: true
    });
    wow.init();
/* -------------------------------------------------------- */
// WOW Animations  - end
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// Header Nav - Start
/* -------------------------------------------------------- */
    if ($(window).scrollTop() > 10) {
        $('nav').addClass('shrink-nav');
    } else {
        $('nav').removeClass('shrink-nav');
    }
    $(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
        $('nav').addClass('shrink-nav');
    } else {
        $('nav').removeClass('shrink-nav');
    }
    });
    function SetResizeHeaderMenu() {
        var width = $('nav.navbar').children('div.container').width();
    }
/* -------------------------------------------------------- */
// Header Nav - End
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// Internal Links  - Start
/* -------------------------------------------------------- */
    $('.internal-link').smoothScroll({
        speed: 700,
        offset: -0
    });
/* -------------------------------------------------------- */
// Internal Links  - end
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// Smooth Scrolling Animation - Start
/* -------------------------------------------------------- */
    var scrollAnimationTime = 1100,
            scrollAnimation = 'easeInOutExpo';
    $('a.scrollto').bind('click.smoothscroll', function (event) {
        event.preventDefault();
        var target = this.hash;
        $('html, body').stop()
                .animate({
                'scrollTop': $(target)
                        .offset()
                        .top
            }, scrollAnimationTime, scrollAnimation, function () {
                window.location.hash = target;
            });
    });
/* -------------------------------------------------------- */
// Smooth Scrolling Animation - End
/* -------------------------------------------------------- */


/* -------------------------------------------------------- */
// Recent Work Portfolio - start
/* -------------------------------------------------------- */
    //masonry portfolio in recent work section
    $portfolio = $('.portfolio-masonry');
    $portfolio_selectors = $('.img-filter > li > a');
    $portfolio_selectors_li = $('.img-filter li');
    hashfilter = "*";
    if(location.hash!=""){
        var temphashfilter = "." + location.hash.substr(1);
        if (temphashfilter==".*")
        {
        temphashfilter="*";
        }
    $portfolio_selectors.each(function(){
     if ($(this).attr("data-filter") == temphashfilter) {
        $portfolio_selectors_li.removeClass('active');
        $portfolio_selectors_li.find('a[data-filter="'+temphashfilter+'"]').parent('li').addClass("active");
        var autoscrolltoelement = function(){
            $("html, body").animate({
             scrollTop: $('.img-filter').parents('section').offset().top-60
            });
        };
        setTimeout(autoscrolltoelement, 500);
        hashfilter=temphashfilter;
             }
         });        
    }
    // images loaded
    $portfolio.imagesLoaded(function () {
        $portfolio.isotope({
        filter: hashfilter,
        itemSelector: 'li',
        layoutMode: 'masonry'
        });
    });
     $(window).resize(function () {
        setTimeout(function () {
            $portfolio.isotope('layout');
        }, 500);
    });
    //portfolio selectors
    $portfolio_selectors.on('click', function () {
        $portfolio_selectors.parent().removeClass('active');
        $(this).parent().addClass('active');
        var selector = $(this).attr('data-filter');
        $portfolio.isotope({filter: selector});
       
        if (selector.substr(1)!="" && selector.substr(1)!="#")
        {
             location.hash = selector.substr(1);     
        }
        else
        {
        location.hash ="*";
        }
        return false;
    });
/* -------------------------------------------------------- */
// Recent Work Portfolio - end
/* -------------------------------------------------------- */

/* -------------------------------------------------------- */
//Full Screen Header - Start
/* -------------------------------------------------------- */
    SetResizeHeaderMenu();
    $(window).on('resize', function () {
        SetResizeContent();
        setTimeout(function () {
        }, 1000);
    });
    function SetResizeContent() {
        var minheight = $(window).height();
        $(".screen-slider").css('min-height', minheight);
        var minwidth = $(window).width();
        $(".screen-slider-width").css('min-width', minwidth);
    }
    SetResizeContent();
    });
/* -------------------------------------------------------- */
//Full Screen Header - End
/* -------------------------------------------------------- */