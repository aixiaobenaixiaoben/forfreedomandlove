/**
 * 向左移动
 */
function moveLeft() {// i为行号j为列号
    if (!canMoveLeft(board)) {
        return false;
    }
    for (var i = 0; i < 4; i++) {
        for (var j = 1; j < 4; j++) {
            if (board[i][j] != 0) {
                for (var k = 0; k < j; k++) {
                    if (board[i][k] == 0 && noBlockHrizontal(i, k, j, board)) {
                        // move
                        showMoveAnimation(i, j, i, k);
                        board[i][k] = board[i][j];
                        board[i][j] = 0;
                        continue;
                    } else if (board[i][j] == board[i][k]
                        && noBlockHrizontal(i, k, j, board)
                        && !hasConflicted[i][k]) {
                        // move,add
                        showMoveAnimation(i, j, i, k);
                        board[i][k] += board[i][j];
                        board[i][j] = 0;
                        score += board[i][k];
                        updateScore();
                        hasConflicted[i][k] = true;
                        continue;
                    }
                }
            }
        }
    }
    setTimeout("updateBoardView()", 250);
    return true;
}
/**
 * 向上移动
 */
function moveUp() {// i为列号j为行号
    if (!canMoveUp(board)) {
        return false;
    }
    for (var i = 0; i < 4; i++) {
        for (var j = 1; j < 4; j++) {
            if (board[j][i] != 0) {
                for (var k = 0; k < j; k++) {
                    if (board[k][i] == 0 && noBlockVertical(i, k, j, board)) {
                        // move
                        showMoveAnimation(j, i, k, i);
                        board[k][i] = board[j][i];
                        board[j][i] = 0;
                        continue;
                    } else if (board[j][i] == board[k][i]
                        && noBlockVertical(i, k, j, board)
                        && !hasConflicted[k][i]) {
                        // move,add
                        showMoveAnimation(j, i, k, i);
                        board[k][i] += board[j][i];
                        board[j][i] = 0;
                        score += board[k][i];
                        updateScore();
                        hasConflicted[k][i] = true;
                        continue;
                    }
                }
            }
        }
    }
    setTimeout("updateBoardView()", 250);
    return true;
}
/**
 * 向右移动
 */
function moveRight() {// i为行号j为列号
    if (!canMoveRight(board)) {
        return false;
    }
    for (var i = 0; i < 4; i++) {
        for (var j = 2; j >= 0; j--) {
            if (board[i][j] != 0) {
                for (var k = 3; k > j; k--) {
                    if (board[i][k] == 0 && noBlockHrizontal(i, j, k, board)) {
                        // move
                        showMoveAnimation(i, j, i, k);
                        board[i][k] = board[i][j];
                        board[i][j] = 0;
                        continue;
                    } else if (board[i][j] == board[i][k]
                        && noBlockHrizontal(i, j, k, board)
                        && !hasConflicted[i][k]) {
                        // move,add
                        showMoveAnimation(i, j, i, k);
                        board[i][k] += board[i][j];
                        board[i][j] = 0;
                        score += board[i][k];
                        updateScore();
                        hasConflicted[i][k] = true;
                        continue;
                    }
                }
            }
        }
    }
    setTimeout("updateBoardView()", 250);
    return true;
}
/**
 * 向下移动
 */
function moveDown() {// i为列号j为行号
    if (!canMoveDown(board)) {
        return false;
    }
    for (var i = 0; i < 4; i++) {
        for (var j = 2; j >= 0; j--) {
            if (board[j][i] != 0) {
                for (var k = 3; k > j; k--) {
                    if (board[k][i] == 0 && noBlockVertical(i, j, k, board)) {
                        // move
                        showMoveAnimation(j, i, k, i);
                        board[k][i] = board[j][i];
                        board[j][i] = 0;
                        continue;
                    } else if (board[j][i] == board[k][i]
                        && noBlockVertical(i, j, k, board)
                        && !hasConflicted[k][i]) {
                        // move,add
                        showMoveAnimation(j, i, k, i);
                        board[k][i] += board[j][i];
                        board[j][i] = 0;
                        score += board[k][i];
                        updateScore();
                        hasConflicted[k][i] = true;
                        continue;
                    }
                }
            }
        }
    }
    setTimeout("updateBoardView()", 250);
    return true;
}
