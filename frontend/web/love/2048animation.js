//动画处理时间:更新<移动<出现
/**
 * 动态显示随机生成数字
 *
 * @param randx
 *            随机位置横坐标
 * @param randy
 *            随机位置纵坐标
 * @param randNumber
 *            随机数字
 */
function showNumberAnimation(randx, randy, randNumber) {
    var numberCell = $("#number_cell_" + randx + "_" + randy);
    numberCell.css({
        backgroundColor: getBackGroundColor(randNumber)
    });
    numberCell.text(getCellContext(randNumber));
    numberCell.animate({
        'width': CELLWIDTH,
        'height': CELLWIDTH,
        'top': getPosTop(randx, randy),
        'left': getPosLeft(randx, randy),
    }, 300);
}

/**
 * 动态显示数字的移动效果
 *
 * @param fromx
 *            源点横坐标
 * @param fromy
 *            源点纵坐标
 * @param tox
 *            落脚点横坐标
 * @param toy
 *            落脚点纵坐标
 */
function showMoveAnimation(fromx, fromy, tox, toy) {
    var numberCell = $("#number_cell_" + fromx + "_" + fromy);
    numberCell.animate({
        "top": getPosTop(tox, toy),
        "left": getPosLeft(tox, toy)
    }, 270);
}
/**
 * 更新分数
 */
function updateScore() {
    $score.text("SCORE:" + score);
    $go_back_button.attr('href', '/index/contact?res=' + $score.text());

}
/**
 * 游戏结束
 */
function gameover(str) {
    $footer.text(str);
    $footer.slideDown();
}
/**
 * 在随机空白处随机生成一个随机数字(2/4)
 *
 * @returns {Boolean}
 */
function generateOneNumber() {
    if (nospace(board)) {
        return false;
    }
    // 随机一个位置
    var randx = parseInt(Math.floor(Math.random() * 4));
    var randy = parseInt(Math.floor(Math.random() * 4));

    var times = 0;
    while (times < 50) {
        if (board[randx][randy] == 0) {
            break;
        }
        randx = parseInt(Math.floor(Math.random() * 4));
        randy = parseInt(Math.floor(Math.random() * 4));
        times++;
    }
    if (times == 50) {
        for (var i = 0; i < 4; i++) {
            for (var j = 0; j < 4; j++) {
                if (board[i][j] == 0) {
                    randx = i;
                    randy = j;
                }
            }
        }
    }
    // 随机一个数字
    var randNumber = Math.random() < 0.5 ? 2 : 4;
    // 随机位置显示随机数字
    board[randx][randy] = randNumber;
    showNumberAnimation(randx, randy, randNumber);
    return true;
}
/**
 * 更新盘格
 */
function updateBoardView() {
    $(".number_cell").remove();
    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 4; j++) {
            $grid.append('<div class="number_cell" id="number_cell_' + i + '_'
            + j + '"></div>');
            var numberCell = $('#number_cell_' + i + '_' + j);
            if (board[i][j] == 0) {
                numberCell.css({
                    'width': 0,
                    'height': 0,
                    'top': getPosTop(i, j) + CELLWIDTH / 2,
                    'left': getPosLeft(i, j) + CELLWIDTH / 2
                });
            } else {
                numberCell.css({
                    'width': CELLWIDTH,
                    'height': CELLWIDTH,
                    'top': getPosTop(i, j),
                    'left': getPosLeft(i, j),
                    'background-color': getBackGroundColor(board[i][j])
                });
                numberCell.text(getCellContext(board[i][j]));
            }
            hasConflicted[i][j] = false;
        }
    }
}
