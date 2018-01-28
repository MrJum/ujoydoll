<include file="Public:header"/>
<style type="text/css">
    .fandq-div{
        margin-bottom: 18px;
        padding-bottom: 6px;
        font-size: 14px;
        font-family: "Roboto", Helvetica, Arial, sans-serif;
    }
    .fandq-div .fandq-q{
        font-weight: bold;
        line-height: 24px;
        font-size: 14px;
        background-color: #fbdcdc;
        margin-bottom: 6px;
    }
    .fandq-div .fandq-q span{
        font-weight: bold;
        margin-right: 6px;
        padding-left: 6px;
    }
    .fandq-div .fandq-a{
        line-height: 20px;
    }
    .fandq-div .fandq-a span{
        font-weight: bold;
        margin-right: 6px;
        padding-left: 6px;
    }
</style>
<div id="main">
    <div class="blank25"></div>
    <include file="Public:webpath"/>
    <div class="wrap">
        <div class="leftmenu">
            <div class="t">FAQ</div>
            <div class="row category_1 on">
                <div class="n1 "><a href="/fandq.html" title="News">FAQ</a></div>
            </div>
        </div><!-- end of .leftmenu -->
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl">FAQ</div>
            </div>
            <div class="blank15"></div>
            <div class="product_list">
                <div id="lib_feedback_form">
                    <?php foreach($fandqs as $fandq){ ?>
                        <div class="fandq-div">
                            <div class="fandq-q"><span>Q:</span><?php echo $fandq['q'] ?></div>
                            <div class="fandq-a"><span>A:</span><?php echo str_replace("\n", "<br/>", $fandq['a']) ?></div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blank25"></div>
<script>
    $(function(){
        $('#message-text').keydown(function (evt) {
            var msglen = $('#message-text').val().length;
            if(msglen > 500 && evt.key != 'Backspace'){
                $("#message-size").html(500);
                return false;
            }else{
                $("#message-size").html(msglen > 500 ? 500 : msglen);
            }
        });
        $('#message-text').keyup(function (evt) {
            var msglen = $('#message-text').val().length;
            if(msglen > 500){
                $("#message-size").html(500);
                return false;
            }else{
                $("#message-size").html(msglen > 500 ? 500 : msglen);
            }
        });
    });
</script>
<include file="Public:footer"/>