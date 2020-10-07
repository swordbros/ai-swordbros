<?php
/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2020
 */
/* Available data:
 * - detailProductItem : Product item incl. referenced items
 */
$enc = $this->encoder();
$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );
$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );
$basketSite = $this->config( 'client/html/basket/standard/url/site' );
/** client/html/basket/require-stock
 * Customers can order products only if there are enough products in stock
 *
 * Checks that the requested product quantity is in stock before
 * the customer can add them to his basket and order them. If there
 * are not enough products available, the customer will get a notice.
 *
 * @param boolean True if products must be in stock, false if products can be sold without stock
 * @since 2014.03
 * @category Developer
 * @category User
 */
$reqstock = (int) $this->config( 'client/html/basket/require-stock', true );
?>
<?php if( isset( $this->detailProductItem ) ) : ?>
 
        <!-- Begin Kenne's Single Product Variable Area -->
        <div class="sp-area">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-6">
                        	
                            <div class="sp-img_area">
                            	<?= $this->partial(
								$this->config( 'client/html/catalog/detail/partials/image', 'catalog/detail/image-partial-standard' ),
								['mediaItems' => $this->get( 'detailMediaItems', map() ), 'params' => $this->param()]
							); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sp-content catalog-detail">
                                <div class="sp-heading">
                                    <h5><a href="#"><?= $enc->html( $this->detailProductItem->getName(), $enc::TRUST ); ?></a></h5>
                                </div>
                                <span class="reference">
                                <span class="name"><?= $enc->html( $this->translate( 'client', 'Reference.' ), $enc::TRUST ); ?>: </span>
						         <span class="value" itemprop="sku"><?= $enc->html( $this->detailProductItem->getCode() ); ?></span>
                            	</span>
 <?php  echo paltoProductStars($this->detailProductItem->getId(), ''); ?>
                                <?php foreach( $this->detailProductItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
										<p class="short short-description" itemprop="description"><?= $enc->html( $textItem->getContent(), $enc::TRUST ); ?></p>
									<?php endforeach; ?>
									<?= $this->partial(
								$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
										['prices' => $this->detailProductItem->getRefItems( 'price', null, 'default' )]
									); ?>
                                <!-- <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Brands <a href="javascript:void(0)">Buxton</a></li>
                                        <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                        <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                                        <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                                        <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
                                        <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                                    </ul>
                                </div> -->
                              <!--   <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                </div>
                                <div class="color-list_area">
                                    <div class="color-list_heading">
                                        <h4>Available Options</h4>
                                    </div>
                                    <span class="sub-title">Color</span>
                                    <div class="color-list">
                                        <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                            <span class="bg-red_color"></span>
                                            <span class="color-text">Red (+$150)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                            <span class="burnt-orange_color"></span>
                                            <span class="color-text">Orange (+$170)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                            <span class="brown_color"></span>
                                            <span class="color-text">Brown (+$120)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                            <span class="raw-umber_color"></span>
                                            <span class="color-text">Umber (+$125)</span>
                                        </a>
                                        <a href="javascript:void(0)" class="single-color" data-swatch-color="black">
                                            <span class="black_color"></span>
                                            <span class="color-text">Black (+$125)</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <div class="qty-btn_area">
                                    <ul>
                                        <li><a class="qty-cart_btn" href="cart.html">Add To Cart</a></li>
                                        <li><a class="qty-wishlist_btn" href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                        <li><a class="qty-compare_btn" href="compare.html" data-toggle="tooltip" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li>
                                    </ul>
                                </div>
                                <div class="kenne-tag-line">
                                    <h6>Tags:</h6>
                                    <a href="javascript:void(0)">scarf</a>,
                                    <a href="javascript:void(0)">jacket</a>,
                                    <a href="javascript:void(0)">shirt</a>
                                </div>
                                <div class="kenne-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com" data-toggle="tooltip" target="_blank" title="Youtube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                                <div class="catalog-detail-basket" data-reqstock="<?= $reqstock; ?>" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
									<div class="price-list font-18">
										<div class="articleitem price price-actual"
											data-prodid="<?= $enc->attr( $this->detailProductItem->getId() ); ?>"
											data-prodcode="<?= $enc->attr( $this->detailProductItem->getCode() ); ?>">
											<?= $this->partial(
												$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
												['prices' => $this->detailProductItem->getRefItems( 'price', null, 'default' )]
											); ?>
										</div>
										<?php if( $this->detailProductItem->getType() === 'select' ) : ?>
											<?php foreach( $this->detailProductItem->getRefItems( 'product', 'default', 'default' ) as $prodid => $product ) : ?>
												<?php if( !( $prices = $product->getRefItems( 'price', null, 'default' ) )->isEmpty() ) : ?>
													<div class="articleitem price"
														data-prodid="<?= $enc->attr( $prodid ); ?>"
														data-prodcode="<?= $enc->attr( $product->getCode() ); ?>">
														<?= $this->partial(
															$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
															['prices' => $prices]
														); ?>
													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
									<?= $this->block()->get( 'catalog/detail/service' ); ?>
									<form method="POST" action="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, ( $basketSite ? ['site' => $basketSite] : [] ), [], $basketConfig ) ); ?>">
										<!-- catalog.detail.csrf -->
										<?= $this->csrf()->formfield(); ?>
										<!-- catalog.detail.csrf -->
										<?php if( $basketSite ) : ?>
											<input type="hidden" name="<?= $this->formparam( 'site' ) ?>" value="<?= $enc->attr( $basketSite ) ?>" />
										<?php endif ?>
										<?php if( $this->detailProductItem->getType() === 'select' ) : ?>
											<div class="catalog-detail-basket-selection">
												<?= $this->partial(
													/** client/html/common/partials/selection
													 * Relative path to the variant attribute partial template file
													 *
													 * Partials are templates which are reused in other templates and generate
													 * reoccuring blocks filled with data from the assigned values. The selection
													 * partial creates an HTML block for a list of variant product attributes
													 * assigned to a selection product a customer must select from.
													 *
													 * The partial template files are usually stored in the templates/partials/ folder
													 * of the core or the extensions. The configured path to the partial file must
													 * be relative to the templates/ folder, e.g. "partials/selection-standard.php".
													 *
													 * @param string Relative path to the template file
													 * @since 2015.04
													 * @category Developer
													 * @see client/html/common/partials/attribute
													 */
													$this->config( 'client/html/common/partials/selection', 'common/partials/selection-standard' ),
													['productItems' => $this->detailProductItem->getRefItems( 'product', 'default', 'default' )]
												); ?>
											</div>
										<?php endif; ?>
										<div class="catalog-detail-basket-attribute">
											<?= $this->partial(
												/** client/html/common/partials/attribute
												 * Relative path to the product attribute partial template file
												 *
												 * Partials are templates which are reused in other templates and generate
												 * reoccuring blocks filled with data from the assigned values. The attribute
												 * partial creates an HTML block for a list of optional product attributes a
												 * customer can select from.
												 *
												 * The partial template files are usually stored in the templates/partials/ folder
												 * of the core or the extensions. The configured path to the partial file must
												 * be relative to the templates/ folder, e.g. "partials/attribute-standard.php".
												 *
												 * @param string Relative path to the template file
												 * @since 2016.01
												 * @category Developer
												 * @see client/html/common/partials/selection
												 */
												$this->config( 'client/html/common/partials/attribute', 'common/partials/attribute-standard' ),
												['productItem' => $this->detailProductItem]
											); ?>
										</div>
										<div class="stock-list">
											<div class="articleitem stock-actual"
												data-prodid="<?= $enc->attr( $this->detailProductItem->getId() ); ?>"
												data-prodcode="<?= $enc->attr( $this->detailProductItem->getCode() ); ?>">
											</div>
											<?php foreach( $this->detailProductItem->getRefItems( 'product', null, 'default' ) as $articleId => $articleItem ) : ?>
												<div class="articleitem"
													data-prodid="<?= $enc->attr( $articleId ); ?>"
													data-prodcode="<?= $enc->attr( $articleItem->getCode() ); ?>">
												</div>
											<?php endforeach; ?>
										</div>
										<div class="addbasket input-group" style="line-height: 36px;">
											<div class="quantity" style="width: 12%;
                                            line-height: 40px;
                                            height: 40px;
                                            margin-right: -8px;padding-top: 0px;">
												<!-- <label style="width: 30%"> Quantity:</label> -->
												<input type="hidden" value="add" name="<?= $enc->attr( $this->formparam( 'b_action' ) ); ?>" />
												<input type="hidden"
													name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'prodid'] ) ); ?>"
													value="<?= $enc->attr( $this->detailProductItem->getId() ); ?>"
												/>
												<input type="number" class="form-control input-lg" <?= !$this->detailProductItem->isAvailable() ? 'disabled' : '' ?>
													name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'quantity'] ) ); ?>"
													min="<?= $this->detailProductItem->getConfigValue( 'quantity-step', 1 ) ?>" max="2147483647"
													step="<?= $this->detailProductItem->getConfigValue( 'quantity-step', 1 ) ?>" maxlength="10"
													required="required" value="1" style="
                                            line-height: 40px;
                                            height: 40px;
                                            "
												 />
												</div>
												 <div class="qty-btn_area" style="background-color: #a8741a;background-color: #000000;
                                                    width: 89%;color:white;padding-top: 0px;">
												<button class="btn qty-cart_btn" type="submit" value="" <?= !$this->detailProductItem->isAvailable() ? 'disabled' : '' ?> style="background-color: #000000;
                                                width: 100%;
                                                /* height: 40px; */
                                                line-height: 39px;
                                                margin-left: 0px;font-size: 20px;color:white;   ">
													<?= $enc->html( $this->translate( 'client', 'Add to basket' ), $enc::TRUST ); ?>
												</button>
													</div>
											
										</div>
									</form>
								</div>
								<?= $this->partial(
									/** client/html/catalog/partials/actions
									 * Relative path to the catalog actions partial template file
									 *
									 * Partials are templates which are reused in other templates and generate
									 * reoccuring blocks filled with data from the assigned values. The actions
									 * partial creates an HTML block for the product actions (pin, like and watch
									 * products).
									 *
									 * @param string Relative path to the template file
									 * @since 2017.04
									 * @category Developer
									 */
									$this->config( 'client/html/catalog/partials/actions', 'catalog/actions-partial-standard' ),
									['productItem' => $this->detailProductItem]
								); ?>
								<?= $this->partial(
									/** client/html/catalog/partials/social
									 * Relative path to the social partial template file
									 *
									 * Partials are templates which are reused in other templates and generate
									 * reoccuring blocks filled with data from the assigned values. The social
									 * partial creates an HTML block for links to social platforms in the
									 * catalog components.
									 *
									 * @param string Relative path to the template file
									 * @since 2017.04
									 * @category Developer
									 */
									$this->config( 'client/html/catalog/partials/social', 'catalog/social-partial-standard' ),
									['productItem' => $this->detailProductItem]
								); ?>
                            </div>
                           
				
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kenne's Single Product Variable Area End Here -->
    <?php endif; ?>
    <div class="product-tab_area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
