/**
 * 获取当前数字对应的背景色
 *
 * @param number
 * @returns {String}
 */
function getBackGroundColor(number) {
    switch (number) {
        case 2:
            return "#EA6F8C";
            break;
        case 4:
            return "#7C897D";
            break;
        case 8:
            return "#C83051";
            break;
        case 16:
            return "#B1A785";
            break;
        case 32:
            return "#BB265D";
            break;
        case 64:
            return "#D0008A";
            break;
        case 128:
            return "#00629D";
            break;
        case 256:
            return "#947151";
            break;
        case 512:
            return "#FE4A26";
            break;
        case 1024:
            return "#435D80";
            break;
        case 2048:
            return "#204068";
            break;
        case 4096:
            return "#A9420F";
            break;
        case 8192:
            return "#452B22";
            break;
        case 16384:
            return "#4A47BA";
            break;
        case 32768:
            return "#8F00A5";
            break;
        case 65536:
            return "#DA0057";
            break;
        default:
            return "#74C1E3";
            break;
    }
}
/**
 * 返回对应数字的单元内容
 *
 * @param number
 * @returns {String}
 */
function getCellContext(number) {
    switch (number) {
        case 2:
            return "遇见";
            break;
        case 4:
            return "相识";
            break;
        case 8:
            return "了解";
            break;
        case 16:
            return "暧昧";
            break;
        case 32:
            return "约会";
            break;
        case 64:
            return "表白";
            break;
        case 128:
            return "牵手";
            break;
        case 256:
            return "拥抱";
            break;
        case 512:
            return "亲吻";
            break;
        case 1024:
            return "吵架";
            break;
        case 2048:
            return "分手";
            break;
        case 4096:
            return "冷战";
            break;
        case 8192:
            return "牵挂";
            break;
        case 16384:
            return "思念";
            break;
        case 32768:
            return "和好";
            break;
        case 65536:
            return "缠绵";
            break;
        default:
            return "永远";
            break;
    }
}
