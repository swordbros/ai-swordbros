<?php
$enc = $this->encoder();
global $request;

$parse = parse_url($request->url());
$path = isset($parse['path'])?$parse['path']:'';

$parts = explode('/', trim($path, '/'));
$locale = isset($parts[0])?$parts[0]: 'ru';
$currency = isset($parts[1])?$parts[1]: 'RUB';
if(\Route::current()){
    $locale = \Route::current()->parameter('locale', $locale);
    $currency = \Route::current()->parameter('currency', $currency);
    
}
$parameters = ['locale'=> $locale, 'currency'=> $currency, 'blog_code'=>'terms-conditions'] ;
 \App::setLocale($locale);
?><div class="newsletter-area"> 
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/3516d2816b90615281eb78780/6a179d9800956dcd9f3c55b2e.js");</script>
    <div class="newsletter-logo"> <a href="javascript:void(0)"> <img src="<?=asset('/fe/assets/images/palto-logo.png')?>" alt="Logo" style="max-width: 150px"> </a> </div>
    <p class="short-desc"><?=$this->translate( 'client', 'Subscribe to our newsleter' )?></p>
    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
</style>
    <div id="mc_embed_signup">
        <form action="https://palto.us17.list-manage.com/subscribe/post?u=3516d2816b90615281eb78780&amp;id=1c72668adc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
                <div class="mc-field-group"> 
                    <!--<label for="mce-EMAIL"> <strong> E-Mail Address </strong> </label>-->
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder=" <?=$this->translate( 'client', 'Your e-mail' )?>">
                    <div class="clear">
                        <input type="submit" value=" <?=$this->translate( 'client', 'Subscribe' )?>" name="subscribe" id="mc-embedded-subscribe" class="button">
                    </div>
                </div>
                <div class="mc-field-group input-group">
                    <div style="margin-right: 15px">
                        <input type="radio" value="Female" name="MMERGE6" id="mce-MMERGE6-1"  checked>
                        <label for="mce-MMERGE6-1">
                            <?=$this->translate( 'client', 'Women' )?>
                        </label>
                    </div>
                    <div>
                        <input type="radio" value="Male" name="MMERGE6" id="mce-MMERGE6-0">
                        <label for="mce-MMERGE6-0">
                            <?=$this->translate( 'client', 'Men' )?>
                        </label>
                    </div>
                </div>
                <div class="mc-field-group input-group">
                    <div>
                        <input type="checkbox" value="Yes" name="MMERGE7" id="mce-MMERGE7-0" class="required" required>
                        <label for="mce-MMERGE7-0">
                            <?=$this->translate( 'client', 'I accept the' )?>
                            <a  href="<?=$enc->attr( app('url')->route( 'legal', $parameters) )?>" class="sw_popup"> <u>
                            <?=$this->translate( 'client', 'Terms & Conditions' )?>
                            </u></a> </label>
                    </div>
                </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>
                
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_3516d2816b90615281eb78780_1c72668adc" tabindex="-1" value="">
                </div>
            </div>
        </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';fnames[6]='MMERGE6';ftypes[6]='radio';}(jQuery));var $mcj = jQuery.noConflict(true);</script> 
    <!--End mc_embed_signup--> 
</div>
