<include file="Public:header"/>
<div id="main">
    <div class="blank25"></div>
    <include file="Public:webpath"/>
    <div class="wrap">
        <div class="leftmenu">
            <div class="t">FAQ</div>
            <div class="row category_1 on">
                <div class="n1 "><a href="/fandq.html" title="News">F&Q</a></div>
            </div>
        </div><!-- end of .leftmenu -->
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl">F&Q</div>
            </div>
            <div class="blank25"></div>
            <div class="product_list">
                <div id="lib_feedback_form">
                    <?php foreach($fandqs as $fandq){ ?>
                        
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