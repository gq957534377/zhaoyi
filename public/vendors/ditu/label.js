/**
 * Created by 郭庆 on 2017/6/29.
 */
/**
 * Created by 郭庆 on 2017/6/29.
 */
// 坐标位置+标注+浮动文字
function Label(point, text, mouseoverText){
    this._point = point;
    this._text = text;
    this._overText = mouseoverText;

    Label.prototype.initialize = function(){
        var opts = {
            position : this._point,    // 指定文本标注所在的地理位置
            offset   : new BMap.Size(-10,-10)    //设置文本偏移量
        };
        var label = this._label = new BMap.Label(this._text, opts);  // 创建文本标注对象
        label.setStyle({
            color : "white",
            borderColor:"white",
            backgroundColor:"rgb(6, 130, 255)",
            fontSize : "12px",
            height : "20px",
            lineHeight : "20px",
            fontFamily:"微软雅黑"
        });

        label.onmouseover = function(){
            label.setStyle({
                backgroundColor:"rgb(250, 190, 0)",
            });
        };

        label.onmouseout = function(){
            label.setStyle({
                backgroundColor:"rgb(6, 130, 255)",
            });
        };

        this._label = label;
        return label;
    };
    Label.prototype.show = function () {
        this._label.show();
    };
    Label.prototype.hide = function () {
        this._label.hide();
    };

    this.initialize();
}