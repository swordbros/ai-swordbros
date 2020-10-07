<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016-2020
 */

/* Expected data:
 * - productItems : List of product variants incl. referenced items
 * - basket-add : True to display "add to basket" button, false if not (optional)
 * - require-stock : True if the stock level should be displayed (optional)
 * - itemprop : Schema.org property for the product items (optional)
 * - position : Position is product list to start from (optional)
 */


$enc = $this->encoder();
$position = $this->get( 'position' );

$watchTarget = $this->config( 'client/html/account/watch/url/target' );

$watchController = $this->config( 'client/html/account/watch/url/controller', 'account' );

$watchAction = $this->config( 'client/html/account/watch/url/action', 'watch' );

$watchConfig = $this->config( 'client/html/account/watch/url/config', [] );


/** client/html/catalog/detail/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2014.03
 * @category Developer
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/config
 * @see client/html/catalog/detail/url/filter
 */
$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );

/** client/html/catalog/detail/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2014.03
 * @category Developer
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/config
 * @see client/html/catalog/detail/url/filter
 */
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

/** client/html/catalog/detail/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2014.03
 * @category Developer
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/config
 * @see client/html/catalog/detail/url/filter
 */
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );

/** client/html/catalog/detail/url/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  client/html/<clientname>/url/config = array( 'absoluteUri' => true )
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2014.03
 * @category Developer
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/filter
 * @see client/html/url/config
 */
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

/** client/html/catalog/detail/url/filter
 * Removes parameters for the detail page before generating the URL
 *
 * For SEO, it's nice to have product URLs which contains the product names only.
 * Usually, product names are unique so exactly one product is found when resolving
 * the product by its name. If two or more products share the same name, it's not
 * possible to refer to the correct product and in this case, the product ID is
 * required as unique identifier.
 *
 * This setting removes the listed parameters from the URLs of the detail pages.
 *
 * @param array List of parameter names to remove
 * @since 2019.04
 * @category User
 * @category Developer
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/config
 */
$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );


?>
	<?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
<!-- product- <?=$productItem->getId()?>  -->
		<?php $params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter ); ?>

		 <div class="col-lg-4 col-md-4 col-sm-6 <?= $enc->attr( $productItem->getConfigValue( 'css-class' ) ); ?>"
			data-reqstock="<?= (int) $this->get( 'require-stock', true ); ?>"
			itemprop="<?= $this->get( 'itemprop' ); ?>"
			itemtype="http://schema.org/Product"
			itemscope="">
			
				<?php if( ( $mediaItem = $productItem->getRefItems( 'media', 'default', 'default' )->first() ) !== null ) : ?>
					<div class="product-item">
						    <div class="single-product">
						        <div class="product-img">
						            <a href="<?= $enc->attr( $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">

						            	<?php 
						            	$imageStep = 0;

						            	foreach( $productItem->getRefItems( 'media', 'default', 'default' ) as $k => $mediaItem ) : ?>
						            		<?php $imageType = 'secondary-img';
						            		if($imageStep==0){$imageType="primary-img";}
						            		if($imageStep > 1){break;}
						            		$imageStep++;
						            		?>

						            		 <img class="<?= $imageType?> <?=$k?>" src="<?= $enc->attr( $this->content( $mediaItem->getPreview() ) ); ?>" alt="<?= $enc->html( $productItem->getName(), $enc::TRUST ); ?>">
											
										<?php endforeach; ?>
						              
						            </a>
									 <div class="price-box-discount">

            <?= $this->partial(
    $this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ), ['prices' => $productItem->getRefItems( 'price', null, 'default' )]); ?>

    </div>
									
									
									<?php	$urls = array(

	'watch' => $this->url( $watchTarget, $watchController, $watchAction, ['wat_action' => 'add', 'wat_id' => $productItem->getId(), 'd_name' => $productItem->getName( 'url' )], $watchConfig ),



);





