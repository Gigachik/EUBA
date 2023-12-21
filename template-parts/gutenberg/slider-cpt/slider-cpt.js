(function ($) {
    $(document).ready(function () {
        const news = new Swiper(".news_swiper", {
            slidesPerView: 3.1,
            spaceBetween: 40,
            navigation: {
                nextEl: ".news-button-next",
                prevEl: ".news-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 20,
                },
                767: {
                    slidesPerView: 2.3,
                    spaceBetween: 20,
                },
                1400: {
                    slidesPerView: 2.5,
                    spaceBetween: 40,
                },
            },
        });
    });
})(jQuery);
