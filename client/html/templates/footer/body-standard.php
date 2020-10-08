<?php
$enc = $this->encoder();
?>
</div><div class="kenne-footer_area bg-white_color">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row footer-widgets_wrap">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>
                                    <?=$this->translate( 'client', 'Shopping' )?>
                                </h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="<?= $enc->attr( $this->url( 'about-us', null, null, ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB')], [], []) ); ?>">
                                        <?=$this->translate( 'client', 'About Us' )?>
                                        </a></li>
                                    <li><a href="#" class="b24-web-form-popup-btn-3">
                                        <?=$this->translate( 'client', 'Contact Us' )?>
                                        </a></li>
                                    <li><a href="<?=$enc->attr( $this->url( 'blog', null, 'null', ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB'), 'blog_code'=>'terms-conditions'], [], [] ) )?>" > <?=$this->translate( 'client', 'Terms & Conditions' )?></a></li>
                                    <li><a href="<?=$enc->attr( $this->url( 'blog', null, 'null', ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB'), 'blog_code'=>'privacy-policy'], [], [] ) )?>">
                                        <?=$this->translate( 'client', 'Privacy & Policy' )?>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>
                                    <?=$this->translate( 'client', 'Account' )?>
                                </h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="<?=$enc->attr( $this->url( 'login', null, 'null', ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB')], [], [] ) )?>">
                                             <?=$this->translate( 'client', 'Login' )?>
                                        </a></li>
                                    <li><a href="<?=$enc->attr( $this->url( 'register', null, 'null', ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB')], [], [] ) )?>">
                                        <?=$this->translate( 'client', 'Register' )?>
                                        </a></li>
                                    <li><a href="<?=$enc->attr( $this->url( 'blog', null, 'null', ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB'), 'blog_code'=>'help'], [], [] ) )?>">
                                        <?=$this->translate( 'client', 'Help' )?>
                                        </a></li>
                                    <li><a href="<?=$enc->attr( $this->url( 'blog', null, 'null', ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB'), 'blog_code'=>'support'], [], [] ) )?>">
                                        <?=$this->translate( 'client', 'Support' )?>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>
                                    <?=$this->translate( 'client', 'Categories' )?>
                                </h4>
                            </div>
                            <div class="footer-widgets">
                                <?php SwH::topMenu(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"><?php echo SwH::widgets('mailchimp'); ?></div>
                <?php echo SwH::widgets('bitrix24'); ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright"> <span><?=SwH::storeInfo('copyright');?></span></div>
                </div>
                <div class="col-md-6">
                    <div class="payment"> <img src="
						<?=asset('/fe/assets/images/footer/payment/1.png')?>" alt="Kenne's Payment Method"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Footer Area End Here --> 
<!-- Scroll To Top Start --> 
<a class="scroll-to-top" href=""><i class="ion-chevron-up"></i></a> 
<!-- Scroll To Top End --> 
<!-- JS
============================================ --> 
<!-- Modernizer JS --> 
<script src="<?=asset('/fe/assets/js/vendor/modernizr-2.8.3.min.js')?>"></script> 
<!-- Popper JS --> 
<script src="<?=asset('/fe/assets/js/vendor/popper.min.js')?>"></script> 
<!-- Bootstrap JS --> 
<script src="<?=asset('/fe/assets/js/vendor/bootstrap.min.js')?>"></script> 
<!-- Slick Slider JS --> 
<script src="<?=asset('/fe/assets/js/plugins/slick.min.js')?>"></script> 
<!-- Barrating JS --> 
<script src="<?=asset('/fe/assets/js/plugins/jquery.barrating.min.js')?>"></script> 
<!-- Counterup JS --> 
<script src="<?=asset('/fe/assets/js/plugins/jquery.counterup.js')?>"></script> 
<!-- Nice Select JS --> 
<script src="<?=asset('/fe/assets/js/plugins/jquery.nice-select.js')?>"></script> 
<!-- Sticky Sidebar JS --> 
<script src="<?=asset('/fe/assets/js/plugins/jquery.sticky-sidebar.js')?>"></script> 
<!-- Jquery-ui JS --> 
<script src="<?=asset('/fe/assets/js/plugins/jquery-ui.min.js')?>"></script> 
<script src="<?=asset('/fe/assets/js/plugins/jquery.ui.touch-punch.min.js')?>"></script> 
<!-- Theia Sticky Sidebar JS --> 
<script src="<?=asset('/fe/assets/js/plugins/theia-sticky-sidebar.min.js')?>"></script> 
<!-- Waypoints JS --> 
<script src="<?=asset('/fe/assets/js/plugins/waypoints.min.js')?>"></script> 
<!-- jQuery Zoom JS --> 
<script src="<?=asset('/fe/assets/js/plugins/jquery.zoom.min.js')?>"></script> 
<!-- Timecircles JS --> 
<script src="<?=asset('/fe/assets/js/plugins/timecircles.js')?>"></script> 
<!-- Swordbros JS --> 
<script src="<?=asset('/js/swordbros.js')?>"></script> 
<script src="<?=asset('/fe/assets/js/main.js')?>"></script> 
