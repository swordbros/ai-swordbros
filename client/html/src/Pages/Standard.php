<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2020
 * @package Client
 * @subpackage Html
 */


namespace Aimeos\Client\Html\Swordbros\Pages;


/**
 * Default implementation of swordbros list section HTML clients.
 *
 * @package Client
 * @subpackage Html
 */
class Standard
	extends \Aimeos\Client\Html\Common\Client\Factory\Base
	implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{

	private $subPartPath = 'client/html/swordbros/pages/standard/subparts';
	private $subPartNames = array( 'items' );

	private $tags = [];
	private $expire;
	private $view;
	private $uid;

	public function getBody( string $uid = '' ) : string
	{
        $this->uid = $uid;
		$prefixes = array( 'f', 'l' );
		$context = $this->getContext();
		$confkey = 'client/html/swordbros/pages';

		if( ( $html = $this->getCached( 'body', $uid, $prefixes, $confkey ) ) === null )
		{
			$view = $this->getView();

			$tplconf = 'client/html/pages/standard/template-body';
			$default = 'pages/body-standard';

			try
			{
				if( !isset( $this->view ) ) {
					$view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
				}

				$html = '';
				foreach( $this->getSubClients() as $subclient ) {
					$html .= $subclient->setView( $view )->getBody( $uid );
				}
				$view->listBody = $html;

				$html = $view->render( $this->getTemplatePath( $tplconf, $default ) );
				$this->setCached( 'body', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

				return $html;
			}
			catch( \Aimeos\Client\Html\Exception $e )
			{
				$error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
				$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
			}
			catch( \Aimeos\Controller\Frontend\Exception $e )
			{
				$error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
				$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
			}
			catch( \Aimeos\MShop\Exception $e )
			{
				$error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
				$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
			}
			catch( \Exception $e )
			{
				$error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
				$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
				$this->logException( $e );
			}

			$html = $view->render( $this->getTemplatePath( $tplconf, $default ) );
		}
		else
		{
			$html = $this->modifyBody( $html, $uid );
		}

		return $html;
	}


	/**
	 * Returns the HTML string for insertion into the header.
	 *
	 * @param string $uid Unique identifier for the output if the content is placed more than once on the same page
	 * @return string|null String including HTML tags for the header on error
	 */
	public function getHeader( string $uid = '' ) : ?string
	{
        $this->uid = $uid;
		$prefixes = array( 'f', 'l' );
		$confkey = 'client/html/swordbros/pages';

		if( ( $html = $this->getCached( 'header', $uid, $prefixes, $confkey ) ) === null )
		{
			$view = $this->getView();

			$tplconf = 'client/html/pages/standard/template-header';
			$default = 'pages/header-standard';

			try
			{
				if( !isset( $this->view ) ) {
					$view = $this->view = $this->getObject()->addData( $view, $this->tags, $this->expire );
				}

				$html = '';
				foreach( $this->getSubClients() as $subclient ) {
					$html .= $subclient->setView( $view )->getHeader( $uid );
				}
				$view->listHeader = $html;

				$html = $view->render( $this->getTemplatePath( $tplconf, $default ) );
				$this->setCached( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );

				return $html;
			}
			catch( \Exception $e )
			{
				$this->logException( $e );
			}
		}
		else
		{
			$html = $this->modifyHeader( $html, $uid );
		}

		return $html;
	}


	/**
	 * Returns the sub-client given by its name.
	 *
	 * @param string $type Name of the client type
	 * @param string|null $name Name of the sub-client (Default if null)
	 * @return \Aimeos\Client\Html\Iface Sub-client object
	 */
	public function getSubClient( string $type, string $name = null ) : \Aimeos\Client\Html\Iface
	{

		return $this->createSubClient( 'swordbros/pages/' . $type, $name );
	}


	/**
	 * Processes the input, e.g. store given values.
	 *
	 * A view must be available and this method doesn't generate any output
	 * besides setting view variables if necessary.
	 */
	public function process()
	{
		$context = $this->getContext();
		$view = $this->getView();

		try
		{
			$site = $context->getLocale()->getSiteItem()->getCode();
			$params = $this->getClientParams( $view->param() );

			$catId = $context->getConfig()->get( 'client/html/swordbros/pages/catid-default' );

			if( ( $catId = $view->param( 'f_catid', $catId ) ) )
			{
				$params['f_name'] = $view->param( 'f_name' );
				$params['f_catid'] = $catId;
			}

			$context->getSession()->set( 'aimeos/swordbros/pages/params/last/' . $site, $params );

			parent::process();
		}
		catch( \Aimeos\Client\Html\Exception $e )
		{
			$error = array( $context->getI18n()->dt( 'client', $e->getMessage() ) );
			$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
		}
		catch( \Aimeos\Controller\Frontend\Exception $e )
		{
			$error = array( $context->getI18n()->dt( 'controller/frontend', $e->getMessage() ) );
			$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
		}
		catch( \Aimeos\MShop\Exception $e )
		{
			$error = array( $context->getI18n()->dt( 'mshop', $e->getMessage() ) );
			$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
		}
		catch( \Exception $e )
		{
			$error = array( $context->getI18n()->dt( 'client', 'A non-recoverable error occured' ) );
			$view->listErrorList = array_merge( $view->get( 'listErrorList', [] ), $error );
			$this->logException( $e );
		}
	}


	/**
	 * Returns the list of sub-client names configured for the client.
	 *
	 * @return array List of HTML client names
	 */
	protected function getSubClientNames() : array
	{
		return $this->getContext()->getConfig()->get( $this->subPartPath, $this->subPartNames );
	}


	/**
	 * Sets the necessary parameter values in the view.
	 *
	 * @param \Aimeos\MW\View\Iface $view The view object which generates the HTML output
	 * @param array &$tags Result array for the list of tags that are associated to the output
	 * @param string|null &$expire Result variable for the expiration date of the output (null for no expiry)
	 * @return \Aimeos\MW\View\Iface Modified view object
	 */
	public function addData( \Aimeos\MW\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\MW\View\Iface
	{
		$context = $this->getContext();
		$config = $context->getConfig();

		$types = $config->get( 'swordbros.pages.types', ['sw_pages'] );

		$domains = $config->get( 'swordbros.pages.domains', ['text', 'media'] );

		$Page = \Aimeos\Controller\Frontend::create( $context, 'service' )->compare( '==', 'service.code', $this->uid)
			->uses( $domains )->type( $types )->sort( 'type' )->search();
        $view->label =  '';
        $view->content =  '';
        if($Page){
            foreach($Page->toArray() as $pages ){ 
                foreach($pages->getListItems() as $page){ 
                    $refItem = $page->getRefItem();

                    if($refItem->get('text.languageid') == $context->getLocale()->getLanguageId() ){
                        $view->label =  $refItem->get('text.label');
                        $view->content =  $refItem->get('text.content');
                    }
                }
            }
        }

		$this->addMetaItems( $view->serviceItems, $expire, $tags );

		return parent::addData( $view, $tags, $expire );
	}
}
