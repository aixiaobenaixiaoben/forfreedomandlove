$(function () {

    initHoverColor();
    listenMenuIconClick();
});

function listenMenuIconClick() {
    $('.program .side .list .parent i').click(function () {
        $(this).parents('.parent').next().slideToggle();
    });
}


function initHoverColor() {
    $('header .nav h4').hover(
        function () {
            $(this).animate({
                'color': '#FDFDFD',
                'background-color': '#3BAF9B'
            }, 'fast');
        },
        function () {
            $(this).animate({
                'color': '#575064',
                'background-color': '#FDFDFD'
            });
        }
    );

    $('.program .side .list .parent').hover(
        function () {
            $(this).animate({
                'background-color': '#31AB96'
            }, 'fast');
        },
        function () {
            $(this).animate({
                'background-color': '#494158'
            });
        }
    );

    $('.program .side .list .parent i').hover(
        function () {
            $(this).animate({
                'color': '#FDFDFD'
            }, 'fast');
        },
        function () {
            $(this).animate({
                'color': '#A9ACAD'
            });
        }
    );

    $('.program .side .list .sub-list .child').hover(
        function () {
            $(this).animate({
                'background-color': '#CCCCCC'
            }, 'fast');
        },
        function () {
            $(this).animate({
                'background-color': '#F3F3F3'
            });
        }
    );
}