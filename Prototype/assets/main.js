$(document).ready(function () {
    document.addEventListener("DOMContentLoaded", function () {
        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })
    });


    $('.v1-slider').slick({
        dots: false,
        infinite: false,
        speed: 500,
        slidesToShow: 5,
        edgeFriction: 5,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                    arrows: false
                },
            },

            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                    arrows: false
                },
            },
        ]
    });

    $(".blog-card-title").dotdotdot({
        height: 50,
        fallbackToLetter: true,
        watch: true,
    });

    $(".blog-card-text").dotdotdot({
        height: 100,
        fallbackToLetter: true,
        watch: true,
    });


    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })



});