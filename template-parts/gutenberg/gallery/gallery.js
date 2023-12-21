(function ($) {
    $(document).ready(function () {
        Fancybox.bind('[data-fancybox="gallery"]', {});

        const gallery = new Swiper(".gallery_swiper", {
            slidesPerView: 1,
            autoHeight: true,
            navigation: {
                nextEl: ".gallery-button-next",
                prevEl: ".gallery-button-prev",
            },
            pagination: {
                el: ".gallery-pagination",
                clickable: true,
            },
        });
    });
})(jQuery);
