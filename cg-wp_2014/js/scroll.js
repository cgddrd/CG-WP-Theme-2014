jQuery(document).ready(function ($) {
    /* Inside of this function, $() will work as an alias for jQuery() */
    /* and other libraries also using $ will not be accessible under this shortcut. */

    if ($(document).height() > $(window).height()) {
        $('div.logo span').css('height', '0%');
    }
    


    $(window).on('scroll touchmove', function () {

        if (!isHandheldDevice()) {

         /*   var s = $(window).scrollTop(),
                d = $(document).height(),
                c = $(window).height();

            scrollPercent = (s / (d - c)) * 100;

            if (scrollPercent <= 100) {
                $("div.logo span").css("height", scrollPercent + "%");
            } */
            
            var alpha = Math.min(0.5 + 0.4 * $(this).scrollTop() / 210, 0.9);
            var channel = Math.round(alpha * 255);
            $("div.logo").css('background-color', 'rgb(' + channel + ',' + channel + ',' + channel + ')');
        }

    });

    $("#comment-intro").on('click touchstart', function () {

        if ($("#comments").is(":hidden")) {

            $("#comment-intro").slideUp('slow');

            $("#comments").slideDown("slow");

        }

    });

    $("input, textarea").on('keyup', function (event) {

        if (!$(this).val()) {
            $(this).css('border-color', '#DD5424');
        } else {
            $(this).css('border-color', '#ccc');
        }

    });

    $("#submit").on('click touchstart', function (event) {

        var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

        if (!emailRegex.test($('#email').val())) {

            $('p.comment-notes').append('<br /></br /><span class="error-message">Invalid email address entered, please try again.</span>');

            event.preventDefault();
        }

        if (!$('#email').val() || !$('#author').val() || !$('#comment').val()) {

            $('p.comment-notes').append('<br /></br /><span class="error-message">Please ensure all fields have a value before submitting.</span>');

            event.preventDefault();
        }

    });
});

function isHandheldDevice() {

    return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));

}