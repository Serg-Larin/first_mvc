$(document).ready(function() {
    $('.comment_button').on('click',function () {
        if($('.comment').css('display')=='none')
        {
            $(this).parent().parent().find('.new_comment').css('display', 'block');
            $('.comment').css('display','flex');
            $('.comment_button').css('background-color','darkblue');

        }else {
            $('.comment').css('display', 'none');
            $('.new_comment').css('display','none');
            $('.comment_button').css('background-color','lightskyblue');
        }
    })

    $('.open_sub_comment_button').on('click', function () {
        if($(this).parent().parent().find('.sub_comment')) {
            if ($(this).parent().parent().find('.sub_comment').css('display') == 'none') {
                $(this).parent().parent().find('.sub_comment').css('display','flex');
                $(this).parent().parent().find('.new_sub_comment').css('display','block');
            }
            else {
                $(this).parent().parent().find('.sub_comment').css('display','none');
                $(this).parent().parent().find('.new_sub_comment').css('display','none');
            }

        }
    })

    $('#drop_down').click(function () {
        if($(this).hasClass('fas fa-chevron-down fa-2x')){
            $(this).removeClass('fas fa-chevron-down fa-2x');
            $(this).addClass('fas fa-chevron-up fa-2x')
        }
        else {
            $(this).removeClass('fas fa-chevron-up fa-2x');
            $(this).addClass('fas fa-chevron-down fa-2x')
        }
    })

});