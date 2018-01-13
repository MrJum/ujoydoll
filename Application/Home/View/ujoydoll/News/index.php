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
            <div class="rightside fr">
            	<div id="curpath">
                	<div class="fl">NEWS</div>
                    <div class="fr">There are <?php echo count($news) ?> news</div>
                </div>
                <div class="banner">
                    <div>
                        <?php if(!empty($cur_category['img'])){ ?>
                            <div><img src="<?php echo $cur_category['img'] ?>" alt=""></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="blank15"></div>
                <ul id="lib_info_list">

                <?php foreach($news as $new){ ?>
                    <li>
                    <i class="fl">•</i>
                    <h3><a href="/news/<?php echo $new['pagecode'] ?>.html" class="fl" title="<?php echo $new['title'] ?>"><?php echo $new['title'] ?></a></h3>
                    <span class="fr"><?php echo date('Y-m-d', strtotime($new['createtime'])) ?></span>
                    </li>
                <?php } ?>

    </ul>
    <div class="blank25"></div>
                   <div class="blank20"></div>
            </div>
        </div>
    </div>
    <div class="blank25"></div>

<include file="Public:footer"/>