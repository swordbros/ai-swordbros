<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2020
 */

$enc = $this->encoder();
$target = $this->config( 'client/html/catalog/lists/url/target' );
$cntl = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );
$action = $this->config( 'client/html/catalog/lists/url/action', 'list' );
$config = $this->config( 'client/html/catalog/lists/url/config', [] );

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );


/** client/html/catalog/lists/head/text-types
 * The list of text types that should be rendered in the catalog list head section
 *
 * The head section of the catalog list view at least consists of the category
 * name. By default, all short and long descriptions of the category are rendered
 * as well.
 *
 * You can add more text types or remove ones that should be displayed by
 * modifying these list of text types, e.g. if you've added a new text type
 * and texts of that type to some or all categories.
 *
 * @param array List of text type names
 * @since 2014.03
 * @category User
 * @category Developer
 */
$textTypes = $this->config( 'client/html/catalog/lists/head/text-types', array( 'short', 'long' ) );


/** client/html/catalog/lists/pagination/enable
 * Enables or disables pagination in list views
 *
 * Pagination is automatically hidden if there are not enough products in the
 * category or search result. But sometimes you don't want to show the pagination
 * at all, e.g. if you implement infinite scrolling by loading more results
 * dynamically using AJAX.
 *
 * @param boolean True for enabling, false for disabling pagination
 * @since 2019.04
 * @category User
 * @category Developer
 */

/** client/html/catalog/lists/partials/pagination
 * Relative path to the pagination partial template file for catalog lists
 *
 * Partials are templates which are reused in other templates and generate
 * reoccuring blocks filled with data from the assigned values. The pagination
 * partial creates an HTML block containing a page browser and sorting links
 * if necessary.
 *
 * @param string Relative path to the template file
 * @since 2017.01
 * @category Developer
 */
$params = ['locale'=> \Route::current()->parameter('locale','ru'), 'currency'=> \Route::current()->parameter('currency','RUB')];
?>
        <div class="header-bottom_area d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu_area position-relative">
                            <nav class="main-nav d-flex justify-content-center1"> 
<?php if( isset( $this->categories ) ) :?>
    <ul class="menuzord-menu dark">
        <?php 
        if($this->categories->hasChildren()){ ?>
            <?php foreach(  $this->categories->getChildren() as $topcategory  ){ ?>
                <li><a href="<?= $enc->attr( $this->url( $topcategory->getTarget() ?: $target, $cntl, $action, array_merge( $this->get( 'params', [] ), $params, ['f_name' => $topcategory->getName( 'url' ), 'f_catid' => $topcategory->getId()] ), [], $config ) ); ?>"><?=$topcategory->getName()?><i class="ion-chevron-down"></i></a>
                    <ul class="dropdown kenne-dropdown">
                    <?php  if($topcategory->hasChildren()){ ?>
                        <?php foreach(  $topcategory->getChildren() as $item  ){?>
                              <li><a href="<?= $enc->attr( $this->url( $item->getTarget() ?: $target, $cntl, $action, array_merge( $this->get( 'params', [] ), $params, ['f_name' => $item->getName( 'url' ), 'f_catid' => $item->getId()] ), [], $config ) ); ?>"><?=$item->getName();?></a> 
                        <?php } ?>
                     <?php } ?>
                    </ul>
               <li>
            <?php }  ?>
        <?php }  ?>
    </ul>
<?php endif; ?>
                           </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu_wrapper" id="mobileMenu">
            <div class="offcanvas-menu-inner">
                <div class="container"> <a href="#" class="btn-close white-close_btn"><i class="ion-android-close"></i></a>
					<?php $locale =  Route::current()->parameter('locale');
        $currency =  Route::current()->parameter('currency');
	$url = "/$locale/$currency/home"?>
					
                    <div class="offcanvas-inner_logo"> <a href="<?=$url?>"> <img src="<?=asset('/fe/assets/images/palto-logo.png')?>" alt="Header Logo" style="max-width: 100%;"> </a> </div>
                    <nav class="offcanvas-navigation">
<?php if( isset( $this->categories ) ) :?>
    <ul class="mobile-menu">
        <?php 
        if($this->categories->hasChildren()){ ?>
            <?php foreach(  $this->categories->getChildren() as $topcategory  ){ ?>
                    <?php   $menu_class = $topcategory->hasChildren()?'menu-item-has-children':''; ?>
                <li class="<?=$menu_class?>">
                    <a href="<?= $enc->attr( $this->url( $topcategory->getTarget() ?: $target, $cntl, $action, array_merge( $this->get( 'params', []), $params , ['f_name' => $topcategory->getName( 'url' ), 'f_catid' => $topcategory->getId()] ), [], $config ) ); ?>"><?=$topcategory->getName()?></a>
                    <?php  if($topcategory->hasChildren()){ ?>
                    <ul class="sub-menu">
                        <?php foreach(  $topcategory->getChildren() as $item  ){?>
                              <li><a href="<?= $enc->attr( $this->url( $item->getTarget() ?: $target, $cntl, $action, array_merge( $this->get( 'params', []), $params , ['f_name' => $item->getName( 'url' ), 'f_catid' => $item->getId()] ), [], $config ) ); ?>"><?=$item->getName();?></a></li>
                        <?php } ?>
                    </ul>
                     <?php } ?>
               </li>
            <?php }  ?>
        <?php }  ?>
    </ul>
<?php endif; ?>

                        
                    </nav>
                    <nav class="offcanvas-navigation user-setting_area">
                        <ul class="mobile-menu ">
							
							<?php  echo \Aimeos\Shop\Facades\Shop::get('locale/select')->getBody() ?>
                            <?php if (Auth::guest()){ ?>
                            <li class="nav-item user"><a class="nav-link" href="<?= $enc->attr( $this->url('login',$cntl, $action ,$params)); ?>"><?=$this->translate( 'client', 'Login' )?></a></li>
                            <li class="nav-item user"><a class="nav-link" href="<?= $enc->attr( $this->url('register',$cntl, $action ,$params)); ?>"><?=$this->translate( 'client', 'Register' )?></a></li>
                            <?php } else { 
    $user_label = Auth::user()->name !='' ? Auth::user()->name:Auth::user()->firstname.' '.Auth::user()->lastname;?>
                            <li class="nav-item  menu-item-has-children"> <a href="#" ><?php  echo $user_label; ?> <i class="ion-chevron-down" style="display: none"></i></a>
                                <ul class="sub-menu " >
                                    <li  class="nav-link"><a class="nav-link" href="<?= $enc->attr( $this->url('aimeos_shop_account',null, null, [])); ?>" title="Profile"><?=$this->translate( 'client', 'Profile' )?></a></li>
                                    <li class="nav-link">
                                        <form id="logout" action="/logout" method="POST">
                                            <?=csrf_field()?>
                                        </form>
                                        <a class="nav-link" href="javascript: document.getElementById('logout').submit();"><?=$this->translate( 'client', 'Logout' )?></a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
				<?= SwH::socialbar()?>
            </div>
			
			
			
        </div>

