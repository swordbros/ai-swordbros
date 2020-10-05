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
$p = $this->get( 'listProductItems', map() );

?>
<section class="aimeos catalog-list swordbros recomended">
        <div class="product-area ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3><?=$this->translate( 'client', 'Recommended Products' )?></h3>
                            <div class="product-arrow"><span><a href="<?= $this->get( 'list_link', map() )?>"><?=$this->translate( 'client', 'View All' )?></a></span></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="shop-product-wrap grid gridview-3 row">

	<?= $this->partial(
		$this->config( 'client/html/common/partials/products', 'common/partials/products-mini-standard' ),
		array(
			'require-stock' => (int) $this->config( 'client/html/basket/require-stock', true ),
			'basket-add' => $this->config( 'client/html/catalog/lists/basket-add', false ),
			'productItems' => $this->get( 'itemsProductItems', map() ),
			'products' => $this->get( 'listProductItems', map() ),
			'position' => $this->get( 'itemPosition' ),
		)
	); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

