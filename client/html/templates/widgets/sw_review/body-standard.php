<?php
$enc = $this->encoder();
global $request;
$config = [];
/*
$parse = parse_url($request->url());
$path = isset($parse['path'])?$parse['path']:'';

$parts = explode('/', trim($path, '/'));
$locale = isset($parts[0])?$parts[0]: 'ru';
$currency = isset($parts[1])?$parts[1]: 'RUB';
*/
if(\Route::current()){
    $locale = \Route::current()->parameter('locale', 'ru');
    $currency = \Route::current()->parameter('currency', 'RUB');
    
}
$params = ['locale'=> $locale, 'currency'=> $currency] ;
 \App::setLocale($locale);
 
?>
            <div id="sw_revies" data-product_id="<?= $this->detailProductItem->getId(); ?>" data-offset="0" data-limit="25"></div>
       
<?php  if(Auth::guest()){ 
    echo $enc->html( $this->translate( 'client', 'Only registered users can write review' ), $enc::TRUST ); 
?>
       
<a  class="kenne-register_btn" href="<?= $enc->attr( $this->url( 'login', null, null, $params )); ?>">
	<?php echo $enc->html( $this->translate( 'client', 'Login' ), $enc::TRUST ); ?> 
</a>                                        
<?php } else {?>           
    <form class="form-horizontal" id="form-sw_review" method="post">
        <h2><?php echo $enc->html( $this->translate( 'client', 'Write a review' ), $enc::TRUST ); ?></h2>
         <div class="col-sm-12 p-0">
                <div class="your-opinion">
                    <label><?= $this->translate( 'client', 'Please rate the product' ) ?></label>
                    <span>
                    <select class="star-rating"  name="review.rating" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option selected value="5" >5</option>
                    </select>
                </span>
                </div>
            </div>
        <div class="form-group required second-child">
            <div class="col-sm-12 p-0">
                <textarea name="review.review" class="review review-textarea" name="con_message" id="con_message" data-error="<?= $enc->html( $this->translate( 'client', 'Review is not empty' ), $enc::TRUST ); ?>"></textarea>
                <!--<div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
            </div>-->
        </div>
        <div class="form-group last-child required">

            <div class="kenne-btn-ps_right">
                <button class="kenne-btn btn-review-submit" type="button"><?= $enc->html( $this->translate( 'client', 'Send' ), $enc::TRUST ); ?></button>
            </div>
        </div>
    <input type="hidden" name="review.product_id" value="<?= $this->detailProductItem->getId(); ?>">
    <input type="hidden" name="_token" value="<?=  csrf_token()?>">
    <input type="hidden" name="filter[]" value="<?=  csrf_token()?>">
    </form>
<!--     <hr>-->                                          
<?php }?>
        <link type="text/css" rel="stylesheet" href="<?=url('swordbros/css/review.css')?>">
        <script> var locale_selector = "<?=http_build_query($params)?>"</script>
        <script type="text/javascript" defer="defer" src="<?=url('swordbros/js/review.js')?>"></script>
                                    </div>
                                
