let scene1 = document.getElementById('scene-1');
let parallaxInstance1 = new Parallax(scene1);
parallaxInstance1.friction(0.2, 0.2);

let scene2 = document.getElementById('scene-2');
let parallaxInstance2 = new Parallax(scene2);
parallaxInstance2.friction(0.2, 0.2);

let scene3 = document.getElementById('scene-3');
let parallaxInstance3 = new Parallax(scene3);
parallaxInstance3.friction(0.2, 0.2);

jQuery(function($){
    $('.counter').counterUp({
        delay: 10,
        time: 1500,
        triggerOnce: true
    });
    $('.owl-fade').owlCarousel({
        items: 1,
        nav: false,
        dots: false,
        rtl: true,
        autoplay: true,
        loop: true,
        animateOut: 'fadeOut'
    });
    $('.owl-single-dots').each(function () {
        $(this).owlCarousel({
            dots: true,
            nav: false,
            loop: true,
            margin: 0,
            items: 1,
            rtl: true,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
        });
    });
    $('.owl-3').owlCarousel({
        dots: true,
        nav: true,
        loop: true,
        margin: 45,
        rtl: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
});
