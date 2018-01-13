<include file="Public:header"/>
<div id="main">
    <div class="blank25"></div>
    <include file="Public:webpath"/>
    <div class="wrap">
        <include file="Public:leftmenu"/>
        <div class="rightside fr">
            <div id="curpath">
                <div class="fl">FEEDBACK</div>
            </div>
            <div class="blank25"></div>
            <div class="product_list">
                <div id="lib_feedback_form">
                    <form method="post" name="feedback">
                        <div class="rows">
                            <label>Company: <font class="fc_red">*</font></label>
                            <span><input name="Company" type="text" class="input" size="30" maxlength="100" notnull=""></span>
                            <div class="clear"></div>
                        </div>
                        <div class="rows">
                            <label>Phone: </label>
                            <span><input name="Phone" type="text" class="input" size="30" maxlength="20"></span>
                            <div class="clear"></div>
                        </div>
                        <div class="rows">
                            <label>Email: <font class="fc_red">*</font></label>
                            <span><input name="Email" type="text" class="input" size="30" maxlength="100" format="Email" notnull=""></span>
                            <div class="clear"></div>
                        </div>
                        <div class="rows">
                            <label>Subject: <font class="fc_red">*</font></label>
                            <span><input name="Subject" type="text" class="input" size="50" maxlength="50" notnull=""></span>
                            <div class="clear"></div>
                        </div>
                        <div class="rows">
                            <label>Message: <font class="fc_red">*</font></label>
                            <span><textarea id="message-text" name="Message" class="form_area contents" notnull=""></textarea> (<span style="color:red;display: inline;float: none;padding: 0" id="message-size">0</span>/500) </span>
                            <div class="clear"></div>
                        </div>
                        <div class="rows">
                            <label>Code Shown: <font class="fc_red">*</font></label>
                            <span><input name="VCode" type="text" class="input vcode" size="4" maxlength="4" notnull=""><br>
                                <img src="<?php echo site_url('feedback/verifyCode')?>" onclick="this.src='<?php echo site_url('feedback/verifyCode')?>?t='+Math.random();" style="cursor:pointer;"></span>
                            <div class="clear"></div>
                        </div>
                        <div class="rows">
                            <label></label>
                            <span><input name="Submit" type="submit" class="form_button" value="Submit"></span>
                            <div class="clear"></div>
                        </div>
                        <input type="hidden" name="Site" value="en">
                    </form>
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
            console.log(evt);
            if(msglen > 500 && evt.key != 'Backspace'){
                $("#message-size").html(500);
                return false;
            }else{
                $("#message-size").html(msglen > 500 ? 500 : msglen);
            }

        });
    });
</script>
<include file="Public:footer"/>