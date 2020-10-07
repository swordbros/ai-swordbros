<?php



/**

 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0

 * @copyright Metaways Infosystems GmbH, 2014

 * @copyright Aimeos (aimeos.org), 2015-2020

 */



$enc = $this->encoder();





/** client/html/locale/select/language/url/config

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

$config = $this->config( 'client/html/locale/select/language/url/config', [] );

?>

<?php $this->block()->start( 'locale/select/language' ); ?>

<?php /* <div class="locale-select-language">

	<h2 class="header"><?= $this->translate( 'client', 'Select language' ); ?></h2>*/ ?>

	 <!-- <li><a href="javascript:void(0)"><?= $this->translate( 'client', 'Select language' ); ?> <i class="ion-chevron-down"></i></a> -->

                                            

	<!-- <ul class="ht-dropdown locale-select-language"> -->



		<li class="desktop-menu-item select-dropdown select-current"><a href="#" title="<?= $this->translate( 'client', 'Select language' ); ?>"><img class="locale-icon" src="/fe/assets/images/lang/<?=$this->get( 'selectLanguageId', 'en' )?>.png?v=1"><i class="ion-chevron-down"></i><i class="icon ion-ios-plus-empty" ></i></a>

			<ul class="ht-dropdown locale-select-language">



				<?php foreach( $this->get( 'selectMap', [] ) as $lang => $list ) : ?>

					<li class="select-item <?= ( $lang === $this->get( 'selectLanguageId', 'en' ) ? 'active' : '' ); ?>">

						<a href="<?= $enc->attr( $this->url( $this->request()->getTarget(), $this->param( 'controller' ), $this->param( 'action' ), array_merge( $this->get( 'selectParams', [] ), $list[$this->get( 'selectCurrencyId', 'EUR' )] ?? current( $list ) ), [], $config ) ); ?>">

							<img  class="locale-icon" src="/fe/assets/images/lang/<?=$lang?>.png" > <?= $enc->html( $this->translate( 'language', $lang ), $enc::TRUST ); ?>

						</a>
						  <?php   $lang =Route::current()->parameter('locale');
						         \App::setLocale($lang);  ?>
					</li>

				<?php endforeach; ?>



			</ul>

		</li>
<li class="mobile-menu-item menu-item-has-children"><!--<span class="menu-expand"><i class="ion-ios-plus-empty"></i></span>-->
<a href="##"><?= $enc->html( $this->translate( 'language', $lang ), $enc::TRUST ); ?>

</a>	
	</a>
<ul class="sub-menu" style="display: none;">
				<?php foreach( $this->get( 'selectMap', [] ) as $lang => $list ) : ?>
<li class=" <?= ( $lang === $this->get( 'selectLanguageId', 'en' ) ? 'active' : '' ); ?>"><a href="<?= $enc->attr( $this->url( $this->request()->getTarget(), $this->param( 'controller' ), $this->param( 'action' ), array_merge( $this->get( 'selectParams', [] ), $list[$this->get( 'selectCurrencyId', 'EUR' )] ?? current( $list ) ), [], $config ) ); ?>"><img  class="locale-icon" src="/fe/assets/images/lang/<?=$lang?>.png" > <?= $enc->html( $this->translate( 'language', $lang ), $enc::TRUST ); ?></a></li>
	


				<?php endforeach; ?>


  
</ul>
</li>
<!-- 	</ul>

</li> -->



<?php /*</div>*/ ?>

<?php $this->block()->stop(); ?>

<?= $this->block()->get( 'locale/select/language' ); ?>

