<include file="Public:header"/>
<div id="main">
    <div class="blank25"></div>
    <include file="Public:webpath"/>
    <style type="text/css">
        .ban{ width:310px; height:510px; position:relative; overflow:hidden;}
        .ban2{ width:310px; height:310px; position:relative; overflow:hidden;}
        .ban2 ul{ position:absolute; left:0; top:0;}
        .ban2 ul li{ width:310px; height:310px;}
        .num{ height:84px;overflow:hidden; width:268px; position:relative;float:left;}
        .min_pic{ padding-top:10px;}
        .num ul{ position:absolute; left:0; top:0;}
        .num ul li{ width:82px; height:82px; margin-right:8px; padding:1px;}
        .num ul li.on{ border:1px solid red; padding:0;}
        .prev_btn1{ width:16px; text-align:center; height:18px; margin-top:40px; margin-right:6px; cursor:pointer; float:left;}
        .next_btn1{ width:16px; text-align:center; height:18px; margin-top:40px;cursor:pointer;float:right;}

        /* box */
        div.zoomDiv{z-index:999;position:absolute;top:0px;left:0px;width:310px;height:310px;background:#ffffff;border:1px solid #CCCCCC;display:none;text-align:center;overflow:hidden;}
        div.zoomMask{position:absolute;background:url("__PUBLIC__/site/{$Think.THEME_NAME}/images/mask.png") repeat scroll 0 0 transparent;cursor:move;z-index:1;}
        .mbigimg{
            max-width: none;
            max-height: none;
        }

    </style>
    <div class="wrap">
        <include file="Public:leftmenu"/>
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl"><?php echo $cur_category['name'] ?></div>
            </div>
            <div class="blank25"></div>
            <div id="d_products" class="product_list">
                <div id="pdetail">
                <!-- 代码begin -->
                <div class="ban fl" id="product_pics">
                    <div class="ban2" id="ban_pic1">
                        <ul>
                            <?php
                            foreach($attacs as $attac) {
                                ?>
                                <li><a href="javascript:;"><img src="<?php echo $attac['thumb'][2] ?>" alt="" class="jqzoom" rel="<?php echo $attac['path'] ?>"></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="min_pic">
                        <div class="prev_btn1" id="prev_btn1"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/padtab/images/feel3.png" width="9" height="18"  alt=""></div>
                        <div class="num clearfix" id="ban_num1">
                            <ul>
                                <?php
                                foreach($attacs as $attac) {
                                ?>
                                <li><a href="javascript:;"><img src="<?php echo $attac['thumb'][0] ?>" width="80" height="80" alt="" ></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="next_btn1" id="next_btn1"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/padtab/images/feel4.png" width="9" height="18"  alt=""></div>
                    </div>
                </div>
                    <div class="fr">
                        <div class="fr info pro_right">
                                <div class="pro_prev_next clean">
                                    <?php if($prev){ ?>
                                        <a href="<?php echo $prev['link_url'] ?>" title="<?php echo $prev['title'] ?>" class="prev"></a>
                                    <?php } ?>
                                    <?php if($next){ ?>
                                        <a href="<?php echo $next['link_url'] ?>" title="<?php echo $next['title'] ?>" class="next"></a>
                                    <?php } ?>
                                </div>
                            <h1 class="name"><?php echo $product['title'] ?></h1>
                            <div class="brief"><?php echo $product['intro'] ?>
                            </div>
                            <div class="blank6"></div>
                            <ul class="down_list">
                            </ul>
                            <div class="blank6"></div>
                            <div class="blank15"></div>
                            <div class="blank12"></div>
                            <div class="share">

                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>

                            </div><!-- .share -->
                            <div class="blank25"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="description">
                        <div class="hd clean">
                            <span class="cur">Description</span>
                        </div>
                        <div class="bd">
                            <div class="desc_txt" style="display:block;">
                                <div id="global_editor_contents">
                                    <?php echo $product['content'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="blank20"></div>
        </div>
    </div>
</div>
<div class="blank25"></div>
<script src="__PUBLIC__/site/{$Think.THEME_NAME}/padtab/js/pic_tab.js"></script>
<script src="__PUBLIC__/site/{$Think.THEME_NAME}/js/jquery.imagezoom.js"></script>
<script type="text/javascript">
    jQuery('#demo1').banqh({
        box:"#product_pics",//总框架
        pic:"#ban_pic1",//大图框架
        pnum:"#ban_num1",//小图框架
        prev_btn:"#prev_btn1",//小图左箭头
        next_btn:"#next_btn1",//小图右箭头
        pop_prev:"#prev2",//弹出框左箭头
        pop_next:"#next2",//弹出框右箭头
        prev:"#prev1",//大图左箭头
        next:"#next1",//大图右箭头
        pop_div:"#demo2",//弹出框框架
        pop_pic:"#ban_pic2",//弹出框图片框架
        pop_xx:".pop_up_xx",//关闭弹出框按钮
        mhc:".mhc",//朦灰层
        autoplay:false,//是否自动播放
        interTime:5000,//图片自动切换间隔
        delayTime:400,//切换一张图片时间
        pop_delayTime:400,//弹出框切换一张图片时间
        order:0,//当前显示的图片（从0开始）
        picdire:true,//大图滚动方向（true为水平方向滚动）
        mindire:true,//小图滚动方向（true为水平方向滚动）
        min_picnum:5,//小图显示数量
        pop_up:true//大图是否有弹出框
    })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".jqzoom").imagezoom();
    });

</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a5cc485b61e50c0"></script>
<include file="Public:onlineservice"/>
<include file="Public:footer"/>