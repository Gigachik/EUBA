(function ($) {
    $(document).ready(function () {
        const interviews = new Swiper(".interviews_swiper", {
            slidesPerView: 3,
            spaceBetween: 40,
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 20,
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1400: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
    });
})(jQuery);
