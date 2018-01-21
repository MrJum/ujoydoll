<!-- end of .wrap -->
<div id="footer">
    <div id="ftop">
        <div class="fl flogo"><img src="__PUBLIC__/site/{$Think.THEME_NAME}/images/d8e35dd791.png" alt="lywebsite"></div>
        <div class="fl address">
            <div class="t">KEEP IN TOUCH</div>
            <div class="r">
                <span class="i0"></span>
                <font><a href="tel:+8615986783597" title="vagasnail@gmail.com">+8615986783597</a></font>
            </div>
            <div class="r">
                <span class="i1"></span>
                <a href="skype:nancyzeng0089?chat">nancyzeng0089</a>
            </div>
            <div class="r">
                <span class="i2"></span>
                <a href="mailto:vagasnail@gmail.com" title="vagasnail@gmail.com">vagasnail@gmail.com</a>
            </div>
        </div>
        <div class="fl follow">
            <div class="t">Follow Us</div>
            <div class="r">
                <span class="i0"></span>
                <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=#"
                   target="_blank">Facebook</a>
            </div>
            <div class="r">
                <span class="i1"></span>
                <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=#"
                   target="_blank">Twitter</a>
            </div>
            <div class="r">
                <span class="i2"></span>
                <a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url=#"
                   target="_blank">Google Plus</a>
            </div>
        </div>
        <div class="fr newsletter">
            <div class="t">newsletter</div>
            <div class="tips">Subscribe free newsletter to get latest products and discount information.</div>
            <form id="newsletter">
                <input type="text" name="Email" class="text fl" placeholder="E-mail" notnull="">
                <input type="image" src="__PUBLIC__/site/{$Think.THEME_NAME}/images/lsub.png" class="fl">
            </form>
        </div>
    </div>
    <div id="fbot" class="copyright">
        <?php echo $options->copyright ?></div>
</div>
<div align="center">
    <script type="text/javascript" src="__PUBLIC__/site/{$Think.THEME_NAME}/js/analytics.js"></script>
    <script src="__PUBLIC__/site/{$Think.THEME_NAME}/js/fixed.toper.js"></script>
</div>
<div id="footer_feedback" class="up" style="bottom: -270px;">
    <div class="title" style=" background:#FE456F;">
        Leave a message <a class="close" href="javascript:void(0);"></a>
    </div>
    <div id="lib_feedback_form">
        <form method="post" name="feedback">
            <div class="demo">
                <div class="blank6"></div>
                <div class="tips_title">Your name<font color="red">*</font>:</div>
                <div class="blank6"></div>
                <input type="text" class="text" name="Name" placeholder="Your name(Required)" notnull="">
                <div class="blank15"></div>
                <div class="tips_title">Your E-mail<font color="red">*</font>:</div>
                <div class="blank6"></div>
                <input type="text" class="text" name="Email" placeholder="Your E-mail(Required)" notnull="">
                <div class="blank15"></div>
                <div class="tips_title">Got a question?<font color="red">*</font>:</div>
                <div class="blank6"></div>
                <textarea class="text" name="Message" placeholder="Got a question?(Required)" notnull=""></textarea>
                <div class="blank15"></div>
                <input type="hidden" name="float" value="207889f7a5631606ee1d21e96a5d09d7">
                <input type="submit" class="send" value="Send" style=" background:#FE456F;">
                <input type="hidden" name="Site" value="en">
                <input type="hidden" name="type" value="message">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var uhref = window.location.href;
        var upos = uhref.lastIndexOf('#')
        if(upos !== -1){
            var pidx = uhref.substring(upos + 1);
            pidx = parseInt(pidx);
            var tarpp = $("#product-link-" + pidx).get(0);
            if(tarpp && jQuery.type(tarpp.scrollIntoViewIfNeeded) === "function"){
                tarpp.scrollIntoViewIfNeeded();
            }
        }
    });
</script>
<?php if(!APP_DEBUG){ ?>
<a title="Real Time Web Analytics" href="http://clicky.com/101096743"><img alt="Real Time Web Analytics" src="//static.getclicky.com/media/links/badge.gif" border="0" /></a>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(101096743); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/101096743ns.gif" /></p></noscript>
<?php }?>
</body>
</html>