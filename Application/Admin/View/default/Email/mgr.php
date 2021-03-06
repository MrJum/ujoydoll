<include file="Public:header" />
<link href="http://cdn.bootcss.com/bootstrap-datepicker/1.7.0/css/bootstrap-datepicker.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.bootcss.com/webui-popover/2.1.15/jquery.webui-popover.min.css" rel="stylesheet">
<script type="text/javascript" language="javascript" src="http://cdn.bootcss.com/bootstrap-datepicker/1.7.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.bootcss.com/webui-popover/2.1.15/jquery.webui-popover.min.js"></script>
<div style="min-width:780px">
    <table width="98%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px" bgcolor="#D6D6D6" align="center">
        <tr>
            <td bgcolor="#FFFFFF" width="100%">
                <div id="_mainsearch">

                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D6D6D6">
                        <tbody><tr>
                            <td height="19" colspan="11" >
                                <table width="96%" border="0" cellspacing="1" cellpadding="1">
                                    <tbody><tr>
                                        <td width="24%" style="padding-left:10px;"><strong>Feedback管理</strong></td>
                                        <td width="76%" align="right">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr align="center" bgcolor="#23262e" height="25" class="tr-head">
                            <td height="24" width="3%">选择</td>
                            <td width="68%" align="left">Email</td>
                            <td width="18%" align="left">状态</td>
                            <td width="10%"><a href="javascript:void(0)" title="点击排序" onclick="sortContent('{$sort}')">创建时间</a>  </td>
                        </tr>

                        <volist name="list" id="item">
                            <tr align="center" bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#EEEEEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="24">
                                <td>
                                    <input type="checkbox" name="ids[]" value="{$item.id}" class="np">
                                </td>
                                <td align="left">
                                    {$item.email}
                                </td>
                                <td align="left">
                                    <if condition="($item.status eq 1) ">
                                        <span onclick="changeStatus(0,'<?php echo $item['id']?>')" style="color:green;cursor:pointer;">[激活] </span>
                                        <else /> <span onclick="changeStatus(1,'<?php echo $item['id']?>')" style="color:red;cursor:pointer;">[屏蔽]</span>
                                    </if>
                                </td>
                                <td>
                                    {$item.createtime}
                                </td>

                            </tr>
                        </volist>
                        <tr bgcolor="#ffffff">
                            <td height="24" colspan="10" >
                                &nbsp;
                                <a href="javacript:void(0)" class="btn btn-default" onclick="checkAll('ids[]')" class="coolbg">全选/反选</a>
                                <button type="button" name="delBtn" class="btn btn-default btn-sm" onclick="delComment('ids[]')" >删除</button>
                                <div style="float:right">
                                    <form name="o-form" id="o-form" method="get" action="__URL__/mgr">
                                        <span class="info">创建时间</span>
                                        <input type="text" id="startdate" name="startdate" class="input-sm " size="12" readonly value="<?php echo $startdate ?>" />
                                        -
                                        <input type="text" id="enddate" name="enddate" class="input-sm" size="12" readonly value="<?php echo $enddate ?>"/>
                                        <select name="o_status">
                                            <option value="">所有状态</option>
                                            <option value="1" <?php if($o_status === '1'){ echo "selected";} ?>>激活</option>
                                            <option value="0" <?php if($o_status === '0'){ echo "selected";} ?>>屏蔽</option>
                                        </select>
                                        <span class="info">模糊查询</span>
                                        <input type="text" name="o_keyword" size="30" placeholder="内容，关联文章" value="<?php echo $o_keyword ?>" />
                                        <input type="submit"  class="btn btn-primary"  value="  筛选  " />
                                        <input type="reset" id="reset-btn"  class="btn btn-default"  value=" 重置 " />
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr align="right" bgcolor="#F9FCEF">
                            <td height="36" colspan="11" align="center" id="pages">
                                {$page}
                            </td>
                        </tr>
                        </tbody>
                    </table>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    var isAllChecked = false;
    function checkAll(name){

        if(window.isAllChecked == false){
            $("input[name='" + name + "']").each(function(i,o){
                $(o).attr("checked", true);
                window.isAllChecked = true;
            });
        }else{
            $("input[name='" + name + "']").each(function(i,o){
                $(o).attr("checked", false);
                window.isAllChecked = false;
            });
        }

    }

    function delComment(as){
        var ass = $("input[name='" + as + "']").toArray();

        if(ass.length <= 0) return false;
        var asIdss = [];
        for(var i = 0, len = ass.length; i < len; i++){
            if(ass[i].checked){
                asIdss[asIdss.length] = ass[i].value;
            }

        }

        if(asIdss.length <= 0){
            bootbox.alert("选择一个要删除的项");
            return false;
        }

        yygcms_confirm("确认删除所选项？", function(result){
            var args = {
                "ids":asIdss.join(',')
            };
            if(result){
                $.post('__URL__/del', args, function (data, status) {
                    data = comm_parseJsonResult(data);
                    if(data){
                        window.location.reload();
                    }
                });
            }
        });

    }


    function changeStatus(s, id){
        var d = "确定将该email激活？";
        if(s == 0){
            d = "确定屏蔽该email？";
        }

        yygcms_confirm(d, function (result) {
            var args = {
                "id":id,
                "status":s
            };
            $.post('__URL__/changeStatus',args,function(data){
                data = comm_parseJsonResult(data);
                if(data == 1){
                    window.location.reload();
                }else{
                    bootbox.alert(data);
                }
            });
        });
    }


    $(function () {
        $('#startdate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });

        $('#enddate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        
        $("#reset-btn").click(function (e) {
            $("#o-form").get(0).reset();
            $('#startdate').val("");
            $('#enddate').val("");
            e.stopPropagation();
            return false;
        });
        $('.comment-brief-popover').webuiPopover();
    });


</script>
<script type="text/javascript" language="javascript" src="http://cdn.bootcss.com/bootstrap-datepicker/1.7.0/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<include file="Public:footer" />

