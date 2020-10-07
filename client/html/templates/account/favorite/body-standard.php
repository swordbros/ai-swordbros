<?php



/**

 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0

 * @copyright Metaways Infosystems GmbH, 2014

 * @copyright Aimeos (aimeos.org), 2015-2020

 */



$enc = $this->encoder();



/** client/html/account/favorite/url/target

 * Destination of the URL where the controller specified in the URL is known

 *

 * The destination can be a page ID like in a content management system or the

 * module of a software development framework. This "target" must contain or know

 * the controller that should be called by the generated URL.

 *

 * @param string Destination of the URL

 * @since 2014.09

 * @category Developer

 * @see client/html/account/favorite/url/controller

 * @see client/html/account/favorite/url/action

 * @see client/html/account/favorite/url/config

 */

$favTarget = $this->config( 'client/html/account/favorite/url/target' );



/** client/html/account/favorite/url/controller

 * Name of the controller whose action should be called

 *

 * In Model-View-Controller (MVC) applications, the controller contains the methods

 * that create parts of the output displayed in the generated HTML page. Controller

 * names are usually alpha-numeric.

 *

 * @param string Name of the controller

 * @since 2014.09

 * @category Developer

 * @see client/html/account/favorite/url/target

 * @see client/html/account/favorite/url/action

 * @see client/html/account/favorite/url/config

 */

$favController = $this->config( 'client/html/account/favorite/url/controller', 'account' );



/** client/html/account/favorite/url/action

 * Name of the action that should create the output

 *

 * In Model-View-Controller (MVC) applications, actions are the methods of a

 * controller that create parts of the output displayed in the generated HTML page.

 * Action names are usually alpha-numeric.

 *

 * @param string Name of the action

 * @since 2014.09

 * @category Developer

 * @see client/html/account/favorite/url/target

 * @see client/html/account/favorite/url/controller

 * @see client/html/account/favorite/url/config

 */

$favAction = $this->config( 'client/html/account/favorite/url/action', 'favorite' );


$watchTarget = $this->config( 'client/html/account/watch/url/target' );

$watchController = $this->config( 'client/html/account/watch/url/controller', 'account' );

$watchAction = $this->config( 'client/html/account/watch/url/action', 'watch' );

$watchConfig = $this->config( 'client/html/account/watch/url/config', [] );



/** client/html/account/favorite/url/config

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

 * @since 2014.09

 * @category Developer

 * @see client/html/account/favorite/url/target

 * @see client/html/account/favorite/url/controller

 * @see client/html/account/favorite/url/action

 * @see client/html/url/config

 */

$favConfig = $this->config( 'client/html/account/favorite/url/config', [] );



$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );

$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );

$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );



$optTarget = $this->config( 'client/jsonapi/url/target' );

$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );

$optAction = $this->config( 'client/jsonapi/url/action', 'options' );

$optConfig = $this->config( 'client/jsonapi/url/config', [] );





?>

<section class="aimeos account-favorite" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>">



	<?php if( ( $errors = $this->get( 'favoriteErrorList', [] ) ) !== [] ) : ?>

		<ul class="error-list">

			<?php foreach( $errors as $error ) : ?>

				<li class="error-item"><?= $enc->html( $error ); ?></li>

			<?php endforeach; ?>

		</ul>

	<?php endif; ?>





	<?php if( !$this->get( 'favoriteItems', map() )->isEmpty() ) : ?>



		<h4 class="header"><?= $this->translate( 'client', 'Favorite products' ); ?></h4>
	
	


<div class="col-md-12">
		<div class="favorite-items row">



			<?php foreach( $this->get( 'favoriteItems', map() )->reverse() as $listItem ) : ?>

				<?php if( ( $productItem = $listItem->getRefItem() ) !== null ) : ?>
			
		


					<?php $mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );

					$mediaItem = $mediaItems->first();

					if($mediaItem!=null)

					{

						$imgUrl = $this->content( $mediaItem->getPreview() );

					 

					}

					else

					{

						$imgUrl = '';

					}



					?>




					<?php $params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => ''], $detailFilter ); ?>
			
			
			<?php	$urls = array(

	'watch' => $this->url( $watchTarget, $watchController, $watchAction, ['wat_action' => 'add', 'wat_id' => $productItem->getId(), 'd_name' => $productItem->getName( 'url' )], $watchConfig ),



);





