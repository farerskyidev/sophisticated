import Swiper from "swiper/swiper-bundle";
import { gsap } from "./app/gsap/gsap";
import { ScrollTrigger } from "./app/gsap/ScrollTrigger";
import { isEven, isjQuery, Coordinates, videoResize } from "./app/functions";

gsap.registerPlugin(ScrollTrigger);

(function ($) {
    
    // Sticky header
    let $header = $('.header')

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 0) {
            $header.addClass('scroll-active');
        } else {
            $header.removeClass('scroll-active');
        }
    });

    // Mobile header

    $(".header__burger").on('click', function () { 
        if ($(this).hasClass('active')) { 
            $('.header').removeClass('active'); 
            $('body').removeClass('modal-open'); 
            $(this).removeClass('active'); 
        } else { 
            $('.header').addClass('active'); 
            $('body').addClass('modal-open'); 
            $(this).addClass('active'); 
        } 
    });

    $(document).ready(function(){

        if ($(window).width() <= 992) {
            $('.our_properties__wrap > .row:nth-child(1) .our_properties__image').prepend($('.our_properties__wrap h2'));
        }

        // Select2 initialization
        $('.nav-select').select2(); 

        // Pulse button banner
        $('.banner__vert-line-white').on('click', function() {
            var $nextBlock = $('.banner').next();

            if ($nextBlock.length) {
                $('html, body').animate({
                    scrollTop: $nextBlock.offset().top
                }, 1000);
            }
        }); 

        function startPulseAnimation() {
            $('.banner__vert-line-white').addClass('pulse');
            $('.our_properties__vert-line').addClass('pulse');
        }
        startPulseAnimation();

        $('.banner__vert-line-white').on('click', function(event) {
            event.stopPropagation();
        });
        
    });
    $(".banner-slide-items").clone().appendTo('.banner-slide-content');


})(jQuery);

