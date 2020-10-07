<?php



/**

 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0

 * @copyright Metaways Infosystems GmbH, 2012

 * @copyright Aimeos (aimeos.org), 2015-2020

 */



$enc = $this->encoder();





if( $this->param( 'f_catid' ) !== null )

{

	$target = $this->config( 'client/html/catalog/tree/url/target' );

	$cntl = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );

	$action = $this->config( 'client/html/catalog/tree/url/action', 'tree' );

	$config = $this->config( 'client/html/catalog/tree/url/config', [] );

}

else

{

	$target = $this->config( 'client/html/catalog/lists/url/target' );

	$cntl = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );

	$action = $this->config( 'client/html/catalog/lists/url/action', 'list' );

	$config = $this->config( 'client/html/catalog/lists/url/config', [] );

}



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



if( $this->get( 'params/f_catid' ) !== null )

{

	$listTarget = $this->config( 'client/html/catalog/tree/url/target' );

	$listController = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );

	$listAction = $this->config( 'client/html/catalog/tree/url/action', 'tree' );

	$listConfig = $this->config( 'client/html/catalog/tree/url/config', [] );

}

else

{

	$listTarget = $this->config( 'client/html/catalog/lists/url/target' );

	$listController = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );

	$listAction = $this->config( 'client/html/catalog/lists/url/action', 'list' );

	$listConfig = $this->config( 'client/html/catalog/lists/url/config', [] );

}



$params = $this->get( 'params', [] );

$sort = $this->get( 'params/f_sort', $this->config( 'client/html/catalog/lists/sort', 'relevance' ) );

$sortname = ltrim( $sort, '-' );

$nameDir = $priceDir = '';



if( $sort === 'name' ) {

	$nameSort = $this->translate( 'client', '▼ Name' ); $nameDir = '-';

} else if( $sort === '-name' ) {

	$nameSort = $this->translate( 'client', '▲ Name' );

} else {

	$nameSort = $this->translate( 'client', 'Name' );

}



if( $sort === 'price' ) {

	$priceSort = $this->translate( 'client', '▼ Price' ); $priceDir = '-';

} else if( $sort === '-price' ) {

	$priceSort = $this->translate( 'client', '▲ Price' );

} else {

	$priceSort = $this->translate( 'client', 'Price' );

}



?>







