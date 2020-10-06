<?php



/**

 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0

 * @copyright Aimeos (aimeos.org), 2017-2020

 * @package Client

 * @subpackage JsonApi

 */

/*





$target = $this->config( 'client/jsonapi/url/target' );

$cntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );

$action = $this->config( 'client/jsonapi/url/action', 'get' );

$config = $this->config( 'client/jsonapi/url/config', [] );





$total = $this->get( 'total', 0 );

$offset = max( $this->param( 'page/offset', 0 ), 0 );

$limit = max( $this->param( 'page/limit', 100 ), 1 );



$first = ( $offset > 0 ? 0 : null );

$prev = ( $offset - $limit >= 0 ? $offset - $limit : null );

$next = ( $offset + $limit < $total ? $offset + $limit : null );

$last = ( ( (int) ( $total / $limit ) ) * $limit > $offset ? ( (int) ( $total / $limit ) ) * $limit : null );





$ref = array( 'resource', 'id', 'related', 'relatedid', 'filter', 'page', 'sort', 'include', 'fields' );

$params = array_intersect_key( $this->param(), array_flip( $ref ) );

*/

$enc = $this->encoder();



$pretty = $this->param( 'pretty' ) ? JSON_PRETTY_PRINT : 0;

$fields = $this->param( 'fields', [] );



foreach( (array) $fields as $resource => $list ) {

	$fields[$resource] = array_flip( explode( ',', $list ) );

}





?>

{

	"meta": {

		"total": 0,

		"prefix": <?= json_encode( $this->get( 'prefix' ) ); ?>,

		"content-baseurl": "<?= $this->config( 'resource/fs/baseurl' ); ?>"

		<?php if( $this->csrf()->name() != '' ) : ?>

			, "csrf": {

				"name": "<?= $this->csrf()->name(); ?>",

				"value": "<?= $this->csrf()->value(); ?>"

			}

		<?php endif; ?>

	},

	"links": {

	}

,"haserror": <?php echo (int)isset( $this->errors )?>

	<?php if( isset( $this->errors ) ) { ?>
		,"errors": <?= json_encode( $this->errors, $pretty ); ?>
        ,"message":"<?= $enc->attr( $this->translate( 'client', 'Record error' ) ); ?>"
	<?php } else { ?>
        ,"message":"<?= $enc->attr( $this->translate( 'client', 'review_thankyou' ) ); ?>"

<?php } ?>

}

