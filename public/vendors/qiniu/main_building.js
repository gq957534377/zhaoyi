var imgData = {};
var imgDelQiNiu = function (obj) { // 如果要复制一份，这里不用修改
    obj.parent().remove();
};
var domain = $blockQiNiu;
var uploader = Qiniu.uploader({
    runtimes: 'html5,flash,html4',    //上传模式,依次退化
    browse_button: 'pickQiNiu',       //上传选择的点选按钮，**必需**
    uptoken_url: 'http://admin.360louwang.com/getQiniuToken/',            //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
    // uptoken : 'c_M1yo7k90djYAgDst93NM3hLOz1XqYIKYhaNJZ4:X_qTFX0Kv9NogSSPbydQmavKxsE=:eyJzY29wZSI6ImxvdXdhbmctdGVzdCIsImRlYWRsaW5lIjoxNDk5ODY4MDI3LCJ1cEhvc3RzIjpbImh0dHA6XC9cL3VwLnFpbml1LmNvbSIsImh0dHA6XC9cL3VwbG9hZC5xaW5pdS5jb20iLCItSCB1cC5xaW5pdS5jb20gaHR0cDpcL1wvMTgzLjEzMS43LjE4Il19', //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
    // unique_names: true, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
    // save_key: true,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
    domain: 'http://osibaji20.bkt.clouddn.com',   //bucket 域名，下载资源时用到，**必需**
    get_new_uptoken: false,  //设置上传文件的时候是否每次都重新获取新的token
    container: 'BoxQiNiu',           //上传区域DOM ID，默认是browser_button的父元素，
    max_file_size: '100mb',           //最大文件体积限制
    flash_swf_url: 'js/plupload/Moxie.swf',  //引入flash,相对路径
    max_retries: 3,                   //上传失败最大重试次数
    dragdrop: true,                   //开启可拖曳上传
    drop_element: 'BoxQiNiu',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
    chunk_size: '4mb',                //分块上传时，每片的体积
    auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
    init: {
        'FilesAdded': function (up, files) {
            var timestamp = Date.parse(new Date());
            plupload.each(files, function (file) {
                $('#pickQiNiu').before('<li id="' + file.id + '"><img src="/loading.gif" alt=""><a class="imgDelBtn" href="javascript:void(0)" onclick="imgDelQiNiu($(this))"></a></li>');
            });
        },
        'BeforeUpload': function (up, file) {
            // 每个文件上传前,处理相关的事情
        },
        'UploadProgress': function (up, file) {
            // 每个文件上传时,处理相关的事情
        },
        'FileUploaded': function (up, file, info) {
            var res  = JSON.parse(info.response);
            var url = domain + res.key;
            $('#' + file.id).find('img').attr('src', url);
        },
        'Error': function (up, err, errTip) {
            //上传出错时,处理相关的事情
            alert('error');
        },
        'UploadComplete': function () {
            //队列文件处理完毕后,处理相关的事情
        },
        'Key': function (up, file) {
            var key = file.id;
            // do something with key here
            return key
        }
    }
});


$('#submitQiNiu').click(function () {  // 如果要复制一份，这里不用修改
    var imgData = {};
    var li = $('#imgBoxQiNiu').find('li');
    $.each(li, function (index, v) {
        // console.log(v);
        var indexNow = index + 1;
        imgData['img' + indexNow] = $(v).attr('id');
    });
    // console.log(imgData);
    var strData = JSON.stringify(imgData);
    // console.log(strData);
    $('#imgDataQiNiu').val(strData);
});
