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
 * Class \Aimeos\MShop\Review\Manager\Standard.
 *
 * @package MShop
 * @subpackage Review
 */
class Standard
	extends \Aimeos\MShop\Common\Manager\Base
	implements \Aimeos\MShop\Review\Manager\Iface, \Aimeos\MShop\Common\Manager\Factory\Iface
{
	use \Aimeos\MShop\Common\Manager\ListRef\Traits;



	private $searchConfig = array(
		'review.id' => array(
			'code' => 'review.id',
			'internalcode' => 'msup."id"',
			'label' => 'ID',
			'type' => 'integer',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
			'public' => false,
		),
		'review.siteid' => array(
			'code' => 'review.siteid',
			'internalcode' => 'msup."siteid"',
			'label' => 'Site ID',
			'type' => 'string',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
		'review.label' => array(
			'code' => 'review.label',
			'internalcode' => 'msup."label"',
			'label' => 'Label',
			'type' => 'string',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
		),
		'review.code' => array(
			'code' => 'review.code',
			'internalcode' => 'msup."code"',
			'label' => 'Code',
			'type' => 'string',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
		),
		'review.status' => array(
			'code' => 'review.status',
			'internalcode' => 'msup."status"',
			'label' => 'Status',
			'type' => 'integer',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
		),
		'review.user_id' => array(
			'code' => 'review.user_id',
			'internalcode' => 'msup."user_id"',
			'label' => 'User',
			'type' => 'integer',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
		),
		'review.product_id' => array(
			'code' => 'review.product_id',
			'internalcode' => 'msup."product_id"',
			'label' => 'Product',
			'type' => 'integer',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
		),
		'review.review' => array(
			'code' => 'review.review',
			'internalcode' => 'msup."review"',
			'label' => 'Review',
			'type' => 'string',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
		),
		'review.rating' => array(
			'code' => 'review.rating',
			'internalcode' => 'msup."rating"',
			'label' => 'Rating',
			'type' => 'integer',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_INT,
		),
		'review.ctime' => array(
			'code' => 'review.ctime',
			'internalcode' => 'msup."ctime"',
			'label' => 'Create date/time',
			'type' => 'datetime',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
		'review.mtime' => array(
			'code' => 'review.mtime',
			'internalcode' => 'msup."mtime"',
			'label' => 'Modify date/time',
			'type' => 'datetime',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
		'review.editor' => array(
			'code' => 'review.editor',
			'internalcode' => 'msup."editor"',
			'label' => 'Editor',
			'type' => 'string',
			'internaltype' => \Aimeos\MW\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
		'review:has' => array(
			'code' => 'review:has()',
			'internalcode' => ':site AND :key AND msupli."id"',
			'internaldeps' => ['LEFT JOIN "mshop_review_list" AS msupli ON ( msupli."parentid" = msup."id" )'],
			'label' => 'Review has list item, parameter(<domain>[,<list type>[,<reference ID>)]]',
			'type' => 'null',
			'internaltype' => 'null',
			'public' => false,
		),
	);


	/**
	 * Initializes the object.
	 *
	 * @param \Aimeos\MShop\Context\Item\Iface $context Context object
	 */
	public function __construct( \Aimeos\MShop\Context\Item\Iface $context )
	{
		parent::__construct( $context );
		$this->setResourceName( 'db-review' );

		$level = \Aimeos\MShop\Locale\Manager\Base::SITE_ALL;
		$level = $context->getConfig()->get( 'review/manager/sitemode', $level );


		$this->searchConfig['review:has']['function'] = function( &$source, array $params ) use ( $level ) {

			array_walk_recursive( $params, function( &$v ) {
				$v = trim( $v, '\'' );
			} );

			$keys = [];
			$params[1] = isset( $params[1] ) ? $params[1] : '';
			$params[2] = isset( $params[2] ) ? $params[2] : '';

			foreach( (array) $params[1] as $type ) {
				foreach( (array) $params[2] as $id ) {
					$keys[] = $params[0] . '|' . ( $type ? $type . '|' : '' ) . $id;
				}
			}

			$sitestr = $this->getSiteString( 'msupli."siteid"', $level );
			$keystr = $this->toExpression( 'msupli."key"', $keys, $params[2] !== '' ? '==' : '=~' );
			$source = str_replace( [':site', ':key'], [$sitestr, $keystr], $source );

			return $params;
		};
	}


	/**
	 * Removes old entries from the storage.
	 *
	 * @param string[] $siteids List of IDs for sites whose entries should be deleted
	 * @return \Aimeos\MShop\Review\Manager\Iface Manager object for chaining method calls
	 */
	public function clear( array $siteids ) : \Aimeos\MShop\Common\Manager\Iface
	{
		$path = 'review/manager/submanagers';
		foreach( $this->getContext()->getConfig()->get( $path, [] ) as $domain ) {
			$this->getObject()->getSubManager( $domain )->clear( $siteids );
		}

		return $this->clearBase( $siteids, 'review/manager/standard/delete' );
	}


	/**
	 * Creates a new empty item instance
	 *
	 * @param array $values Values the item should be initialized with
	 * @return \Aimeos\MShop\Review\Item\Iface New review item object
	 */
	public function createItem( array $values = [] ) : \Aimeos\MShop\Common\Item\Iface
	{
		$values['review.siteid'] = $this->getContext()->getLocale()->getSiteId();
		return $this->createItemBase( $values );
	}


	/**
	 * Returns the available manager types
	 *
	 * @param bool $withsub Return also the resource type of sub-managers if true
	 * @return string[] Type of the manager and submanagers, subtypes are separated by slashes
	 */
	public function getResourceType( bool $withsub = true ) : array
	{
		$path = 'review/manager/submanagers';
		return $this->getResourceTypeBase( 'review', $path, array('lists' ), $withsub );
        // itam kullanırsan burası önemli burda itemin datalarını almkaiçin işlem var
		//return $this->getResourceTypeBase( 'review', $path, array( 'address', 'lists' ), $withsub );
	}


	/**
	 * Returns the attributes that can be used for searching.
	 *
	 * @param bool $withsub Return also attributes of sub-managers if true
	 * @return \Aimeos\MW\Criteria\Attribute\Iface[] List of search attribute items
	 */
	public function getSearchAttributes( bool $withsub = true ) : array
	{
		/** review/manager/submanagers
		 * List of manager names that can be instantiated by the review manager
		 *
		 * Managers provide a generic interface to the underlying storage.
		 * Each manager has or can have sub-managers caring about particular
		 * aspects. Each of these sub-managers can be instantiated by its
		 * parent manager using the getSubManager() method.
		 *
		 * The search keys from sub-managers can be normally used in the
		 * manager as well. It allows you to search for items of the manager
		 * using the search keys of the sub-managers to further limit the
		 * retrieved list of items.
		 *
		 * @param array List of sub-manager names
		 * @since 2014.03
		 * @category Developer
		 */
		$path = 'review/manager/submanagers';

		return $this->getSearchAttributesBase( $this->searchConfig, $path, [], $withsub );
	}


	/**
	 * Removes multiple items.
	 *
	 * @param \Aimeos\MShop\Common\Item\Iface[]|string[] $itemIds List of item objects or IDs of the items
	 * @return \Aimeos\MShop\Review\Manager\Iface Manager object for chaining method calls
	 */
	public function deleteItems( array $itemIds ) : \Aimeos\MShop\Common\Manager\Iface
	{
		/** review/manager/standard/delete/mysql
		 * Deletes the items matched by the given IDs from the database
		 *
		 * @see review/manager/standard/delete/ansi
		 */

		/** review/manager/standard/delete/ansi
		 * Deletes the items matched by the given IDs from the database
		 *
		 * Removes the records specified by the given IDs from the review database.
		 * The records must be from the site that is configured via the
		 * context item.
		 *
		 * The ":cond" placeholder is replaced by the name of the ID column and
		 * the given ID or list of IDs while the site ID is bound to the question
		 * mark.
		 *
		 * The SQL statement should conform to the ANSI standard to be
		 * compatible with most relational database systems. This also
		 * includes using double quotes for table and column names.
		 *
		 * @param string SQL statement for deleting items
		 * @since 2014.03
		 * @category Developer
		 * @see review/manager/standard/insert/ansi
		 * @see review/manager/standard/update/ansi
		 * @see review/manager/standard/newid/ansi
		 * @see review/manager/standard/search/ansi
		 * @see review/manager/standard/count/ansi
		 */
		$path = 'review/manager/standard/delete';

		return $this->deleteItemsBase( $itemIds, $path )->deleteRefItems( $itemIds );
	}


	/**
	 * Returns the item specified by its code and domain/type if necessary
	 *
	 * @param string $code Code of the item
	 * @param string[] $ref List of domains to fetch list items and referenced items for
	 * @param string|null $domain Domain of the item if necessary to identify the item uniquely
	 * @param string|null $type Type code of the item if necessary to identify the item uniquely
	 * @param bool $default True to add default criteria
	 * @return \Aimeos\MShop\Review\Item\Iface Item object
	 */
	public function findItem( string $code, array $ref = [], string $domain = null, string $type = null,
		bool $default = false ) : \Aimeos\MShop\Common\Item\Iface
	{
		return $this->findItemBase( array( 'review.code' => $code ), $ref, $default );
	}


	/**
	 * Returns the review item object specificed by its ID.
	 *
	 * @param string $id Unique review ID referencing an existing review
	 * @param string[] $ref List of domains to fetch list items and referenced items for
	 * @param bool $default Add default criteria
	 * @return \Aimeos\MShop\Review\Item\Iface Returns the review item of the given id
	 * @throws \Aimeos\MShop\Exception If item couldn't be found
	 */
	public function getItem( string $id, array $ref = [], bool $default = false ) : \Aimeos\MShop\Common\Item\Iface
	{
		return $this->getItemBase( 'review.id', $id, $ref, $default );
	}


	/**
	 * Saves a review item object.
	 *
	 * @param \Aimeos\MShop\Review\Item\Iface $item Review item object
	 * @param bool $fetch True if the new ID should be returned in the item
	 * @return \Aimeos\MShop\Review\Item\Iface Updated item including the generated ID
	 */
	public function saveItem( \Aimeos\MShop\Review\Item\Iface $item, bool $fetch = true ) : \Aimeos\MShop\Review\Item\Iface
	{
		if( !$item->isModified() )
		{
			return $this->saveListItems( $item, 'review', $fetch );
		}

		$context = $this->getContext();

		$dbm = $context->getDatabaseManager();
		$dbname = $this->getResourceName();
		$conn = $dbm->acquire( $dbname );

		try
		{
			$id = $item->getId();
			$date = date( 'Y-m-d H:i:s' );
			$columns = $this->getObject()->getSaveAttributes();

			if( $id === null )
			{
				/** review/manager/standard/insert/mysql
				 * Inserts a new review record into the database table
				 *
				 * @see review/manager/standard/insert/ansi
				 */

				/** review/manager/standard/insert/ansi
				 * Inserts a new review record into the database table
				 *
				 * Items with no ID yet (i.e. the ID is NULL) will be created in
				 * the database and the newly created ID retrieved afterwards
				 * using the "newid" SQL statement.
				 *
				 * The SQL statement must be a string suitable for being used as
				 * prepared statement. It must include question marks for binding
				 * the values from the review item to the statement before they are
				 * sent to the database server. The number of question marks must
				 * be the same as the number of columns listed in the INSERT
				 * statement. The order of the columns must correspond to the
				 * order in the saveItems() method, so the correct values are
				 * bound to the columns.
				 *
				 * The SQL statement should conform to the ANSI standard to be
				 * compatible with most relational database systems. This also
				 * includes using double quotes for table and column names.
				 *
				 * @param string SQL statement for inserting records
				 * @since 2014.03
				 * @category Developer
				 * @see review/manager/standard/update/ansi
				 * @see review/manager/standard/newid/ansi
				 * @see review/manager/standard/delete/ansi
				 * @see review/manager/standard/search/ansi
				 * @see review/manager/standard/count/ansi
				 */
				$path = 'review/manager/standard/insert';
				$sql = $this->addSqlColumns( array_keys( $columns ), $this->getSqlConfig( $path ) );
			}
			else
			{
				/** review/manager/standard/update/mysql
				 * Updates an existing review record in the database
				 *
				 * @see review/manager/standard/update/ansi
				 */

				/** review/manager/standard/update/ansi
				 * Updates an existing review record in the database
				 *
				 * Items which already have an ID (i.e. the ID is not NULL) will
				 * be updated in the database.
				 *
				 * The SQL statement must be a string suitable for being used as
				 * prepared statement. It must include question marks for binding
				 * the values from the review item to the statement before they are
				 * sent to the database server. The order of the columns must
				 * correspond to the order in the saveItems() method, so the
				 * correct values are bound to the columns.
				 *
				 * The SQL statement should conform to the ANSI standard to be
				 * compatible with most relational database systems. This also
				 * includes using double quotes for table and column names.
				 *
				 * @param string SQL statement for updating records
				 * @since 2014.03
				 * @category Developer
				 * @see review/manager/standard/insert/ansi
				 * @see review/manager/standard/newid/ansi
				 * @see review/manager/standard/delete/ansi
				 * @see review/manager/standard/search/ansi
				 * @see review/manager/standard/count/ansi
				 */
				$path = 'review/manager/standard/update';
				$sql = $this->addSqlColumns( array_keys( $columns ), $this->getSqlConfig( $path ), false );
			}

			$idx = 1;
			$stmt = $this->getCachedStatement( $conn, $path, $sql );

			foreach( $columns as $name => $entry ) {
				$stmt->bind( $idx++, $item->get( $name ), $entry->getInternalType() );
			}

			$stmt->bind( $idx++, $item->getCode() );
			$stmt->bind( $idx++, $item->getLabel() );
			$stmt->bind( $idx++, $item->getStatus(), \Aimeos\MW\DB\Statement\Base::PARAM_INT );
			$stmt->bind( $idx++, $item->getRowValue('review.user_id') ); // mtime
			$stmt->bind( $idx++, $item->getRowValue('review.product_id') ); // mtime
			$stmt->bind( $idx++, $item->getRowValue('review.review') ); // mtime
			$stmt->bind( $idx++, $item->getRowValue('review.rating') ); // mtime
			$stmt->bind( $idx++, $date ); // mtime
			$stmt->bind( $idx++, $context->getEditor() );
			$stmt->bind( $idx++, $context->getLocale()->getSiteId() );

			if( $id !== null ) {
				$stmt->bind( $idx++, $id, \Aimeos\MW\DB\Statement\Base::PARAM_INT );
			} else {
				$stmt->bind( $idx++, $date ); // ctime
			}

			$stmt->execute()->finish();

			if( $id === null )
			{
				/** review/manager/standard/newid/mysql
				 * Retrieves the ID generated by the database when inserting a new record
				 *
				 * @see review/manager/standard/newid/ansi
				 */

				/** review/manager/standard/newid/ansi
				 * Retrieves the ID generated by the database when inserting a new record
				 *
				 * As soon as a new record is inserted into the database table,
				 * the database server generates a new and unique identifier for
				 * that record. This ID can be used for retrieving, updating and
				 * deleting that specific record from the table again.
				 *
				 * For MySQL:
				 *  SELECT LAST_INSERT_ID()
				 * For PostgreSQL:
				 *  SELECT currval('seq_msup_id')
				 * For SQL Server:
				 *  SELECT SCOPE_IDENTITY()
				 * For Oracle:
				 *  SELECT "seq_msup_id".CURRVAL FROM DUAL
				 *
				 * There's no way to retrive the new ID by a SQL statements that
				 * fits for most database servers as they implement their own
				 * specific way.
				 *
				 * @param string SQL statement for retrieving the last inserted record ID
				 * @since 2014.03
				 * @category Developer
				 * @see review/manager/standard/insert/ansi
				 * @see review/manager/standard/update/ansi
				 * @see review/manager/standard/delete/ansi
				 * @see review/manager/standard/search/ansi
				 * @see review/manager/standard/count/ansi
				 */
				$path = 'review/manager/standard/newid';
				$id = $this->newId( $conn, $path );
			}

			$item->setId( $id );

			$dbm->release( $conn, $dbname );
		}
		catch( \Exception $e )
		{
			$dbm->release( $conn, $dbname );
			throw $e;
		}

		return $this->saveListItems( $item, 'review', $fetch );
	}


	/**
	 * Returns the item objects matched by the given search criteria.
	 *
	 * @param \Aimeos\MW\Criteria\Iface $search Search criteria object
	 * @param string[] $ref List of domains to fetch list items and referenced items for
	 * @param int|null &$total Number of items that are available in total
	 * @return \Aimeos\Map List of items implementing \Aimeos\MShop\Review\Item\Ifac with ids as keys
	 */
	public function searchItems( \Aimeos\MW\Criteria\Iface $search, array $ref = [], int &$total = null ) : \Aimeos\Map
	{

		$map = [];
		$context = $this->getContext();

		$dbm = $context->getDatabaseManager();
		$dbname = $this->getResourceName();
		$conn = $dbm->acquire( $dbname );

		try
		{
			$required = array( 'review' );

			$level = \Aimeos\MShop\Locale\Manager\Base::SITE_ALL;
			$level = $context->getConfig()->get( 'review/manager/sitemode', $level );

			$cfgPathSearch = 'review/manager/standard/search';

			$cfgPathCount = 'review/manager/standard/count';
			$results = $this->searchItemsBase( $conn, $search, $cfgPathSearch, $cfgPathCount, $required, $total, $level );

			while( ( $row = $results->fetch() ) !== null ) {
				$map[$row['review.id']] = $row;
			}

			$dbm->release( $conn, $dbname );
		}
		catch( \Exception $e )
		{
            //print_r($e);
			$dbm->release( $conn, $dbname );
			throw $e;
		}

		$addrItems = [];
		//if( in_array( 'review/address', $ref, true ) ) {
//			$addrItems = $this->getAddressItems( array_keys( $map ), 'review' );
//		}

		return $this->buildItems( $map, $ref, 'review', $addrItems );
	}


	/**
	 * Creates a new manager for review
	 *
	 * @param string $manager Name of the sub manager type in lower case
	 * @param string|null $name Name of the implementation, will be from configuration (or Default) if null
	 * @return \Aimeos\MShop\Common\Manager\Iface Sub manager
	 * @throws \Aimeos\MShop\Review\Exception If creating manager failed
	 */
	public function getSubManager( string $manager, string $name = null ) : \Aimeos\MShop\Common\Manager\Iface
	{
		return $this->getSubManagerBase( 'review', $manager, $name );
	}


	/**
	 * Creates a search critera object
	 *
	 * @param bool $default Add default criteria (optional)
	 * @return \Aimeos\MW\Criteria\Iface New search criteria object
	 */
	public function createSearch( bool $default = false ) : \Aimeos\MW\Criteria\Iface
	{

		if( $default ) {
			return $this->createSearchBase( 'review' );
		}

		return parent::createSearch();
	}


	/**
	 * Creates a new review item.
	 *
	 * @param array $values List of attributes for review item
	 * @param \Aimeos\MShop\Common\Item\Lists\Iface[] $listitems List of list items
	 * @param \Aimeos\MShop\Common\Item\Iface[] $refItems List of referenced items
	 * @param \Aimeos\MShop\Common\Item\Address\Iface[] $addresses List of address items
	 * @return \Aimeos\MShop\Review\Item\Iface New review item
	 */
	protected function createItemBase( array $values = [], array $listitems = [], array $refItems = [],
		array $addresses = [] ) : \Aimeos\MShop\Common\Item\Iface
	{
		return new \Aimeos\MShop\Review\Item\Standard( $values, $listitems, $refItems, $addresses );
	}
}
