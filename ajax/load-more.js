$(document).ready(function () {
    var ajaxUrl = ajax_params.ajax_url;
    var ajaxNonce = ajax_params.ajax_nonce;

    var offset = 0;
    var postsPerPage = 6;

    $("#load-more-posts").on("click", function () {
        offset = parseInt($("#offset").val());

        var dataTypes = [];
        var postType = $(this).data("type");
        if (typeof postType === "string") {
            dataTypes.push(postType); // Создаем новый массив с одним элементом
        } else {
            dataTypes = postType; // Предполагаем, что postType уже является массивом
        }
        // dataTypes.push(postType);
        console.log(dataTypes);
        // $(".interviews_item").each(function () {
        //     var postType = $(this).data("type");
        //      dataTypes.push(postType);
        // });

        var postExclude = $(this).data("exclude");
        var dataSlug = $(this).data("slug");

        // var filteredData = [...new Set(dataTypes)];

        $.ajax({
            url: ajaxUrl,
            type: "post",
            data: {
                action: "load_more_posts",
                nonce: ajaxNonce,
                offset: offset,
                posts_per_page: postsPerPage,
                post_type: dataTypes,
                exclude: postExclude,
                data_slug: dataSlug,
            },
            success: function (response) {
                if (response) {
                    $("#post-container").append(response);
                    offset += postsPerPage;
                    $("#offset").val(offset);
                    var numberOfPosts =
                        $(response).filter(".interviews_item").length;
                    if (numberOfPosts === 0 || numberOfPosts < postsPerPage) {
                        $("#load-more-posts").hide();
                    }
                } else {
                    $("#load-more-posts").hide();
                }
            },
        });
    });
}, jQuery);
