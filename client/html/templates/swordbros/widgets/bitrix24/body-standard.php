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
?>
<style>
.b24-widget-button-wrapper.b24-widget-button-position-bottom-right, .b24-widget-button-wrapper.b24-widget-button-position-bottom-middle, .b24-widget-button-wrapper.b24-widget-button-position-bottom-left{
    margin-right: 55px;
    bottom: 43px;
    }
</style>
<script id="bx24_form_button" data-skip-moving="true">
        (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
                (w[b].forms=w[b].forms||[]).push(arguments[0])};
                if(w[b]['forms']) return;
                var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://paltoru.bitrix24.com/bitrix/js/crm/form_loader.js','b24form');

        b24form({"id":"3","lang":"en","sec":"e919ry","type":"button","click":""});
</script>
