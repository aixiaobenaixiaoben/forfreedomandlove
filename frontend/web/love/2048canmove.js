/**
 * 获取元素纵坐标
 *
 * @param i
 *            行号
 * @param j
 *            列号
 * @returns {Number}
 */
function getPosTop(i, j) {
    return CELLSCALE * i;
}
/**
 * 获取元素横坐标
 *
 * @param i
 *            行号
 * @param j
 *            列号
 * @returns {Number}
 */
function getPosLeft(i, j) {
    return CELLSCALE * j;
}
/**
 * 是否到达游戏终级
 *
 * @returns {Boolean}
 */
function gototop() {
    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 4; j++) {
            if (board[i][j] == 131072) {
                return true;
            }
        }
    }
    return false;
}
/**
 * 有无空间生成新的元素
 *
 * @param board
 * @returns {Boolean}
 */
function nospace(board) {
    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 4; j++) {
            if (board[i][j] == 0) {
                return false;
            }
        }
    }
    return true;
}
/**
 * 能否移动
 *
 * @param board
 * @returns {Boolean}
 */
function nomove(board) {
    if (canMoveDown(board) || canMoveLeft(board) || canMoveRight(board) || canMoveUp(board)) {
        return false;
    }
    return true;
}
/**
 * 能否向左移动
 *
 * @param board
 * @returns {Boolean}
 */
function canMoveLeft(board) {// i为行号j为列号
    for (var i = 0; i < 4; i++) {
        for (var j = 1; j < 4; j++) {
            if (board[i][j] != 0) {
                if (board[i][j - 1] == 0 || board[i][j - 1] == board[i][j]) {
                    return true;
                }
            }
        }
    }
    return false;
}
/**
 * 能否向上移动
 *
 * @param board
 * @returns {Boolean}
 */
function canMoveUp(board) {// i为列号j为行号
    for (var i = 0; i < 4; i++) {
        for (var j = 1; j < 4; j++) {
            if (board[j][i] != 0) {
                if (board[j - 1][i] == 0 || board[j - 1][i] == board[j][i]) {
                    return true;
                }
            }
        }
    }
    return false;
}
/**
 * 能否向右移动
 *
 * @param board
 * @returns {Boolean}
 */
function canMoveRight(board) {// i为行号j为列号
    for (var i = 0; i < 4; i++) {
        for (var j = 2; j >= 0; j--) {
            if (board[i][j] != 0) {
                if (board[i][j + 1] == 0 || board[i][j + 1] == board[i][j]) {
                    return true;
                }
            }
        }
    }
    return false;
}
/**
 * 能否向下移动
 *
 * @param board
 * @returns {Boolean}
 */
function canMoveDown(board) {// i为列号j为行号
    for (var i = 0; i < 4; i++) {
        for (var j = 2; j >= 0; j--) {
            if (board[j][i] != 0) {
                if (board[j + 1][i] == 0 || board[j + 1][i] == board[j][i]) {
                    return true;
                }
            }
        }
    }
    return false;
}

/**
 * 水平方向当前位置和落脚点之间有无障碍
 *
 * @param row
 *            落脚点所在行
 * @param col1
 *            落脚点所在列(或者当前列) col1小于col2
 * @param col2
 *            当前列(或者落脚点所在列)
 * @param board
 * @returns {Boolean}
 */
function noBlockHrizontal(row, col1, col2, board) {
    for (var i = col1 + 1; i < col2; i++) {
        if (board[row][i] != 0) {
            return false;
        }
    }
    return true;
}
/**
 * 垂直方向当前位置和落脚点之间有无障碍
 *
 * @param col
 *            落脚点所在列
 * @param row1
 *            落脚点所在行(或者当前行) row1小于row2
 * @param row2
 *            当前行(或者落脚点所在行)
 * @param board
 * @returns {Boolean}
 */
function noBlockVertical(col, row1, row2, board) {
    for (var i = row1 + 1; i < row2; i++) {
        if (board[i][col] != 0) {
            return false;
        }
    }
    return true;
}
