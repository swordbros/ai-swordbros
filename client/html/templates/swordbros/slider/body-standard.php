<style>
.carousel-item .slide-content {
    bottom: 59px;
    position: absolute;
    padding: 10px;
    background: rgba(255,255,255, .7);
    width: 50%;
    text-align: center;
    right: 20px;
}
</style>
<div class="main_banner" >
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
      <?php if(isset($this->images) && !empty($this->images)):?>
      <?php foreach($this->images as $key=>$slide){?>
    <div class="carousel-item <?php if($key==0) echo 'active';?>">
      <img class="d-block w-100" src="<?=asset($slide['image_url'])?>" alt="<?=$slide['image_url']?>">
        <div class="slide-content"><a class="slide-url" href="<?=$slide['url']?>"><?=$slide['content']?></a></div>
    </div>
      <?php } ?>
      <?php endif; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script type="text/javascript">
      $(document).ready(function(){
          $('.carousel').carousel();
      });
  </script>
</div>

<div class="for-mobile">
	
	<section class="m-main-categ">


		<?php paltoTopMenu(); ?>
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
