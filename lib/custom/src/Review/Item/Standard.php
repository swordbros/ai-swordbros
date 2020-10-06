<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2020
 * @package MShop
 * @subpackage Review
 */


namespace Aimeos\MShop\Review\Item;


/**
 * Interface for review DTO objects used by the shop.
 *
 * @package MShop
 * @subpackage Review
 */
class Standard
	extends \Aimeos\MShop\Common\Item\Base
	implements \Aimeos\MShop\Review\Item\Iface
{
	use \Aimeos\MShop\Common\Item\ListRef\Traits {
		__clone as __cloneList;
	}



	/**
	 * Initializes the review item object
	 *
	 * @param array $values List of attributes that belong to the review item
	 * @param \Aimeos\MShop\Common\Item\Lists\Iface[] $listItems List of list items
	 * @param \Aimeos\MShop\Common\Item\Iface[] $refItems List of referenced items
	 */
	public function __construct( array $values = [], array $listItems = [], array $refItems = [], array $addresses = [] )
	{
		parent::__construct( 'review.', $values );

		$this->initListItems( $listItems, $refItems );
		//$this->initAddressItems( $addresses );
	}


	/**
	 * Creates a deep clone of all objects
	 */
	public function __clone()
	{
		parent::__clone();
		$this->__cloneList();
	}


	/**
	 * Returns the label of the review item.
	 *
	 * @return string label of the review item
	 */
	public function getLabel() : string
	{
		return $this->get( 'review.label', '' );
	}


	/**
	 * Sets the new label of the review item.
	 *
	 * @param string $value label of the review item
	 * @return \Aimeos\MShop\Review\Item\Iface Review item for chaining method calls
	 */
	public function setLabel( string $value ) : \Aimeos\MShop\Review\Item\Iface
	{
		return $this->set( 'review.label', $value );
	}


	/**
	 * Returns the code of the review item.
	 *
	 * @return string Code of the review item
	 */
	public function getCode() : string
	{
		return $this->get( 'review.code', '' );
	}


	/**
	 * Sets the new code of the review item.
	 *
	 * @param string $value Code of the review item
	 * @return \Aimeos\MShop\Review\Item\Iface Review item for chaining method calls
	 */
	public function setCode( string $value ) : \Aimeos\MShop\Review\Item\Iface
	{
		return $this->set( 'review.code', $this->checkCode( $value ) );
	}



	/**
	 * Returns the status of the item
	 *
	 * @return int Status of the item
	 */
	public function getStatus() : int
	{
		return $this->get( 'review.status', 1 );
	}


	/**
	 * Sets the new status of the review item.
	 *
	 * @param int $value status of the review item
	 * @return \Aimeos\MShop\Review\Item\Iface Review item for chaining method calls
	 */
	public function setStatus( int $value ) : \Aimeos\MShop\Common\Item\Iface
	{
		return $this->set( 'review.status', $value );
	}


	/**
	 * Returns the item type
	 *
	 * @return string Item type, subtypes are separated by slashes
	 */
	public function getType() : string
	{
		return 'review';
	}

	/**
	 * Returns the item type
	 *
	 * @return string Item type, subtypes are separated by slashes
	 */
	public function getResourceType() : string
	{
		return 'review';
	}


	/**
	 * Tests if the item is available based on status, time, language and currency
	 *
	 * @return bool True if available, false if not
	 */
	public function isAvailable() : bool
	{
		return parent::isAvailable() && $this->getStatus() > 0;
	}


	/**
	 * Sets the item values from the given array and removes that entries from the list
	 *
	 * @param array &$list Associative list of item keys and their values
	 * @param bool True to set private properties too, false for public only
	 * @return \Aimeos\MShop\Review\Item\Iface Review item for chaining method calls
	 */
	public function fromArray( array &$list, bool $private = false ) : \Aimeos\MShop\Common\Item\Iface
	{
		$item = parent::fromArray( $list, $private );

		foreach( $list as $key => $value )
		{

			switch( $key )
			{
				case 'review.code': $item = $item->setCode( $value ); break;
				case 'review.label': $item = $item->setLabel( $value ); break;
				case 'review.status': $item = $item->setStatus( (int) $value ); break;
				case 'review.user_id': $item = $item->setRowValue('review.user_id', (int) $value ); break;
				case 'review.user_name': $item = $item->setRowValue('review.user_name', $value ); break;
				case 'review.product_id': $item = $item->setRowValue('review.product_id', (int) $value ); break;
				case 'review.product_name': $item = $item->setRowValue('review.product_name', $value ); break;
				case 'review.review': $item = $item->setRowValue('review.review', $value ); break;
				case 'review.rating': $item = $item->setRowValue('review.rating', (int) $value ); break;
				default: continue 2;
			}

			unset( $list[$key] );
		}
		return $item;
	}


	/**
	 * Returns the item values as array.
	 *
	 * @param bool True to return private properties, false for public only
	 * @return array Associative list of item properties and their values
	 */
	public function toArray( bool $private = false ) : array
	{
		$list = parent::toArray( $private );

		$list['review.code'] = $this->getCode();
		$list['review.label'] = $this->getLabel();
		$list['review.status'] = $this->getStatus();
		$list['review.user_id'] = $this->getRowValue('review.user_id');
		$list['review.user_name'] = $this->getRowValue('review.user_name');
		$list['review.product_id'] = $this->getRowValue('review.product_id');
		$list['review.product_name'] = $this->getRowValue('review.product_name');
		$list['review.review'] = $this->getRowValue('review.review');
		$list['review.rating'] = $this->getRowValue('review.rating');

		return $list;
	}
	/**
	 * Returns the value of the swordbros reviews
	 *
	 * @return string RowValue of the swordbros reviews
	 */
	public function getRowValue($col, $default='')
	{
		return (string) $this->get( $col, $default );
	}

	/**
	 * Sets the new value of the swordbros reviews
	 *
	 * @param string $value Code of the swordbros reviews
	 * @return \Aimeos\MShop\Swordbros\Item\Reviews\Iface Swordbros reviews item for chaining method calls
	 */
	public function setRowValue( $col, $value )
	{
		return $this->set( $col, (string) $value );
	}

	/**
	 * Returns the code of the swordbros reviews
	 *
	 * @return string Code of the swordbros reviews
	 */


}
