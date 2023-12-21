(function ($) {
    $(document).ready(function () {
        var ajaxUrl = ajax_params.ajax_url;
        var ajaxNonce = ajax_params.ajax_nonce;
        requestAverageSliderValue();
        $(window).on("resize load", function () {
            $(".round_slider-slider").roundSlider({
                sliderType: "min-range",
                editableTooltip: false,
                radius: 400,
                width: 18,
                value: 50,
                handleSize: "100",
                circleShape: "half-top",
                pathColor: "#B1B4C1",
                rangeColor: "#B1B4C1",
                borderWidth: 0,
                showTooltip: false,

                stop: function (e) {
                    $(".round_slider-slider").roundSlider("disable");
                    $(".round_slider-item, .round_slider-bottom").addClass(
                        "active"
                    );

                    var sliderValue = e.value;
                    $(".round_slider-response").addClass("active");

                    // Отправка значения слайдера на сервер
                    sendSliderValueToServer(sliderValue);
                },
            });
            if ($(window).width() <= 1024 && $(window).width() >= 641) {
                $(".round_slider-slider").roundSlider({
                    radius: 240,
                    handleSize: "70",
                });
            } else if ($(window).width() <= 640) {
                $(".round_slider-slider").roundSlider({
                    radius: 130,
                    handleSize: "50",
                    width: 10,
                });
            }
        });

        $(".round_slider-slider").on("click", function () {
            $(".round_slider-slider").roundSlider("disable");
            $(".round_slider-item, .round_slider-bottom").addClass("active");
        });

        var ajaxUrl = ajax_params.ajax_url;
        var ajaxNonce = ajax_params.ajax_nonce;

        function sendSliderValueToServer(sliderValue) {
            $.ajax({
                url: ajaxUrl,
                type: "POST",
                data: {
                    action: "save_slider_value",
                    slider_value: sliderValue,
                    security: ajaxNonce,
                    // answer: answer,
                },
                success: function (response) {
                    console.log(
                        "Значение слайдера успешно сохранено на сервере."
                    );
                    // requestAverageSliderValue();
                },
                error: function (error) {
                    console.log(this.data);
                    console.error(
                        "Ошибка при отправке значения слайдера: ",
                        error.responseText
                    );
                },
            });
        }

        function requestAverageSliderValue() {
            var ajaxUrl = ajax_params.ajax_url;

            $.ajax({
                url: ajaxUrl,
                type: "GET",
                data: {
                    action: "get_average_slider_value",
                },
                success: function (response) {
                    console.log(response.data);
                    var majorityClass;
                    var majorityPrecentege = Number(
                        response.data.majorityPrecentege
                    ).toFixed(0);

                    var customBlockHTML =
                        '<div class="round_slider-response"><div><h3><strong>' +
                        majorityPrecentege +
                        "%</strong></h3></div></div>";
                    $(".round_slider-slider").append(customBlockHTML);
                },
                error: function (error) {
                    console.error(
                        "Ошибка при запросе среднего значения слайдера: " +
                            error
                    );
                },
            });
        }
    });
})(jQuery);
