<include file="Public:header"/>
<div id="main">
    <div class="blank25"></div>
    <div id="webpath">
        <div class="wrap">
            <img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/home.png" onclick="window.location=&#39;/&#39;">
            <a href="/news.html">NEWS</a>
        </div>
    </div>
    <div class="wrap">
        <div class="leftmenu">
            <div class="t">News</div>
            <div class="row category_1 on">
                <div class="n1 "><a href="/news.html" title="News">News</a></div>
            </div>
        </div><!-- end of .leftmenu -->
        <script>
            $('.category_,.category_,.category_2').addClass('on');
            $('.v_').show();
        </script>
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl">NEWS</div>
            </div>
            <div class="blank25"></div>
            <div id="lib_info_detail">
                <h1><?php echo $new['title'] ?></h1>
                <div class="contents">
                    <div id="global_editor_contents">
                        <?php echo $new['content'] ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blank25"></div>

<include file="Public:footer"/>