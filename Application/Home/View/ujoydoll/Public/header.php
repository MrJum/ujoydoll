<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)http://t159.web.ueeshop.com/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="<?php echo $options->keywords ?>">
    <meta name="description" content="<?php echo $options->description ?>">
    <title>

        <?php echo $options->siteName?>
        <?php if(isset($subSiteTitle)){
            echo " - ".$subSiteTitle;
        }?>
    </title>
    <link href="__PUBLIC__/site/{$Think.THEME_NAME}/css/global.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/site/{$Think.THEME_NAME}/css/themes.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/site/{$Think.THEME_NAME}/css/user.css" rel="stylesheet" type="text/css">
    <link href="__PUBLIC__/site/{$Think.THEME_NAME}/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/en.js"></script>
    <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/global.js"></script>
    <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/themes.js"></script>
    <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/user.js"></script>
    <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/main.js"></script>
    <link href="__PUBLIC__/site/{$Think.THEME_NAME}/css/index.css" rel="stylesheet" type="text/css">
</head>
<body class="lang_en w_1200" style="">
<link type="text/css" rel="stylesheet" href="__PUBLIC__/site/{$Think.THEME_NAME}/css/open.css">

<script type="text/javascript">
    $(window).resize(function () {
        $(window).webDisplay(0);
    });
    $(window).webDisplay(0);
</script>
<div class="header clean">
    <div class="blank3"></div>
    <div class="header_top">
        <div class="fl">
            <font color="#777777"><?php echo $options->seoName ?></font>
        </div>
        <div class="hright fr">
            <div class="item i0">
                <form action="<?php echo '/product/search.html' ?>" method="get">
                    <input type="text" name="keyword" class="fl in_text" value="" placeholder="Search">
                    <input type="submit" value="" class="fl in_sub">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="w1160">
        <h1 class="logo fl pic_box">
            <a href="/">
                <img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/d8e35dd791.png" alt="lywebsite"><em></em>
            </a></h1>
        <div class="clear"></div>
    </div>
    <div class="nav">
        <div class="w1160">
            <div class="i ">
                <a href="/" class="ia">Home</a>
            </div>
            <div class="i down_nav">
                <a href="/product/all.html" class="ia">Products</a>
                <div class="sub navigation">
                    <div class="list">
                        <?php foreach($categorys as $idx=>$category){ ?>
                            <div><a href="<?php echo '/product/'.$category['pagecode'].'.html#'.$idx ?>" title="<?php echo $category['name'] ?>"><?php echo $category['name'] ?></a></div>
                        <?php } ?>
                    </div>
                </div><!-- end of .sub -->
            </div>
            <div class="i ">
                <a href="/feedback.html" class="ia">Feedback</a>
            </div>
            <div class="i ">
                <a href="/aboutus.html" class="ia">About Us</a>
            </div>
            <div class="i ">
                <a href="/news.html" class="ia">News</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div><!-- end of .header -->