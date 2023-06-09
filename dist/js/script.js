$(document).ready(function () {


    var selected = $('#MainCharacterType').val();
    if (selected == 'Custom') {
        $('.MainCharacterCustom').show();
    } else {
        $('.MainCharacterCustom').hide();
    }

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

    $('#MainCharacterType').change(function () {
        var selected = $(this).val();
        if (selected == 'Custom') {
            $('.MainCharacterCustom').show();
        } else {
            $('.MainCharacterCustom').hide();
        }
    }); 
    $('.form-select').each(function () {
        $(this).change(function () {
            var selected = $(this).val();
            var selected_id = $(this).attr('id');
            if (selected == 'custom') {
                $('input[name="' + selected_id + 'Custom').show();
            } else {
                $('input[name="' + selected_id + 'Custom').hide();
            }
        }); 
    });

});