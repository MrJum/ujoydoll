/**
 * Created by Administrator on 2018/1/9.
 */
var Class = {
    create: function() { return function() { this.init.apply(this, arguments);}}
};
var YygPost = Class.create();
var YygPost_contentEditor = null;
var YygPost_introEditor = null;
YygPost.prototype = {
    init : function(config){
        this.setConfig(config);
    },
    setConfig:function(config){
        this.del_attac_url = ('del_attac_url' in config) ? config['del_attac_url'] : null;
        this.content_id = ('content_id' in config) ? config['content_id'] : null;
    },
    initFileUpload: function (maxImgSize, upUrl) {
        var thiz = this;
        $('#yyg_uploadImg').fileupload({
            url: upUrl,
            dataType: 'json',
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: maxImgSize,
            maxNumberOfFiles: 8,
            formData: {},
            done: function (e, data) {
                var jsondata = data.result;
                try {
                    jsondata = comm_parseJsonResult(jsondata);
                } catch (ee) {
                }
                thiz.renderImgList(jsondata);
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    },
    renderImgList : function (jsondata) {
        var ejsImgDiv = document.getElementById('ejs-img-div').innerHTML;
        var imghtml = ejs.render(ejsImgDiv, {jsondata: jsondata});
        $("#update_img_list").prepend(imghtml);
        $("#yyg_uploadImg_ids").val($("#yyg_uploadImg_ids").val() + "," + jsondata['id']);
        this.renderImgLink();
    },
    deleteUpImg : function(o, attId){
        if(!attId) return false;
        var args = {};
        if(this.content_id == null){
            args = {
                "id": attId,
            };
        }else{
            args = {
                "id":attId,
                "cid": this.content_id
            };
        }

        $.post(this.del_attac_url, args, function (data) {
            if (data == 1) {
                $(o).parent().remove();
            } else {
                bootbox.alert(data);
            }
        });
    },
    selectMainPic : function(thiz){
        var mainImgCheckboxs = $(".set-main-img-checkbox");
        var checked = $(thiz).is(':checked');
        if (!checked) {
            $("#set_main_img_id").val("null");
        } else {
            $("#set_main_img_id").val($("#set_main_img_id").val() + "," + thiz.id);
        }

        mainImgCheckboxs.each(function (i, o) {
            if (checked) {
                if (o.id !== thiz.id) {
                    $(o).attr('checked', false);
                }
            }
        });
    },
    selectProductPic : function(thiz){
        var checked = $(thiz).is(':checked');
        if (checked) {
            $("#set_product_img_id").val($("#set_product_img_id").val() + "," + thiz.id);
        }else{
            var selids = $("#set_product_img_id").val();
            var selids_arr = selids.split(',');
            var ret_selids = [];
            for(var i = 0; i < selids_arr.length; i++){
                if(selids_arr[i] != thiz.id){
                    ret_selids[ret_selids.length] = selids_arr[i];
                }
            }
            $("#set_product_img_id").val(ret_selids.join(','));
        }
    },
    renderImgLink : function(){
        var imgLinks = $('#update_img_list div .img-link');

        if(imgLinks.length <= 0){
            return ;
        }
        var ils = imgLinks.toArray();
        var isAllFile = true;
        for(var i = 0, len = ils.length; i < len; i++){
            var li = ils[i];
            var href = $(li).attr("href");
            var ext = href.substring(href.lastIndexOf(".")+1);
            ext = ext.toLowerCase();
            if(ext == 'png' || ext == 'gif' || ext == 'jpg' || ext == 'jpeg' || ext == 'bmp'){
                isAllFile = false;
                break;
            }

        }
        if(isAllFile) return;
        imgLinks.imgPreview({
            containerID: 'imgPreviewWithStyles',
            imgCSS: {
                // Limit preview size:
                height: 200
            },
            // When container is shown:
            onShow: function(link){
                // Animate link:
                $(link).stop().animate({opacity:0.4});
                // Reset image:
                $('img', this).stop().css({opacity:0});
            },
            // When image has loaded:
            onLoad: function(){
                // Animate image
                $(this).animate({opacity:1}, 300);
            },
            // When container hides:
            onHide: function(link){
                // Animate link:
                $(link).stop().animate({opacity:1});
            }
        });
    },
    addToContent : function(imgUrl, name, thiz, tbprefix){
        var selectdOpt = $(thiz).parent().find("select").children("option:selected");
        if(!selectdOpt) return;
        var thwidth = $(selectdOpt[0]).val();
        if(thwidth != 0){
            var fpath = imgUrl.substring(0, imgUrl.lastIndexOf("/"));
            //thumb_200_59a569a7b25ec.png
            if(thwidth == 1){
                imgUrl = fpath + '/' + tbprefix + name;
            }else{
                imgUrl = fpath + '/thumbs/' + tbprefix + thwidth + "_" + name;
            }
        }
        var ext = imgUrl.substring(imgUrl.lastIndexOf(".")+1);

        ext = ext.toLowerCase();
        if(ext == 'png' || ext == 'gif' || ext == 'jpg' || ext == 'jpeg' || ext == 'bmp'){
            YygPost_contentEditor.appendHtml('<img src=" '+ imgUrl + '" alt="" />');
        }else{
            YygPost_contentEditor.appendHtml('<a target="_blank" href="'+ imgUrl + '">' + name + '</a>');
        }

    },
    getAttac : function (content_id, get_attac_url) {
        var args = {
            "id": content_id,
        };
        var thiz = this;
        $.get(get_attac_url, args,function(data){
            if(data){
                var jdatas = null;
                try{
                    jdatas = comm_parseJsonResult(data);
                }catch(e){
                    bootbox.alert(data);
                    return ;
                }
                if(jdatas && jdatas.length > 0){
                    var mainIds = [];
                    var productIds = [];
                    for(var i = 0, len = jdatas.length; i < len; i++){
                        thiz.renderImgList(jdatas[i]);
                        if(jdatas[i]['ismain'] == '1'){
                            mainIds[mainIds.length] = 'main-img-checkbox-' + jdatas[i]['id'];
                        }

                        if(jdatas[i]['isproduct'] == '1'){
                            productIds[productIds.length] = 'product-img-checkbox-' + jdatas[i]['id'];
                        }
                    }
                    $("#set_main_img_id").val(mainIds.join(","));
                    $("#set_product_img_id").val(productIds.join(","));
                    thiz.renderImgLink();
                }
            }

        });
    }
};

KindEditor.ready(function(K) {
    YygPost_contentEditor = K.create('#yyg_content', {
        resizeType : 1,
        allowPreviewEmoticons : false,
        allowImageUpload : false,
        allowFlashUpload : false,
        allowMediaUpload : false,
        pasteType : 2,
        items : [
            'source', '|', 'undo', 'redo', '|', 'cut', 'copy', 'paste',
            'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
            'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
            'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
            'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
            'flash', 'media', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
            'anchor', 'link', 'unlink'
        ]
    });
});

KindEditor.ready(function(K) {
    YygPost_introEditor = K.create('#yyg_intro', {
        resizeType : 1,
        allowPreviewEmoticons : false,
        allowImageUpload : false,
        allowFlashUpload : false,
        allowMediaUpload : false,
        pasteType : 2,
        items : [
            'source', '|', 'undo', 'redo', '|', 'cut', 'copy', 'paste',
            'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
            'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
            'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
            'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
            'flash', 'media', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
            'anchor', 'link', 'unlink'
        ]
    });
});