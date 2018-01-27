<include file="Public:header" />

<script src="https://cdn.bootcss.com/bootstrap/2.2.2/bootstrap.min.js"></script>

<div style="min-width:780px;margin-top: 12px;margin-left: 24px">
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="mytabs">
            <li role="presentation" class="active"><a href="#tuijian" aria-controls="tuijian" role="tab" data-toggle="tab">推荐</a></li>
            <li role="presentation"><a href="#baopin" aria-controls="baopin" role="tab" data-toggle="tab">爆品</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tuijian">
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>标题</th>
                        <th>分类</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($indexDisplayList[1]['articles'] as $idx => $indexDisplayItem){ ?>
                    <tr>
                        <td scope="row"><?php echo $idx+1 ?></td>
                        <td><?php echo $indexDisplayItem['title'] ?><span class="pull-right label label-info"><?php echo $indexDisplayItem['is_set_main'] ? '已设置主图' : ''?></span></td>
                        <td><?php echo $indexDisplayItem['category']['name'] ?></td>
                        <td>
                            <a href="javascript:void(0)" onclick="cancelToDisplayIndex('<?php echo $indexDisplayItem['id'] ?>', '1', '图片轮播', this)">移除</a> |
                            <a href="javascript:void(0)" onclick="putToTop('<?php echo $indexDisplayItem['id'] ?>', this)">置顶</a> |
                            <a style="text-decoration: none;" href="javascript:void(0)" onclick="edit_content_page('<?php echo admin_url('/Content/edit/cid/'.$indexDisplayItem['id']) ?>', this)" title="编辑">编辑</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="alert alert-info" role="alert">仅在首页展示前<span class="yyg-import"><?php echo $indexDisplayList[1]['limit_size'] ?></span>篇文章</div>
            </div>
            <div role="tabpanel" class="tab-pane" id="baopin">
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>标题</th>
                        <th>分类</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($indexDisplayList[2]['articles'] as $idx => $indexDisplayItem){ ?>
                        <tr>
                            <td scope="row"><?php echo $idx+1 ?></td>
                            <td><?php echo $indexDisplayItem['title'] ?><span class="pull-right label label-info"><?php echo $indexDisplayItem['is_set_main'] ? '已设置主图' : ''?></span></td>
                            <td><?php echo $indexDisplayItem['category']['name'] ?></td>
                            <td>
                                <a href="javascript:void(0)" onclick="cancelToDisplayIndex('<?php echo $indexDisplayItem['id'] ?>', '2', '图片轮播', this)">移除</a> |
                                <a href="javascript:void(0)" onclick="putToTop('<?php echo $indexDisplayItem['id'] ?>', this)">置顶</a> |
                                <a style="text-decoration: none;" href="javascript:void(0)" onclick="edit_content_page('<?php echo admin_url('/Content/edit/cid/'.$indexDisplayItem['id']) ?>', this)" title="编辑">编辑</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="alert alert-info" role="alert">仅在首页展示前<span class="yyg-import"><?php echo $indexDisplayList[2]['limit_size'] ?></span>篇文章</div>
            </div>
    </div>
</div>
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

    function cancelToDisplayIndex(cid, iid, moduleName, thiz) {
        $.post('__URL__/cancelDisplayIndex',{'cid' : cid, 'iid' : iid},function(data){
            data = comm_parseJsonResult(data);
            if(data == 1){
                show_success_alert('成功', '文章在首页【' + moduleName + '】模块移除', function () {
                    $(thiz).parent().parent().remove();
                });
            }
        });
    }
    
    function putToTop(cid, thiz) {
        $.post('<?php echo admin_url('content/puttop')?>',{'id' : cid},function(data){
            data = comm_parseJsonResult(data);
            if(data == 1){
                $(thiz).parent().parent().parent().prepend($(thiz).parent().parent());
                $(thiz).parent().parent().parent().find("tr").each(function (i, o) {
                    $(this).find('td').first().html(i+1);
                });
            }
        });
    }
    
    function edit_content_page(url, thiz) {
        bootbox.alert({message:'<iframe style="width: 100%;height:600px;" src="' + url + '?fromPopWindow=1"></iframe>', title:"编辑", size:"large", callback:function(){
            var dhref = window.location.href;
            var subhref = dhref.substring(0,dhref.lastIndexOf("?"));
            if(!subhref){
                subhref = dhref;
            }

            console.log(subhref + "#" + $($(thiz).parents(".tab-pane")[0]).attr("id"));
            window.location.href = subhref + "?t=" + (new Date().getTime()) +  "#" + $($(thiz).parents(".tab-pane")[0]).attr("id");
        }});
    }


    $(function () {
        var href = window.location.href;
        var shaindx = href.lastIndexOf("#");
        if(shaindx !== -1){
            var hid = href.substring(shaindx);
            $('#mytabs a').each(function(i, o){
                if(o.href.indexOf(hid) !== -1){
                    $(o).tab('show');
                }
            });
        }

    });

</script>
<include file="Public:footer" />

