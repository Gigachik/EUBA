$(document).ready(function () {
    $(".burger").on("click", function (e) {
        e.preventDefault();
        $(".header, .header_navigation, .search_form").toggleClass("active");
        $(this).toggleClass("active");
        $(".search_form label input").removeClass("active");
    });

    $(".menu-item-has-children span").on("click", function (e) {
        e.preventDefault();
        $(this).next().toggleClass("active");
    });

    $(".search_form label input").on("click", function (e) {
        $(this).toggleClass("active");
    });
    $(".search_form label input").attr("placeholder", "SUCHEN");
    if (navigator.userAgent.indexOf("Mac") > 0) {
        $("body").addClass("mac");
    }
}, jQuery);
