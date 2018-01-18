<include file="Public:header"/>
<div id="main">
    <div class="blank25"></div>
    <include file="Public:webpath"/>
    <div class="wrap">
        <include file="Public:leftmenu"/>
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl"><?php echo $cur_category['name'] ?></div>
                <div class="fr">There are <?php echo $total_count; ?> dolls</div>
            </div>
            <div class="banner">
                <?php if(!empty($cur_category['img'])){ ?>
                    <div><img src="<?php echo $cur_category['img'] ?>" alt=""></div>
                <?php } ?>
            </div>
            <div class="blank25"></div>
            <include file="Product:pagediv"/>
            <div class="blank25"></div>
            <div class="product_list">
                <?php foreach($products as $product) {?>
                    <div class="item fl i_mar mri">
                        <div class="inner">
                            <div class="pic delay"><a href="<?php echo $product['link_url'] ?>"
                                                      title="<?php echo $product['title'] ?>">
                                    <img src="<?php echo $product['main_img']['path'] ?>"><span></span></a>
                            </div>
                            <div class="blank9"></div>
                            <div class="name"><a href="<?php echo $product['link_url'] ?>"
                                                 title="<?php echo $product['title'] ?>"><?php echo $product['title'] ?></a></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="clear"></div>
            </div>
            <div class="blank20"></div>
            <div id="page">
                <include file="Product:pagediv"/>
                <div class="blank20"></div>
            </div>
        </div>
    </div>
</div>
<div class="blank25"></div>
<include file="Public:onlineservice"/>
<include file="Public:footer"/>