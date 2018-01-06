<include file="Public:header" />
<link href="http://cdn.bootcss.com/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdn.bootcss.com/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="http://cdn.bootcss.com/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
<script type="text/javascript" language="javascript" src="http://cdn.bootcss.com/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>
<script type="text/javascript" language="javascript" src="http://cdn.bootcss.com/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
<div style="min-width:780px;margin-bottom: 400px;">
    <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px" bgcolor="#D6D6D6" align="center">
        <tr>
            <td bgcolor="#FFFFFF" width="100%">

                <table width="99%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D6D6D6">
                    <tbody><tr>
                        <td height="19" colspan="7" background="__PUBLIC__/admin/images/tbg.gif" bgcolor="#E7E7E7">
                            <table width="96%" border="0" cellspacing="1" cellpadding="1">
                                <tbody><tr>
                                    <td width="24%" style="padding-left:10px;"><strong>分类管理</strong></td>
                                    <td width="80%" align="right">
                                    </td>
                                </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </td>
            </tr>
        <tr align="center" height="25" style="color:#fff;font-weight: bold;">
            <td> </td>
        </tr>
        <tr>
            <td>
                <div id="category-tree" style="width: 800px"></div>
                <div style="width: 800px"><button type="button " class="btn btn-default pull-right"  data-toggle="modal" data-target="#myModal" onclick="open_add_dialog()">新 增</button></div>
            </td>
        </tr>
        </table>
</div>

<link href="https://cdn.bootcss.com/blueimp-file-upload/9.19.2/css/jquery.fileupload.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/blueimp-file-upload/9.19.2/js/vendor/jquery.ui.widget.js"></script>
<script src="https://cdn.bootcss.com/blueimp-file-upload/9.19.2/js/jquery.iframe-transport.js"></script>
<script src="https://cdn.bootcss.com/blueimp-file-upload/9.19.2/js/jquery.fileupload.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/admin/js/imgpreview.min.jquery.js"></script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新增分类</h4>
            </div>
            <form id="add-category-form" method="POST" name="add-category-form" action="__URL__/addcategory" onsubmit="return submit_check(this)">
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="add-category-form-alert" style="display:none"></div>
                    <div class="form-group">
                        <label for="category_name" class="control-label">分类名称:</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" />
                    </div>
                    <div class="form-group">
                        <label for="parent_category" class="control-label">分类图片:</label>
                        <span class="btn btn-primary fileinput-button" style="margin-top: 12px">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>上传图片...</span>
                            <input id="yyg_uploadImg" type="file" name="yyg_uploadImg[]">
                            <input type="hidden" name="yyg_uploadImg_id" id="yyg_uploadImg_id" />
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="parent_category" class="control-label">选择父级:</label>
                        <select class="form-control" id="parent_category" name="parent_category">
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

        $.get('__URL__/getList', function(data, status){
            $('#category-tree').treeview(
            {
                data: comm_parseJsonResult(data),
                selectedBackColor : '#cccccc',
                state:{
                    expanded: true,
                    selected: false
                },
                highlightSelected: false
            });
            if($('.cate-img-link').length){
                $('.cate-img-link').imgPreview({
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
            }

        });
        
        function open_add_dialog() {
            $.get('__URL__/getCategorys?pid=0', function(data,status){
                var cates = comm_parseJsonResult(data);
                $("#parent_category").empty();
                $("#parent_category").append('<option value="0">无分类</option>');
                $(cates).each(function(it){
                    $("#parent_category").append('<option value="'+cates[it]['id']+'">' + cates[it]['name'] + '</option>');
                });
            });
        }

        function submit_check(tform) {
            if(tform.category_name.value == ''){
                $("#add-category-form-alert").text("分类名称不能为空").show();
                return false;
            }
            $.post(tform.action, {'category_name' : tform.category_name.value, 'parent_category' : tform.parent_category.value, 'up_img_id': tform.yyg_uploadImg_id.value} , function (data, status) {
                data = comm_parseJsonResult(data);
                if(data){
                    show_success_alert('成功', "新增分类成功", function () {
                        window.location.reload();
                    });
                }
            });
            return false;
        }

        function doDel(cid, cname) {
            yygcms_confirm("确认删除分类：<span style=\"color:#dd2222;\">" + cname + "</span>?", function (result) {
                if(result){
                    $.post('__URL__/dodel', {'cid' : cid}, function (data, status) {
                        data = comm_parseJsonResult(data);
                        if(data){
                            window.location.reload();
                        }
                    });
                }
            })

        }

        function doEnabled(cid) {
            $.post('__URL__/dodisable', {'cid' : cid, 'status' : 1}, function (data, status) {
                data = comm_parseJsonResult(data);
                if(data){
                    window.location.reload();
                }
            });
        }

        function doDisabled(cid) {
            $.post('__URL__/dodisable', {'cid' : cid, 'status' : 0}, function (data, status) {
                data = comm_parseJsonResult(data);
                if(data){
                    window.location.reload();
                }
            });
        }

        function doEdit(cid) {
            var e = getEvent();
            e.stopPropagation();
            $.get('__URL__/getCategorys?pid=0', function(data, status){
                var cates = comm_parseJsonResult(data);
                $("#parent_category").empty();
                $("#parent_category").append('<option value="0">无分类</option>');
                $(cates).each(function(it){
                    $("#parent_category").append('<option value="'+cates[it]['id']+'">' + cates[it]['name'] + '</option>');
                });
                $('#myModal').modal({});
            });

        }

    $(function(){
        $('#yyg_uploadImg').fileupload({
            url: "__URL__/upload",
            dataType: 'json',
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: <?php echo $option->maxImgSize?>,
            singleFileUploads: true,
            formData:{},
            done: function (e, data) {
                var jsondata = data.result;
                try{
                    jsondata = comm_parseJsonResult(jsondata);
                }catch(ee){}
                $("#yyg_uploadImg_id").val(jsondata['id']);
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


    });


</script>
<include file="Public:footer" />

