<?php



/**

 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0

 * @copyright Metaways Infosystems GmbH, 2014

 * @copyright Aimeos (aimeos.org), 2015-2020

 */



$enc = $this->encoder();





/** client/html/locale/select/currency/url/config

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

 */

$config = $this->config( 'client/html/locale/select/currency/url/config', [] );





?>

<?php $this->block()->start( 'locale/select/currency' ); ?>

<!-- <div class="locale-select-currency" style="display: none;"> -->

	<!-- <h2 class="header"><?= $this->translate( 'client', 'Select currency' ); ?></h2> -->

	<!-- <li><a href="javascript:void(0)"><?= $this->translate( 'client', 'Select currency' ); ?> <i class="ion-chevron-down"></i></a> -->



	<!-- <ul class="select-menu ht-dropdown locale-select-currency"> -->

		<li class="desktop-menu-item  select-dropdown select-current"><a href="#">

            <img class="locale-icon" src="/fe/assets/images/currency/<?= $this->get( 'selectCurrencyId', 'EUR' ); ?>.png?v=2"><i class="ion-chevron-down"></i><i class="icon ion-ios-plus-empty" ></i></a>

			<ul class="select-dropdown ht-dropdown locale-select-currency">



				<?php foreach( $this->get( 'selectMap', map() )->get( $this->get( 'selectLanguageId', 'en' ), [] ) as $currency => $locParam ) : ?>

					<li class="select-item <?= ( $currency === $this->get( 'selectCurrencyId', 'EUR' ) ? 'active' : '' ); ?>">

						<a href="<?= $enc->attr( $this->url( $this->request()->getTarget(), $this->param( 'controller' ), $this->param( 'action' ), array_merge( $this->get( 'selectParams', [] ), $locParam ), [], $config ) ); ?>">

							<?= $enc->html( $this->translate( 'currency', $currency ), $enc::TRUST ); ?>

						</a>

					</li>

				<?php endforeach; ?>



			</ul>

		</li>
<li class="mobile-menu-item menu-item-has-children"><!--<span class="menu-expand"><i class="ion-ios-plus-empty"></i></span>-->
<a href="##">
<?php  $currency = $this->get( 'selectCurrencyId', 'EUR' ); ?>
							<?= $enc->html( $this->translate( 'currency', $currency ), $enc::TRUST ); ?>

						</a>
	
	
<ul class="sub-menu" style="display: none;">
				<?php foreach( $this->get( 'selectMap', map() )->get( $this->get( 'selectLanguageId', 'en' ), [] ) as $currency => $locParam ) : ?>

					<li class="select-item <?= ( $currency === $this->get( 'selectCurrencyId', 'EUR' ) ? 'active' : '' ); ?>">

						<a href="<?= $enc->attr( $this->url( $this->request()->getTarget(), $this->param( 'controller' ), $this->param( 'action' ), array_merge( $this->get( 'selectParams', [] ), $locParam ), [], $config ) ); ?>">

							<?= $enc->html( $this->translate( 'currency', $currency ), $enc::TRUST ); ?>

						</a>

					</li>

				<?php endforeach; ?>



  
</ul>
</li>
	<!-- </ul>

</li> -->



<!-- </div> -->

<?php $this->block()->stop(); ?>

<?= $this->block()->get( 'locale/select/currency' ); ?>

