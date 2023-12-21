(function ($) {
    $(document).ready(function () {
        const quotes = new Swiper(".quotes_swiper", {
            effect: "fade",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    });
})(jQuery);
