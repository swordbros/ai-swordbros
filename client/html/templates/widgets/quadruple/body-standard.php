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
<div class="for-mobile">
	
	<section class="m-main-categ">


		  <?php SwH::topMenu(); ?>
		</section>
	
	<section class="m-main-menu">
    <div class="m-main-block">
        <img src="/fe/assets/images/menu-mobil/m-pattern-01.gif" alt="">
        <a href="/#">
            <span><?=$this->translate( 'client', 'Recommended Products' )?></span>
        </a>
    </div>
    <div class="m-main-block">
        <img src="/fe/assets/images/menu-mobil/m-pattern-02.gif" alt="">
                      <a href="#" class="modal-sing" id="account-link">
                      <span><?=$this->translate( 'client', 'Featured Products' )?></span>
          </a>
    </div>
		
		
    <div class="m-main-block">
        <img src="/fe/assets/images/menu-mobil/m-pattern-03.gif" alt="">
		
				<?php $locale =  Route::current()->parameter('locale');
        $currency =  Route::current()->parameter('currency');
	$url = "/$locale/$currency/profile"?>
        <a href="<?=$url?>">
			
	
			
            <span><?=$this->translate( 'client', 'My Account' )?></span>
        </a>
    </div>
</section>
		

</div>
