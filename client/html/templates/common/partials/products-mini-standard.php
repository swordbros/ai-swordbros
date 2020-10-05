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

$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid', 'language'] ) );
?>

	<?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
		<?php $params = array_diff_key( [
    'd_name' => $productItem->getName( 'url' ), 
    'd_prodid' => $productItem->getId(), 
    'd_pos' => $position !== null ? $position++ : '' ], 
    $detailFilter ); ?>
                                   <div class="col-lg-3 col-md-3 col-sm-6">
                                  <div class="product-item">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="<?= $enc->attr( $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">
<?php $mediaItems = $productItem->getRefItems( 'media', 'default', 'default' ); ?>
<?php if($mediaItems){ 
    $i = 0;
    foreach($mediaItems as $mediaItem){
        $i++;
        if($i==1){
            $imageclass = 'primary';
        } else if($i==2){
            $imageclass = 'secondary';
        } 
?>
        
        <img class="<?=$imageclass ?>-img" src="<?= $enc->attr( $this->content( $mediaItem->getPreview() ) ); ?>">
<?php if($i>=2) break; } } ?>
														
											
                                                    </a>

    <div class="price-box-discount">

            <?= $this->partial(
    $this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ), ['prices' => $productItem->getRefItems( 'price', null, 'default' )]); ?>

    </div>
                                                </div>
                                                <div class="product-content">
<div class="product-desc_info">
    <h3 class="product-name"><a href="<?= $enc->attr( $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>"><?= $enc->html( $productItem->getName(), $enc::TRUST ); ?></a></h3>
   <?php /* <p>{{@$fp['text']['en']['short']['text.content']}}</p>*/ ?>
    <div class="price-box">

            <?= $this->partial(
    $this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ), ['prices' => $productItem->getRefItems( 'price', null, 'default' )]); ?>

    </div>
<?= paltoProductStars($productItem->getId())?>
</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

	<?php endforeach; ?>
