var board = new Array();
var score = 0;
var hasConflicted = new Array();

var SCREENWIDTH = window.screen.availWidth > 450 ? 450 : window.screen.availWidth;
var WIDTH = 0.95 * SCREENWIDTH;
var GRIDBORDER = 0.05 * WIDTH;
var GRIDWIDTH = 0.9 * WIDTH;
var CELLSCALE = 0.25 * GRIDWIDTH;
var CELLWIDTH = 0.2 * GRIDWIDTH;

var startx = 0;
var starty = 0;
var endx = 0;
var endy = 0;

$(function () {
    $grid = $("#grid");
    $cell = $(".cell");
    $score = $("#score");
    $footer = $("footer h1");
    $go_back_button = $('header a.go-back-button');
    newgame();
    $("#newgame").click(function () {
        newgame();
    });


});


/**
 * 根据键盘响应推进游戏
 */
$(document).keydown(function (event) {
    switch (event.keyCode) {
        case 37:// left
            event.preventDefault();
            if (moveLeft()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
            break;
        case 38:// up
            event.preventDefault();
            if (moveUp()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
            break;
        case 39:// right
            event.preventDefault();
            if (moveRight()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
            break;
        case 40:// down
            event.preventDefault();
            if (moveDown()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
            break;
        default:
            break;
    }
});

document.addEventListener('touchstart', function (event) {
    startx = event.touches[0].pageX;
    starty = event.touches[0].pageY;
});

document.addEventListener('touchmove', function (event) {
    event.preventDefault();
});

document.addEventListener('touchend', function (event) {
    endx = event.changedTouches[0].pageX;
    endy = event.changedTouches[0].pageY;
    var deltax = endx - startx;
    var deltay = endy - starty;

    if (Math.abs(deltax) < 0.2 * SCREENWIDTH && Math.abs(deltay) < 0.2 * SCREENWIDTH) {
        return;
    }

    //x
    if (Math.abs(deltax) >= Math.abs(deltay)) {
        if (deltax > 0) {
            // moveright
            if (moveRight()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
        } else {
            // moveleft
            if (moveLeft()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
        }
    }
    // y
    else {
        if (deltay > 0) {
            // movedown
            if (moveDown()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
        } else {
            // moveup
            if (moveUp()) {
                setTimeout("generateOneNumber()", 100);
                setTimeout("isgameover()", 100);
            }
        }
    }
});

/**
 * 游戏是否结束
 */
function isgameover() {
    if (nospace(board) && nomove(board)) {
        gameover("Game Over");
    } else if (gototop()) {
        gameover("Reach Top");
    }
}

/**
 * 新游戏
 */
function newgame() {

    $score.text("SCORE:0");
    $go_back_button.attr('href', '/index/contact?res=' + $score.text());
    $footer.slideUp();
    // 初始化盘格
    init();
    // 在随机两个格子生成数字
    generateOneNumber();
    generateOneNumber();
}
/**
 * 初始化盘格
 */
function init() {
    $grid.css({
        'width': GRIDWIDTH,
        'height': GRIDWIDTH,
        'font-size': CELLWIDTH,
        'border-width': GRIDBORDER
    });
    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 4; j++) {
            var cell = $("#cell_" + i + "_" + j);
            cell.css({
                'top': getPosTop(i, j),
                'left': getPosLeft(i, j)
            });
        }
    }
    for (var i = 0; i < 4; i++) {
        board[i] = new Array();
        hasConflicted[i] = new Array();
        for (var j = 0; j < 4; j++) {
            board[i][j] = 0;
            hasConflicted[i][j] = false;
        }
    }
    updateBoardView();
    score = 0;
}