<!-- <section class="aimeos catalog-list <?= $enc->attr( $this->get( 'listCatPath', map() )->getConfigValue( 'css-class', '' )->join( ' ' ) ); ?>" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>"> -->



	

                                  	<?php if( isset( $this->listErrorList ) ) : ?>

		<ul class="error-list">

			<?php foreach( (array) $this->listErrorList as $errmsg ) : ?>

				<li class="error-item"><?= $enc->html( $errmsg ); ?></li>

			<?php endforeach; ?>

		</ul>

	<?php endif; ?>





	<?php if( ( $catItem = $this->get( 'listCatPath', map() )->last() ) !== null ) : ?>



	

		<div class="catalog-list-head" style="display: none;">



			<div class="imagelist-default">

				<?php foreach( $catItem->getRefItems( 'media', 'default', 'default' ) as $mediaItem ) : ?>

					<img class="<?= $enc->attr( $mediaItem->getType() ); ?>"

						src="<?= $this->content( $mediaItem->getUrl() ); ?>"

					/>

				<?php endforeach; ?>

			</div>



			<h1><?= $enc->html( $catItem->getName() ); ?></h1>

			<?php foreach( (array) $textTypes as $textType ) : ?>

				<?php foreach( $catItem->getRefItems( 'text', $textType, 'default' ) as $textItem ) : ?>

					<div class="<?= $enc->attr( $textItem->getType() ); ?>">

						<?= $enc->html( $textItem->getContent(), $enc::TRUST ); ?>

					</div>

				<?php endforeach; ?>

			<?php endforeach; ?>



		</div>

	<?php endif; ?>



	<?php /* $this->block()->get( 'catalog/lists/promo' );*/ ?>



	<?php if( $this->get( 'listProductTotal', 0 ) > 0 ) : ?>

		<?php /*<div class="catalog-list-type">

			<a class="type-item type-grid" href="<?= $enc->attr( $this->url( $target, $cntl, $action, array( 'l_type' => 'grid' ) + $this->get( 'listParams', [] ), [], $config ) ); ?>"></a>

			<a class="type-item type-list" href="<?= $enc->attr( $this->url( $target, $cntl, $action, array( 'l_type' => 'list' ) + $this->get( 'listParams', [] ), [], $config ) ); ?>"></a>

		</div> */ ?>

		<div class="shop-toolbar">
		 <div class="product-view-mode" id="desktop-view">

                                <a class="type-item type-grid grid-3 active" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="<?=$this->translate( 'client', 'Grid View' )?>"><i class="fa fa-th"></i></a>

                                <a class="type-item type-list list" data-target="listview" data-toggle="tooltip" data-placement="top" title="<?=$this->translate( 'client', 'List View' )?> "><i class="fa fa-th-list"></i></a>
			   					
                            </div>





           <div class="product-page_count">

                                <p><?=$this->translate( 'client', 'Found' )?> <?=$this->get( 'listProductTotal', 0 )?> <?=$this->translate( 'client', 'results' )?></p>

                            </div>

            <div class="product-item-selection_area">

                                <div class="product-short">

                                    <label class="select-label"><?= $enc->html( $this->translate( 'client', 'Sort by:' ), $enc::TRUST ); ?></label>

                                    <select class="nice-select myniceselect" onchange="location = this.value;">

                            							<?php $url = $this->url( $listTarget, $listController, $listAction, array( 'f_sort' => 'relevance' ) + $params, [], $listConfig ); ?>

							<option value="<?= $enc->attr( $url ); ?>" <?= ( $sort === 'relevance' ? 'selected' : '' ); ?>>

								<?= $enc->html( $this->translate( 'client', 'Relevance' ), $enc::TRUST ); ?>

							</option>

							<?php $url = $this->url( $listTarget, $listController, $listAction, array( 'f_sort' => '-ctime' ) + $params, [], $listConfig ); ?>

							<option value="<?= $enc->attr( $url ); ?>" <?= ( $sort === '-ctime' ? 'selected' : '' ); ?>>

								<?= $enc->html( $this->translate( 'client', 'Latest' ), $enc::TRUST ); ?>

							</option>

							<?php $url = $this->url( $listTarget, $listController, $listAction, array( 'f_sort' => 'name' ) + $params, [], $listConfig ); ?>

							<option value="<?= $enc->attr( $url ); ?>" <?= ( $sort === 'name' ? 'selected' : '' ); ?>>

								<?= $enc->html( $nameSort, $enc::TRUST ); ?>

							</option>

							<?php $url = $this->url( $listTarget, $listController, $listAction, array( 'f_sort' => 'price' ) + $params, [], $listConfig ); ?>

							<option value="<?= $enc->attr( $url ); ?>" <?= ( $sort === 'price' ? 'selected' : '' ); ?>>

								<?= $enc->html( $priceSort, $enc::TRUST ); ?>

							</option>

							

                                    </select>

                                </div>

                            </div>



                        </div>





	<?php endif; ?>






	<?php if( ( $searchText = $this->param( 'f_search', null ) ) != null ) : ?>

		<div class="list-search">



			<?php if( ( $total = $this->get( 'listProductTotal', 0 ) ) > 0 ) : ?>

				<?= $enc->html( sprintf(

					$this->translate(

						'client',

						'Search result for <span class="searchstring">"%1$s"</span> (%2$d article)',

						'Search result for <span class="searchstring">"%1$s"</span> (%2$d articles)',

						$total

					),

					$searchText,

					$total

				), $enc::TRUST ); ?>

			<?php else : ?>

				<?= $enc->html( sprintf(

					$this->translate(

						'client',

						'No articles found for <span class="searchstring">"%1$s"</span>. Please try again with a different keyword.'

					),

					$searchText

				), $enc::TRUST ); ?>

			<?php endif; ?>



		</div>

	<?php endif; ?>

	

	<?= $this->block()->get( 'catalog/lists/items' ); ?>

	

	<?php if( $this->get( 'listProductTotal', 0 ) > 0 && $this->config( 'client/html/catalog/lists/pagination/enable', true ) ) : ?>

		<?= $this->partial(

				$this->config( 'client/html/catalog/lists/partials/pagination', 'catalog/lists/pagination-standard' ),

				array(

					'params' => $this->get( 'listParams', [] ),

					'size' => $this->get( 'listPageSize', 48 ),

					'total' => $this->get( 'listProductTotal', 0 ),

					'current' => $this->get( 'listPageCurr', 0 ),

					'prev' => $this->get( 'listPagePrev', 0 ),

					'next' => $this->get( 'listPageNext', 0 ),

					'last' => $this->get( 'listPageLast', 0 ),

				)

			);

		?>

	<?php endif ?>





<!-- </section> -->