?>


						            <div class="add-actions">
                                                <ul>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="<?= $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $params, [], $detailConfig ) ); ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?=$this->translate( 'client', 'Quick view' )?>"><i class="fa fa-search"></i></a>
                                                    </li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?=$this->translate( 'client', 'Add To Wishlist' )?>"><i class="fa fa-heart"></i></a>
                                                    </li>
													
													
													<?php

	 foreach( $this->config( 'client/html/catalog/actions/list', ['watch'] ) as $entry ) : ?>

		<?php if( isset( $urls[$entry] ) ) : ?>

			<li><a href="<?= $enc->attr( $urls[$entry] );  ?> "
				   data-toggle="tooltip" data-placement="right" title="<?=$this->translate( 'client', 'Watch' )?>">

                                                <i  class="fa fa-eye"></i>

                                            </a>

			</li>



		<?php endif; ?>

	<?php endforeach; ?>

                                                </ul>
                                            </div>
						           
						        </div>
						        <div class="product-content">
						            <div class="product-desc_info">
						                <h3 class="product-name"><a href="<?= $enc->attr( $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>"><?= $enc->html( $productItem->getName(), $enc::TRUST ); ?></a></h3>
						                <div class="price-box">

						                	<?= $this->partial(
												$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
												array( 'prices' => $productItem->getRefItems( 'price', null, 'default' )->first() ?: map() )
											); ?>
						                    <!-- <span class="new-price">$46.91</span>
						                    <span class="old-price">$50.99</span> -->
						                </div>
<?= paltoProductStars($productItem->getId())?>
						            </div>
						        </div>
						    </div>
						</div>
						<div class="list-product_item">
					    <div class="single-product">
					        <div class="product-img">
					           <a href="<?= $enc->attr( $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">

						            	<?php 
						            	$imageStep = 0;

						            	foreach( $productItem->getRefItems( 'media', 'default', 'default' ) as $k => $mediaItem ) : ?>
						            		<?php $imageType = 'secondary-img';
						            		if($imageStep==0){$imageType="primary-img";}
						            		if($imageStep > 1){break;}
						            		$imageStep++;
						            		?>

						            		 <img class="<?= $imageType?> <?=$k?>" src="<?= $enc->attr( $this->content( $mediaItem->getPreview() ) ); ?>" alt="<?= $enc->html( $productItem->getName(), $enc::TRUST ); ?>" style="max-height: 200px; width: auto;">
											
										<?php endforeach; ?>
						              
						            </a>
									<?php /*?> <div class="price-box-discount">

            <?= $this->partial(
    $this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ), ['prices' => $productItem->getRefItems( 'price', null, 'default' )]); ?>

    </div><?php */?>
					        </div>
					        <div class="product-content">
					            <div class="product-desc_info">
					                <div class="price-box">
					                    <?= $this->partial(
												$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
												array( 'prices' => $productItem->getRefItems( 'price', null, 'default' )->first() ?: map() )
											); ?>
					                </div>
					                <h6 class="product-name"><a href="<?= $enc->attr( $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>"><?= $enc->html( $productItem->getName(), $enc::TRUST ); ?></a></h6>
<?= paltoProductStars($productItem->getId())?>
					                <div class="product-short_desc">
					                	<?php foreach( $productItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>

											<p>
												<?= $enc->html( $textItem->getContent(), $enc::TRUST ); ?>
											</p>

										<?php endforeach; ?>
					                   
					                </div>
					            </div>
					            <div class="add-actions">
					                <ul>
					                     <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="<?= $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $params, [], $detailConfig ) ); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$this->translate( 'client', 'Quick view' )?>"><i class="fa fa-search"></i></a>
                                                    </li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$this->translate( 'client', 'Add To Wishlist' )?>"><i class="fa fa-heart"></i></a>
                                                    </li>
													
													
													<?php

	 foreach( $this->config( 'client/html/catalog/actions/list', ['watch'] ) as $entry ) : ?>

		<?php if( isset( $urls[$entry] ) ) : ?>

			<li><a href="<?= $enc->attr( $urls[$entry] );  ?> "
				   data-toggle="tooltip" data-placement="top" title="<?=$this->translate( 'client', 'Watch' )?>">

                                                <i  class="fa fa-eye"></i>

                                            </a>

			</li>



		<?php endif; ?>

	<?php endforeach; ?>

					                </ul>
					            </div>
					        </div>
					    </div>
					</div>
                    

			<?php endif; ?>

		</div>

	<?php endforeach; ?>