<section class="aimeos catalog-detail product" itemscope="" itemtype="http://schema.org/Product" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>">
	<?php if( isset( $this->detailErrorList ) ) : ?> 
		<ul class="error-list">
			<?php foreach( (array) $this->detailErrorList as $errmsg ) : ?>
				<li class="error-item"><?= $enc->html( $errmsg ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<?php if( isset( $this->detailProductItem ) ) : ?>
        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                   <?php if( !( $textItems = $this->detailProductItem->getRefItems( 'text', 'long' ) )->isEmpty() ) : ?>
                                    <li><a class="active" data-toggle="tab" href="#description"><span><?= $enc->html( $this->translate( 'client', 'Description' ), $enc::TRUST ); ?></span></a>
                                    </li>
                                <?php endif; ?>
                               <?php if( !( $attrMap = $this->get( 'detailAttributeMap', map() ) )->isEmpty() ) : ?>
                                    <li><a data-toggle="tab" href="#characteristics"><span><?= $enc->html( $this->translate( 'client', 'Characteristics' ), $enc::TRUST ); ?></span></a></li>
                                    <?php endif; ?>
                                    <?php if( !( $propMap = $this->get( 'detailPropertyMap', map() ) )->isEmpty() ) : ?>
                                    <li><a data-toggle="tab" href="#properties"><span><?= $enc->html( $this->translate( 'client', 'Properties' ), $enc::TRUST ); ?></span></a></li>
                                    <?php endif; ?>
                                <?php if( !( $mediaItems = $this->detailProductItem->getRefItems( 'media', 'download' ) )->isEmpty() ) : ?>
                                    <li><a data-toggle="tab" href="#downloads"><span><?= $enc->html( $this->translate( 'client', 'Downloads' ), $enc::TRUST ); ?></span></a></li>
                                    <?php endif; ?>
                                     <li><a data-toggle="tab" href="#reviews"><span><?= $enc->html( $this->translate( 'client', 'Reviews' ), $enc::TRUST ); ?> <span id="product-reviews-count"></span></span></a></li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                                 <?php if( !( $textItems = $this->detailProductItem->getRefItems( 'text', 'long' ) )->isEmpty() ) : ?>
                                 <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="content description product-description">
                                        <?php foreach( $textItems as $textItem ) : ?>
                                            <div class="long item"><?= $enc->html( $textItem->getContent(), $enc::TRUST ); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                 </div>
                                   
                                <?php endif; ?>
                               <?php if( !( $attrMap = $this->get( 'detailAttributeMap', map() ) )->isEmpty() ) : ?>
                                     <div id="characteristics" class="tab-pane" role="tabpanel">
                                        <div class="content attributes">
                                                <table class="attributes">
                                                    <tbody>
                                                        <?php foreach( $attrMap as $type => $attrItems ) : ?>
                                                            <?php foreach( $attrItems as $attrItem ) : ?>
                                                                <tr class="item <?= ( $id = $attrItem->get( 'parent' ) ) ? 'subproduct subproduct-' . $id : '' ?>">
                                                                    <td class="name"><?= $enc->html( $this->translate( 'client/code', $type ), $enc::TRUST ); ?></td>
                                                                    <td class="value">
                                                                        <div class="media-list">
                                                                            <?php foreach( $attrItem->getListItems( 'media', 'icon' ) as $listItem ) : ?>
                                                                                <?php if( ( $refitem = $listItem->getRefItem() ) !== null ) : ?>
                                                                                    <?= $this->partial(
                                                                                        $this->config( 'client/html/common/partials/media', 'common/partials/media-standard' ),
                                                                                        ['item' => $refitem, 'boxAttributes' => ['class' => 'media-item']]
                                                                                    ); ?>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                        <span class="attr-name"><?= $enc->html( $attrItem->getName() ); ?></span>
                                                                        <?php foreach( $attrItem->getRefItems( 'text', 'short' ) as $textItem ) : ?>
                                                                            <div class="attr-short"><?= $enc->html( $textItem->getContent() ); ?></div>
                                                                        <?php endforeach ?>
                                                                        <?php foreach( $attrItem->getRefItems( 'text', 'long' ) as $textItem ) : ?>
                                                                            <div class="attr-long"><?= $enc->html( $textItem->getContent() ); ?></div>
                                                                        <?php endforeach ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if( !( $propMap = $this->get( 'detailPropertyMap', map() ) )->isEmpty() ) : ?>
                                    <div id="properties" class="tab-pane" role="tabpanel">
                                        <div class="content properties">
                                            <table class="properties">
                                                <tbody>
                                                    <?php foreach( $propMap as $type => $propItems ) : ?>
                                                        <?php foreach( $propItems as $propItem ) : ?>
                                                            <tr class="item <?= ( $id = $propItem->get( 'parent' ) ) ? 'subproduct subproduct-' . $id : '' ?>">
                                                                <td class="name"><?= $enc->html( $this->translate( 'client/code', $propItem->getType() ), $enc::TRUST ); ?></td>
                                                                <td class="value"><?= $enc->html( $propItem->getValue() ); ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php if( !( $mediaItems = $this->detailProductItem->getRefItems( 'media', 'download' ) )->isEmpty() ) : ?>
                                   <div id="downloads" class="tab-pane" role="tabpanel">
                                    <ul class="content downloads">
                                        <?php foreach( $mediaItems as $id => $item ) : ?>
                                            <li class="item">
                                                <a href="<?= $this->content( $item->getUrl() ); ?>" title="<?= $enc->attr( $item->getName() ); ?>">
                                                    <img class="media-image"
                                                        src="<?= $this->content( $item->getPreview() ); ?>"
                                                        alt="<?= $enc->attr( $item->getName() ); ?>"
                                                    />
                                                    <span class="media-name"><?= $enc->html( $item->getName() ); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    </div>
                                    <?php endif; ?>
                                
                                <div id="reviews" class="tab-pane" role="tabpanel">
                                    <div class="tab-pane active" id="tab-review">
            <div id="sw_revies" data-product_id="<?= $this->detailProductItem->getId(); ?>" data-offset="0" data-limit="25"></div>
         
<?php  if(Auth::guest()){ 
    echo $enc->html( $this->translate( 'client', 'Only registered users can write review' ), $enc::TRUST ); 
?> <?php $locale =  Route::current()->parameter('locale');
        $currency =  Route::current()->parameter('currency');
	$url = "/$locale/$currency/login"?>
       
<a  class="kenne-register_btn" href="<?=$url?>">
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
                                                    <textarea name="review.review" class="review review-textarea" name="con_message" id="con_message"></textarea>
                                                    <!--<div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                                </div>-->
                                            </div>
                                            <div class="form-group last-child required">
                                               
                                                <div class="kenne-btn-ps_right">
                                                    <button class="kenne-btn btn-review-submit"><?= $enc->html( $this->translate( 'client', 'Send' ), $enc::TRUST ); ?></button>
                                                </div>
                                            </div>
    <input type="hidden" name="review.product_id" value="<?= $this->detailProductItem->getId(); ?>">
    <input type="hidden" name="_token" value="<?=  csrf_token()?>">
    <input type="hidden" name="filter[]" value="<?=  csrf_token()?>">
                                        </form>
                                   <!--     <hr>-->
                                            
<?php }?>
        <link type="text/css" rel="stylesheet" href="/css/sw-review.css">
        <script type="text/javascript" defer="defer" src="/js/sw-review.js"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
		<article class="product row <?= $this->detailProductItem->getConfigValue( 'css-class' ) ?>" data-id="<?= $this->detailProductItem->getId(); ?>">
			
			<div class="col-sm-12">
				<?php if( $this->detailProductItem->getType() === 'bundle' && !( $products = $this->detailProductItem->getRefItems( 'product', null, 'default' ) )->isEmpty() ) : ?>
					<section class="catalog-detail-bundle">
						<h3 class="header"><?= $this->translate( 'client', 'Bundled products' ); ?></h3>
						<?= $this->partial(
							$this->config( 'client/html/common/partials/products', 'common/partials/products-standard' ),
							['products' => $products, 'itemprop' => 'isRelatedTo']
						); ?>
					</section>
				<?php endif; ?>
				
				<?php if( !( $products = $this->detailProductItem->getRefItems( 'product', null, 'suggestion' ) )->isEmpty() ) : ?>
                <div class="product-area pb-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h3><?= $this->translate( 'client', 'Suggested products' ); ?></h3>
                                    <div class="product-arrow"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 kenne-content_wrapper">
                                        <div class="catalog-list-items shop-product-wrap row grid gridview-4">
                                    <?= $this->partial(
                                        $this->config( 'client/html/common/partials/products', 'common/partials/products-standard' ),
                                        ['products' => $products, 'itemprop' => 'isRelatedTo']
                                    ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
				<?php endif; ?>
				<?php if( !( $products = $this->detailProductItem->getRefItems( 'product', null, 'bought-together' ) )->isEmpty() ) : ?>
                 <div class="product-area pb-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h3><?= $this->translate( 'client', 'Other customers also bought' ); ?></h3>
                                    <div class="product-arrow"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 kenne-content_wrapper">
                                        <div class="catalog-list-items shop-product-wrap row grid gridview-4">
                                    <?= $this->partial(
                                        $this->config( 'client/html/common/partials/products', 'common/partials/products-standard' ),
                                        ['products' => $products, 'itemprop' => 'isRelatedTo']
                                    ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				
				<?php endif; ?>
				<?php $this->block()->get( 'catalog/detail/supplier' ); ?>
			</div>
		</article>
	<?php endif; ?>
</section>
</div>
</div>
</div>
</div>
