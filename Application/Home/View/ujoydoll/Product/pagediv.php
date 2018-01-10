<div id="page">
    <div id="turn_page">
        <?php if($page_no <= 1){ ?>
            <span class="page_noclick"><em class="icon_page_prev"></em>&nbsp;</span>
        <?php }else{ ?>
            <span><a href="<?php echo '/product/'.$cur_category['pagecode'].'/'.($page_no - 1).'.html' ?>" class="page_button">&nbsp;<em class="icon_page_prev"></em></a></span>
        <?php } ?>
        <?php for($i = 1; $i <= $page_count; $i++){ ?>
            <?php if($i == $page_no){ ?>
                <span><font class="page_item_current"><?php echo $i ?></font></span>
            <?php }else{ ?>
                <span><a href="<?php echo '/product/'.$cur_category['pagecode'].'/'.$i.'.html' ?>" class="page_item"><?php echo $i ?></a></span>
            <?php } ?>
        <?php }?>
        <span class="page_last">
            <?php if($page_no >= $page_count){ ?>
                <font class="page_noclick"><em class="icon_page_next"></em>&nbsp;</font>
            <?php }else{ ?>
                <a href="<?php echo '/product/'.$cur_category['pagecode'].'/'.($page_no + 1).'.html' ?>" class="page_button">&nbsp;<em class="icon_page_next"></em></a>
            <?php } ?>
        </span>
    </div>
    <div class="blank20"></div>
</div>