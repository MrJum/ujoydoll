<include file="Public:header"/>
<div id="main">
    <div class="blank25"></div>
    <div id="webpath">
        <div class="wrap">
            <img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/home.png" onclick="window.location=&#39;/&#39;">
            <a href="/aboutus.html">ABOUT US</a>
        </div>
    </div>
    <div class="wrap">
        <div class="leftmenu">
            <div class="t">About Us</div>
            <div class="row AId_1 on">
                <div class="n1"><a href="/aboutus.html" title="About Us">About Us</a></div>
            </div>
            <!--	    	    <div class="row AId_3">-->
            <!--	        <div class="n1"><a href="http://t159.web.ueeshop.com/art/company-honor-3.html" title="Company Honor">Company Honor</a></div>-->
            <!--	    </div>-->
        </div><!-- end of .leftmenu -->
        <script>
            $('.AId_1').addClass('on');
        </script>
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl">ABOUT US</div>
            </div>
            <div class="banner">
                <div><img src="<?php echo $aboutus['main_img']['path'] ?>" alt=""></div>
            </div>
            <div class="blank25"></div>
            <div class="product_list">
                <div class="page_content">
                    <div id="global_editor_contents">
                        <?php echo $aboutus['content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blank25"></div>
<include file="Public:footer"/>