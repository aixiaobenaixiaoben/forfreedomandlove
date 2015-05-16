$(function () {
    $('header .nav h4').hover(
        function () {
            $(this).animate({
                'color': '#ffffff',
                'background-color': '#3bb09c'
            });
        },
        function () {
            $(this).animate({
                'color': '#3a3346',
                'background-color': '#ffffff'
            });
        }
    );

});