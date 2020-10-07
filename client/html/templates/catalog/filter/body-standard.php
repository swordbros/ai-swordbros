<?php



/**

 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0

 * @copyright Metaways Infosystems GmbH, 2012

 * @copyright Aimeos (aimeos.org), 2015-2020

 */





$enc = $this->encoder();





/** client/html/catalog/lists/url/target

 * Destination of the URL where the controller specified in the URL is known

 *

 * The destination can be a page ID like in a content management system or the

 * module of a software development framework. This "target" must contain or know

 * the controller that should be called by the generated URL.

 *

 * @param string Destination of the URL

 * @since 2014.03

 * @category Developer

 * @see client/html/catalog/lists/url/controller

 * @see client/html/catalog/lists/url/action

 * @see client/html/catalog/lists/url/config

 */

$listTarget = $this->config( 'client/html/catalog/lists/url/target' );



/** client/html/catalog/lists/url/controller

 * Name of the controller whose action should be called

 *

 * In Model-View-Controller (MVC) applications, the controller contains the methods

 * that create parts of the output displayed in the generated HTML page. Controller

 * names are usually alpha-numeric.

 *

 * @param string Name of the controller

 * @since 2014.03

 * @category Developer

 * @see client/html/catalog/lists/url/target

 * @see client/html/catalog/lists/url/action

 * @see client/html/catalog/lists/url/config

 */

$listController = $this->config( 'client/html/catalog/lists/url/controller', 'catalog' );



/** client/html/catalog/lists/url/action

 * Name of the action that should create the output

 *

 * In Model-View-Controller (MVC) applications, actions are the methods of a

 * controller that create parts of the output displayed in the generated HTML page.

 * Action names are usually alpha-numeric.

 *

 * @param string Name of the action

 * @since 2014.03

 * @category Developer

 * @see client/html/catalog/lists/url/target

 * @see client/html/catalog/lists/url/controller

 * @see client/html/catalog/lists/url/config

 */

$listAction = $this->config( 'client/html/catalog/lists/url/action', 'list' );



/** client/html/catalog/lists/url/config

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

 * @see client/html/catalog/lists/url/target

 * @see client/html/catalog/lists/url/controller

 * @see client/html/catalog/lists/url/action

 * @see client/html/url/config

 */

$listConfig = $this->config( 'client/html/catalog/lists/url/config', [] );



$optTarget = $this->config( 'client/jsonapi/url/target' );

$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );

$optAction = $this->config( 'client/jsonapi/url/action', 'options' );

$optConfig = $this->config( 'client/jsonapi/url/config', [] );





?>

<div id="catalog-filter" class="aimeos catalog-filter kenne-sidebar-catagories_area" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>">



	<?php if( isset( $this->filterErrorList ) ) : ?>

		<ul class="error-list">

			<?php foreach( (array) $this->filterErrorList as $errmsg ) : ?>

				<li class="error-item"><?= $enc->html( $errmsg ); ?></li>

			<?php endforeach; ?>

		</ul>

	<?php endif; ?>



	<!-- <nav> -->

				

                  <h5 class="widget-title line-bottom" style="display: none;"><?= $enc->html( $this->translate( 'client', 'Filter' ), $enc::TRUST ); ?></h5>

                 

                  <form method="GET" action="<?= $enc->attr( $this->url( $listTarget, $listController, $listAction, $this->get( 'filterParams', [] ), $listConfig ) ); ?>">



					<?= $this->block()->get( 'catalog/filter/search' ); ?>

					<?php $this->block()->get( 'catalog/filter/tree' ); ?>

				<?php /*	<?= $this->block()->get( 'catalog/filter/supplier' ); ?> */ ?>
					  
					   <div class="product-view-mode mobile" style="font-size: 25px">

                                <a class="type-item type-grid grid-3 active" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="<?=$this->translate( 'client', 'Grid View' )?>"><i class="fa fa-th"></i></a>

                                <a class="type-item type-list list" data-target="listview" data-toggle="tooltip" data-placement="top" title="<?=$this->translate( 'client', 'List View' )?> "><i class="fa fa-th-list"></i></a>
			   					<button  type="button" class="buttonfilter"  data-target="catalog-filter" data-toggle="tooltip" 
					   			data-placement="top" title="Filter" ><i class="fa fa-filter" style="font-size: 27px"></i></button>
<script type="text/javascript">
    $('.buttonfilter').on('click', function(){
       // $('.catalog-filter-attribute').toggleClass('show-mobile');
		
		  $( ".catalog-filter-attribute" ).toggle( "blind", {}, 500 );
    });
</script>
                            </div>

					<?= $this->block()->get( 'catalog/filter/attribute' ); ?>



				</form>

				

                  

			  

		

	<!-- </nav> -->



</div>

