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
interface Iface
	extends \Aimeos\MShop\Common\Item\Iface,
		\Aimeos\MShop\Common\Item\ListRef\Iface, \Aimeos\MShop\Common\Item\Status\Iface
{
	/**
	 * Returns the label of the review item.
	 *
	 * @return string label of the review item
	 */
	public function getLabel() : string;

	/**
	 * Sets the new label of the review item.
	 *
	 * @param string $value label of the review item
	 * @return \Aimeos\MShop\Review\Item\Iface Review item for chaining method calls
	 */
	public function setLabel( string $value ) : \Aimeos\MShop\Review\Item\Iface;

	/**
	 * Returns the code of the review item.
	 *
	 * @return string Code of the review item
	 */
	public function getCode() : string;

	/**
	 * Sets the new code of the review item.
	 *
	 * @param string $value Code of the review item
	 * @return \Aimeos\MShop\Review\Item\Iface Review item for chaining method calls
	 */
	public function setCode( string $value ) : \Aimeos\MShop\Review\Item\Iface;
}
