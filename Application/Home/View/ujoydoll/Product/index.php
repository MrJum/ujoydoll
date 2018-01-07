<include file="Public:header"/>
<div id="main">
    <div class="blank25"></div>
    <div id="webpath">
        <div class="wrap">
            <img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/home.png" onclick="window.location=&#39;/&#39;">
            <a href="http://t159.web.ueeshop.com/products/index.html">PRODUCTS</a>
            <a href="<?php echo '/product/'.$product['pagecode'].'.html' ?>"><?php echo $cur_product['name'] ?></a></div>
    </div>
    <div class="wrap">
        <div class="leftmenu">
            <div class="t">CATEGORIES</div>
            <?php foreach($products as $idx=>$product){ ?>
                <div class="row category_<?php echo $product['id'] ?> <?php echo $cur_product['id'] == $product['id'] ? ' on ' : " " ?>">
                    <div class="n1 "><a id="product-link-<?php echo $idx ?>" href="<?php echo '/product/'.$product['pagecode'].'.html#'.$idx ?>" title="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></a></div>
                </div>
            <?php } ?>
            <div class="blank25"></div>
            <div style="overflow:hidden;">
                <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/jQuery.blockUI.js"></script>
                <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/jquery.SuperSlide.js"></script>
                <style type="text/css">    .slideBox_4 {
                        overflow: hidden;
                        position: relative;
                        text-align: center;
                    }

                    .slideBox_4 .prev, .slideBox_4 .next {
                        display: none;
                    }

                    .slideBox_4 .hd {
                        height: 15px;
                        overflow: hidden;
                        position: absolute;
                        bottom: 15px;
                        z-index: 1;
                    }

                    .slideBox_4 .hd ul {
                        overflow: hidden;
                        zoom: 1;
                        float: left;
                    }

                    .slideBox_4 .hd ul li {
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

                    .slideBox_4 .hd ul li:first-child {
                        margin-left: 0;
                    }

                    .slideBox_4 .hd ul li.on {
                        background: #f00;
                        color: #fff;
                    }

                    .slideBox_4 .bd {
                        position: relative;
                        height: 100%;
                        z-index: 0;
                    }

                    .slideBox_4 .bd ul li a {
                        display: block;
                        background-position: center top;
                        background-repeat: no-repeat;
                    }</style>
                <div id="slideBox_4" class="slideBox_4 slideBox">
                    <div class="hd" style="left: 127.5px;">
                        <ul>
                            <li class="on"></li>
                        </ul>
                    </div>
                    <div class="bd"><a href="javascript:;" class="prev"></a><a href="javascript:;" class="next"></a>
                        <ul>
                            <li><a href="javascript:;"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/bdf2ddc9a3.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">jQuery(document).ready(function () {
                        jQuery(".slideBox_4").slide({mainCell: ".bd ul", effect: "fade", autoPlay: true, interTime: 5000});
                    });</script>
            </div>
            <div class="blank25"></div>
            <script>
                $('.category_5,.category_,.category_5').addClass('on');
                $('.v_').show();
            </script>

        </div><!-- end of .leftmenu -->
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl"><?php echo $cur_product['name'] ?></div>
                <div class="fr">There are 17 products</div>
            </div>
            <div class="banner">
                <?php if(!empty($cur_product['img'])){ ?>
                    <div><img src="<?php echo $cur_product['img'] ?>" alt=""></div>
                <?php } ?>
            </div>
            <div class="blank25"></div>
            <div id="turn_page"><span><font class="page_noclick"><em class="icon_page_prev"></em>&nbsp;</font></span><span><font class="page_item_current">1</font></span><span><a
                        href="http://t159.web.ueeshop.com/c/wedding-dresses_0005/2.html" class="page_item">2</a></span><span class="page_last"><a
                        href="http://t159.web.ueeshop.com/c/wedding-dresses_0005/2.html" class="page_button">&nbsp;<em class="icon_page_next"></em></a></span></div>
            <div class="blank25"></div>
            <div class="product_list">
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/sweetheart-floor-length-chiffon-bridesmaids-dresses-p00102p1.html"
                                                  title="Sweetheart Floor-length Chiffon Bridesmaids Dresses"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/277560a66c.jpg.500x500.jpg"><span></span></a>
                        </div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/sweetheart-floor-length-chiffon-bridesmaids-dresses-p00102p1.html"
                                             title="Sweetheart Floor-length Chiffon Bridesmaids Dresses">Sweetheart Floor-length Chiffon Bridesmaids Dresses</a></div>
                    </div>
                </div>
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00128p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/3afb082bf5.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00128p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="item fl i_mar no_mar">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00108p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/e86d92716b.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00108p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00107p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/62d55aca33.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00107p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00106p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/66a4c92f2a.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00106p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="item fl i_mar no_mar">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00105p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/24f9a55ad5.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00105p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00103p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress."><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/fb3fdf3fa6.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00103p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress.">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress.</a>
                        </div>
                    </div>
                </div>
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00023p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/af71e22d7b.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00023p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="item fl i_mar no_mar">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00022p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/cba1b7dbfb.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00022p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00016p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/38345f3735.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00016p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="item fl i_mar mri">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00014p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/5fa770b07e.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00014p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="item fl i_mar no_mar">
                    <div class="inner">
                        <div class="pic delay"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00013p1.html"
                                                  title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress"><img
                                    src="__PUBLIC__/site/{$Think.THEME_NAME}/images/7f432e30a6.jpg.500x500.jpg"><span></span></a></div>
                        <div class="blank9"></div>
                        <div class="name"><a href="http://t159.web.ueeshop.com/one-shoulder-sleeveless-ankle-length-satin-bridesmaid-dress-p00013p1.html"
                                             title="One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress">One Shoulder Sleeveless Ankle-length Satin Bridesmaid Dress</a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="blank20"></div>
            <div id="page">
                <div id="turn_page"><span><font class="page_noclick"><em class="icon_page_prev"></em>&nbsp;</font></span><span><font class="page_item_current">1</font></span><span><a
                            href="http://t159.web.ueeshop.com/c/wedding-dresses_0005/2.html" class="page_item">2</a></span><span class="page_last"><a
                            href="http://t159.web.ueeshop.com/c/wedding-dresses_0005/2.html" class="page_button">&nbsp;<em class="icon_page_next"></em></a></span></div>
                <div class="blank20"></div>
            </div>
        </div>
    </div>
</div>
<div class="blank25"></div>

<include file="Public:footer"/>