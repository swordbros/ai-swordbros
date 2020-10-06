<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2020
 * @package MShop
 * @subpackage Review
 */


namespace Aimeos\MShop\Review\Manager;


/**
 * Interface for review DAOs used by the shop.
 * @package MShop
 * @subpackage Review
 */
interface Iface
	extends \Aimeos\MShop\Common\Manager\Iface, \Aimeos\MShop\Common\Manager\Find\Iface,
		\Aimeos\MShop\Common\Manager\ListRef\Iface
{
	/**
	 * Saves a review item object.
	 *
	 * @param \Aimeos\MShop\Review\Item\Iface $item Review item object
	 * @param bool $fetch True if the new ID should be returned in the item
	 * @return \Aimeos\MShop\Review\Item\Iface Updated item including the generated ID
	 */
	public function saveItem( \Aimeos\MShop\Review\Item\Iface $item, bool $fetch = true ) : \Aimeos\MShop\Review\Item\Iface;
}
