$(document).ready(function () {
    $("#tiny-tales").on("submit", function () {
        $("#pageloader").fadeIn();
    });

    $('.category-icon').each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            var category = $(this).attr('data-category');
            $(this).toggleClass('active');
            $('.prompt-select#' + category).toggleClass('active');
        });
    });
});