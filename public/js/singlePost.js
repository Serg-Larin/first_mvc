$(document).ready(function() {
    $('.comment_button').on('click',function () {
        if($('.comment').css('display')=='none')
        {
            $(this).parent().parent().find('.new_comment').css('display', 'block');
            $('.comment').css('display','flex');
            $('.comment_button').css('background-color','white');
            $('.comment_button').css('color','lightskyblue');
            $('.comment_button').css('border','2px solid lightskyblue');


        }else {
            $('.comment').css('display', 'none');
            $('.new_comment').css('display','none');
            $('.comment_button').css('background-color','lightskyblue');
            $('.comment_button').css('color','white');

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

    $('#add_comment_form').submit(function (e) {
        let form = new FormData(this);
        let button = $('#add_comment_button');
        button.attr('disabled',true);

        $.ajax({
            url: '/add_new_comment',
            type: "POST",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        }).done(function (res) {
            console.log(res);
            callMessage(res)

        })
        e.preventDefault();
    })

});
