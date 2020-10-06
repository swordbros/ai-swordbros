<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2020
 * @package Controller
 * @subpackage Frontend
 */


namespace Aimeos\Controller\Frontend\Review;


/**
 * Default implementation of the attribute frontend controller
 *
 * @package Controller
 * @subpackage Frontend
 */
class Standard
	extends \Aimeos\Controller\Frontend\Base
	implements Iface, \Aimeos\Controller\Frontend\Common\Iface
{
	private $conditions = [];
	private $domain = 'product';
	private $domains = [];
	private $filter;
	private $manager;


	/**
	 * Common initialization for controller classes
	 *
	 * @param \Aimeos\MShop\Context\Item\Iface $context Common MShop context object
	 */
	public function __construct( \Aimeos\MShop\Context\Item\Iface $context )
	{
		parent::__construct( $context );

		$this->manager = \Aimeos\MShop::create( $context, 'review' );
		$this->filter = $this->manager->createSearch( true );
		$this->conditions[] = $this->filter->getConditions();
	}


	/**
	 * Clones objects in controller and resets values
	 */
	public function __clone()
	{
		$this->filter = clone $this->filter;
	}


	/**
	 * Adds attribute IDs for filtering
	 *
	 * @param array|string $attrIds Review ID or list of IDs
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function attribute( $attrIds ) : Iface
	{
		if( !empty( $attrIds ) ) {
			$this->conditions[] = $this->filter->compare( '==', 'attribute.id', $attrIds );
		}

		return $this;
	}


	/**
	 * Adds generic condition for filtering attributes
	 *
	 * @param string $operator Comparison operator, e.g. "==", "!=", "<", "<=", ">=", ">", "=~", "~="
	 * @param string $key Search key defined by the attribute manager, e.g. "attribute.status"
	 * @param array|string $value Value or list of values to compare to
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function compare( string $operator, string $key, $value ) : Iface
	{
		$this->conditions[] = $this->filter->compare( $operator, $key, $value );
		return $this;
	}


	/**
	 * Adds the domain of the attributes for filtering
	 *
	 * @param string $domain Domain of the attributes
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function domain( string $domain ) : Iface
	{
		$this->domain = $domain;
		return $this;
	}


	/**
	 * Returns the attribute for the given attribute code
	 *
	 * @param string $code Unique attribute code
	 * @param string $type Type assigned to the attribute
	 * @return \Aimeos\MShop\Review\Item\Iface Review item including the referenced domains items
	 * @since 2019.04
	 */
	public function find( string $code, string $type ) : \Aimeos\MShop\Review\Item\Iface
	{
		return $this->manager->findItem( $code, $this->domains, $this->domain, $type, true );
	}


	/**
	 * Creates a search function string for the given name and parameters
	 *
	 * @param string $name Name of the search function without parenthesis, e.g. "attribute:prop"
	 * @param array $params List of parameters for the search function with numeric keys starting at 0
	 * @return string Search function string that can be used in compare()
	 */
	public function function( string $name, array $params ) : string
	{
		return $this->filter->createFunction( $name, $params );
	}


	/**
	 * Returns the attribute for the given attribute ID
	 *
	 * @param string $id Unique attribute ID
	 * @return \Aimeos\MShop\Review\Item\Iface Review item including the referenced domains items
	 * @since 2019.04
	 */
	public function get( string $id ) : \Aimeos\MShop\Review\Item\Iface
	{
		return $this->manager->getItem( $id, $this->domains, true );
	}


	public function saveItem( $id, $data )
	{
        $item = $this->manager->createItem();
        $item->setModified(true);
        $item->fromArray( $data, true );
		$this->manager->saveItem( $item );
	}


	/**
	 * Adds a filter to return only items containing a reference to the given ID
	 *
	 * @param string $domain Domain name of the referenced item, e.g. "price"
	 * @param string|null $type Type code of the reference, e.g. "default" or null for all types
	 * @param string|null $refId ID of the referenced item of the given domain or null for all references
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function has( string $domain, string $type = null, string $refId = null ) : Iface
	{
		$params = [$domain];
		!$type ?: $params[] = $type;
		!$refId ?: $params[] = $refId;

		$func = $this->filter->createFunction( 'attribute:has', $params );
		$this->conditions[] = $this->filter->compare( '!=', $func, null );
		return $this;
	}


	/**
	 * Parses the given array and adds the conditions to the list of conditions
	 *
	 * @param array $conditions List of conditions, e.g. ['&&' => [['>' => ['attribute.status' => 0]], ['==' => ['attribute.type' => 'color']]]]
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function parse( array $conditions ) : Iface
	{
		if( ( $cond = $this->filter->toConditions( $conditions ) ) !== null ) {
			$this->conditions[] = $cond;
		}

		return $this;
	}


	/**
	 * Adds a filter to return only items containing the property
	 *
	 * @param string $type Type code of the property, e.g. "htmlcolor"
	 * @param string|null $value Exact value of the property
	 * @param string|null $langId ISO country code (en or en_US) or null if not language specific
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function property( string $type, string $value = null, string $langId = null ) : Iface
	{
		$func = $this->filter->createFunction( 'attribute:prop', [$type, $langId, $value] );
		$this->conditions[] = $this->filter->compare( '!=', $func, null );
		return $this;
	}


	/**
	 * Returns the attributes filtered by the previously assigned conditions
	 *
	 * @param int &$total Parameter where the total number of found attributes will be stored in
	 * @return \Aimeos\Map Ordered list of attribute items implementing \Aimeos\MShop\Review\Item\Iface
	 * @since 2019.04
	 */
	public function search( int &$total = null ) : \Aimeos\Map
	{
		$expr =  $this->conditions;
		$this->filter->setConditions( $this->filter->combine( '&&', $expr ) );

		return $this->manager->searchItems( $this->filter, $this->domains, $total );
	}


	/**
	 * Sets the start value and the number of returned attributes for slicing the list of found attributes
	 *
	 * @param int $start Start value of the first attribute in the list
	 * @param int $limit Number of returned attributes
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function slice( int $start, int $limit ) : Iface
	{
		$this->filter->setSlice( $start, $limit );
		return $this;
	}


	/**
	 * Sets the sorting of the result list
	 *
	 * @param string|null $key Sorting of the result list like "position", null for no sorting
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function sort( string $key = null ) : Iface
	{
		$sort = [];
		$list = ( $key ? explode( ',', $key ) : [] );

		foreach( $list as $sortkey )
		{
			$direction = ( $sortkey[0] === '-' ? '-' : '+' );
			$sortkey = ltrim( $sortkey, '+-' );

			switch( $sortkey )
			{
				case 'position':
					$sort[] = $this->filter->sort( $direction, 'review.ctime' );
					$sort[] = $this->filter->sort( $direction, 'review.mtime' );
					break;
				default:
					$sort[] = $this->filter->sort( $direction, $sortkey );
			}
		}

		$this->filter->setSortations( $sort );
		return $this;
	}


	/**
	 * Adds attribute types for filtering
	 *
	 * @param array|string $codes Review ID or list of IDs
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function type( $codes ) : Iface
	{
		if( !empty( $codes ) ) {
			$this->conditions[] = $this->filter->compare( '==', 'attribute.type', $codes );
		}

		return $this;
	}


	/**
	 * Sets the referenced domains that will be fetched too when retrieving items
	 *
	 * @param array $domains Domain names of the referenced items that should be fetched too
	 * @return \Aimeos\Controller\Frontend\Review\Iface Review controller for fluent interface
	 * @since 2019.04
	 */
	public function uses( array $domains ) : Iface
	{
		$this->domains = $domains;
		return $this;
	}
}