?>
<div class="col-md-4">
					<div class="product-item">

                                            <div class="single-product">

                                                <div class="product-img">

                                                    <a href="<?= $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">

                                                        <img class="primary-img" src="<?= $imgUrl ?>" alt="{{$fp['product']['product.label']}}">

                                                        <img class="secondary-img" src="<?= $imgUrl ?>">

                                                    </a>
													 <div class="price-box-discount">

           								 <?= $this->partial(
    						$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ), ['prices' => $productItem->getRefItems( 'price', null, 'default' )]); ?>

    												</div>

                                                   <?php /*?><div class="add-actions">

                                                        <ul>

                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="<?= $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $params, [], $detailConfig ) ); ?>" data-toggle="tooltip" data-placement="right" title="<?=$this->translate( 'client', 'Quick view' )?>"> <i class="fa fa-search"></i></a>

                                                            </li>

                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="<?=$this->translate( 'client', 'Add To Wishlist' )?>"><i

                                                                    class="fa fa-heart"></i></a>

                                                            </li>

                                                            
																
																
																<?php

	 foreach( $this->config( 'client/html/catalog/actions/list', ['watch'] ) as $entry ) : ?>

		<?php if( isset( $urls[$entry] ) ) : ?>

			<li><a href="<?= $enc->attr( $urls[$entry] ); ?>" data-toggle="tooltip" data-placement="right" title="<?=$this->translate( 'client', 'Watch' )?>">

                                                <i  class="fa fa-eye"></i>

                                            </a>

			</li>



		<?php endif; ?>

	<?php endforeach; ?>
																
																
																
														

                                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="<?=$this->translate( 'client', 'Add To Cart' )?>"><i class="ion-bag"></i></a>

                                                            </li>

                                                        </ul>

                                                    </div>
<?php */?>
                                                </div>

                                                <div class="product-content">

                                                    <div class="product-desc_info">

                                                        <h3 class="product-name"><a href="<?= $enc->attr( $this->url( $detailTarget, $detailController, $detailAction, $params, [], $detailConfig ) ); ?>"><?= $enc->html( $productItem->getName(), $enc::TRUST ); ?></a></h3>

                                                       <div class="price-box">

                                                            <?= $this->partial(

																$this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),

																array( 'prices' => $productItem->getRefItems( 'price', null, 'default' ) )

															); ?>



                                                        </div>

<?php echo paltoProductStars($productItem->getId(), ''); ?>


                                                        <div class="delete">

                                                        	<?php $params = ['fav_action' => 'delete', 'fav_id' => $listItem->getRefId()] + $this->get( 'favoriteParams', [] ); ?>

															<a class="modify" href="<?= $enc->attr( $this->url( $favTarget, $favController, $favAction, $params, [], $favConfig ) ); ?>">

																<?= $this->translate( 'client', '' ); ?>

															</a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
	</div>



					



				<?php endif; ?>

			<?php endforeach; ?>



		</div>
	</div>



		<?php if( $this->get( 'favoritePageLast', 1 ) > 1 ) : ?>



			<nav class="pagination">

				<div class="sort">

					<span>&nbsp;</span>

				</div>

				<div class="browser">



					<?php $params = array( 'fav_page' => $this->favoritePageFirst ) + $this->get( 'favoriteParams', [] ); ?>

					<a class="first" href="<?= $enc->attr( $this->url( $favTarget, $favController, $favAction, $params, [], $favConfig ) ); ?>">

						<?= $enc->html( $this->translate( 'client', '◀◀' ), $enc::TRUST ); ?>

					</a>



					<?php $params = array( 'fav_page' => $this->favoritePagePrev ) + $this->get( 'favoriteParams', [] ); ?>

					<a class="prev" href="<?= $enc->attr( $this->url( $favTarget, $favController, $favAction, $params, [], $favConfig ) ); ?>" rel="prev">

						<?= $enc->html( $this->translate( 'client', '◀' ), $enc::TRUST ); ?>

					</a>



					<span>

						<?= $enc->html( sprintf(

							$this->translate( 'client', 'Page %1$d of %2$d' ),

							$this->get( 'favoritePageCurr', 1 ),

							$this->get( 'favoritePageLast', 1 )

						) ); ?>

					</span>



					<?php $params = array( 'fav_page' => $this->favoritePageNext ) + $this->get( 'favoriteParams', [] ); ?>

					<a class="next" href="<?= $enc->attr( $this->url( $favTarget, $favController, $favAction, $params, [], $favConfig ) ); ?>" rel="next">

						<?= $enc->html( $this->translate( 'client', '▶' ), $enc::TRUST ); ?>

					</a>



					<?php $params = array( 'fav_page' => $this->favoritePageLast ) + $this->get( 'favoriteParams', [] ); ?>

					<a class="last" href="<?= $enc->attr( $this->url( $favTarget, $favController, $favAction, $params, [], $favConfig ) ); ?>">

						<?= $enc->html( $this->translate( 'client', '▶▶' ), $enc::TRUST ); ?>

					</a>



				</div>

			</nav>



		<?php endif; ?>

   <?php else: ?>
	<div class="account-info">
	<p> You have not added a favorite product to yet.</p>
	</div>
	<?php endif; ?>
	
	



</section>

