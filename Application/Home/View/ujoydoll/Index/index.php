<include file="Public:header" />
<div id="main">
    <div class="blank25"></div>
    <div id="ibanner">
        <div style="overflow:hidden;">
            <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/jQuery.blockUI.js"></script>
            <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/jquery.SuperSlide.2.1.1.js"></script>
            <style type="text/css">    .slideBox_1 {
                    overflow: hidden;
                    position: relative;
                    text-align: center;
                }

                .slideBox_1 .prev, .slideBox_1 .next {
                    display: none;
                }

                .slideBox_1 .hd {
                    height: 15px;
                    overflow: hidden;
                    position: absolute;
                    bottom: 15px;
                    z-index: 1;
                }

                .slideBox_1 .hd ul {
                    overflow: hidden;
                    zoom: 1;
                    float: left;
                }

                .slideBox_1 .hd ul li {
                    float: left;
                    margin-left: 5px;
                    width: 10px;
                    height: 10px;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    background: #f1f1f1;
                    cursor: pointer;
                }

                .slideBox_1 .hd ul li:first-child {
                    margin-left: 0;
                }

                .slideBox_1 .hd ul li.on {
                    background: #f00;
                    color: #fff;
                }

                .slideBox_1 .bd {
                    position: relative;
                    height: 100%;
                    z-index: 0;
                }

                .slideBox_1 .bd ul li a {
                    display: block;
                    background-position: center top;
                    background-repeat: no-repeat;
                }

                .slideBox_1 .bd ul, .slideBox_1 .bd ul li, .slideBox_1 .bd ul li a {
                    width: 100%;
                    height: 500px;
                }</style>
            <div id="slideBox_1" class="slideBox_1 slideBox">
                <div class="hd" style="left: 931.5px;">
                    <ul>
                        <li class=""></li>
                        <li class="on"></li>
                        <li class=""></li>
                    </ul>
                </div>
                <div class="bd"><a href="javascript:;" class="prev"></a><a href="javascript:;" class="next"></a>
                    <ul>
                        <li style="display: none;"><a href="javascript:void(0);"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/slideBox/1.jpg"></a>
                        </li>
                        <li style="display: list-item;"><a href="javascript:void(0);"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/slideBox/2.jpg"></a></li>
                        <li style="display: none;"><a href="javascript:void(0);"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/slideBox/3.jpg"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">jQuery(document).ready(function () {
                    jQuery(".slideBox_1").slide({mainCell: ".bd ul", effect: "fade", autoPlay: true, interTime: 5000, showType: "bg"});
                });</script>
        </div>
    </div>
    <div id="ititle">Featured</div>
    <div class="blank25"></div>
    <div class="wrap">
        <div id="ismall">
            <a href="#" class="fl" style="overflow:hidden;"><img class="delay" src="__PUBLIC__/site/{$Think.THEME_NAME}/images/banner01.png"></a>
            <a href="#" class="fr" style="overflow:hidden;"><img class="delay" src="__PUBLIC__/site/{$Think.THEME_NAME}/images/banner02.png"></a>
        </div>
        <div class="blank25"></div>
        <div class="product_list">
            <?php foreach($hotContents as $idx=>$hotContent){ ?>
            <div class="item fl <?php echo $idx==3?' no_mar ' : '' ?> ">
                <div class="inner">
                    <div class="pic"><a href="<?php echo $hotContent['link_url'] ?>"
                                        title="<?php echo $hotContent['title'] ?>"><img class="delay"
                                                                                                         src="<?php echo $hotContent['main_img']['path'] ?>"><span></span></a>
                    </div>
                    <div class="blank9"></div>
                    <div class="name"><a href="<?php echo $hotContent['link_url'] ?>"
                                         title="<?php echo $hotContent['title'] ?>"><?php echo $hotContent['title'] ?></a></div>
                </div>
            </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
        <div class="blank20"></div>
        <div id="icase">
            <?php foreach($tuijianContents as $idx=>$tuijianContent){ ?>
            <div class="item <?php echo $idx==0?'fl':'fr' ?>">
                <div class="cpic">
                    <div class="inner pic_box"><a href="<?php echo $tuijianContent['link_url'] ?>" title="<?php echo $tuijianContent['title'] ?>"><img
                                src="<?php echo $tuijianContent['main_img']['path'] ?>"></a><em></em></div>
                    <a href="<?php echo $tuijianContent['link_url'] ?>" title="<?php echo $tuijianContent['title'] ?>" class="frame"></a>
                </div>
                <div class="text">
                    <a href="<?php echo $tuijianContent['link_url'] ?>" title="<?php echo $tuijianContent['title'] ?>" class="t"><?php echo $tuijianContent['title'] ?></a>
                    <div class="d"><?php echo mb_substr($tuijianContent['intro'], 0, 150) ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="clear"></div>
<include file="Public:footer" />