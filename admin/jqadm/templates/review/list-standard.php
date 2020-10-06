<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2020
 */

$enc = $this->encoder();


$target = $this->config( 'admin/jqadm/url/search/target' );
$controller = $this->config( 'admin/jqadm/url/search/controller', 'Jqadm' );
$action = $this->config( 'admin/jqadm/url/search/action', 'search' );
$config = $this->config( 'admin/jqadm/url/search/config', [] );

$newTarget = $this->config( 'admin/jqadm/url/create/target' );
$newCntl = $this->config( 'admin/jqadm/url/create/controller', 'Jqadm' );
$newAction = $this->config( 'admin/jqadm/url/create/action', 'create' );
$newConfig = $this->config( 'admin/jqadm/url/create/config', [] );

$getTarget = $this->config( 'admin/jqadm/url/get/target' );
$getCntl = $this->config( 'admin/jqadm/url/get/controller', 'Jqadm' );
$getAction = $this->config( 'admin/jqadm/url/get/action', 'get' );
$getConfig = $this->config( 'admin/jqadm/url/get/config', [] );

$copyTarget = $this->config( 'admin/jqadm/url/copy/target' );
$copyCntl = $this->config( 'admin/jqadm/url/copy/controller', 'Jqadm' );
$copyAction = $this->config( 'admin/jqadm/url/copy/action', 'copy' );
$copyConfig = $this->config( 'admin/jqadm/url/copy/config', [] );

$delTarget = $this->config( 'admin/jqadm/url/delete/target' );
$delCntl = $this->config( 'admin/jqadm/url/delete/controller', 'Jqadm' );
$delAction = $this->config( 'admin/jqadm/url/delete/action', 'delete' );
$delConfig = $this->config( 'admin/jqadm/url/delete/config', [] );


/** admin/jqadm/review/fields
 * List of reviewcolumns that should be displayed in the list view
 *
 * Changes the list of reviewcolumns shown by default in the reviewlist view.
 * The columns can be changed by the editor as required within the administraiton
 * interface.
 *
 * The names of the colums are in fact the search keys defined by the managers,
 * e.g. "review.id" for the reviewID.
 *
 * @param array List of field names, i.e. search keys
 * @since 2017.10
 * @category Developer
 */
$default = ['review.status', 'review.user_id', 'review.product_id', 'review.review', 'review.rating'];
$default = $this->config( 'admin/jqadm/review/fields', $default );
$fields = $this->session( 'aimeos/admin/jqadm/review/fields', $default );

$searchParams = $params = $this->get( 'pageParams', [] );
$searchParams['page']['start'] = 0;

$columnList = [
	'review.id' => $this->translate( 'admin', 'ID' ),
	'review.status' => $this->translate( 'admin', 'Status' ),
	'review.user_id' => $this->translate( 'admin', 'User' ),
	'review.product_id' => $this->translate( 'admin', 'Product' ),
	'review.review' => $this->translate( 'admin', 'Review' ),
	'review.rating' => $this->translate( 'admin', 'Rating' ),
	'review.ctime' => $this->translate( 'admin', 'Date' ),
	'review.editor' => $this->translate( 'admin', 'Editor' ),
];


?>
<?php $this->block()->start( 'jqadm_content' ); ?>

<nav class="main-navbar">

	<span class="navbar-brand">
		<?= $enc->html( $this->translate( 'admin', 'review' ) ); ?>
		<span class="navbar-secondary">(<?= $enc->html( $this->site()->label() ); ?>)</span>
	</span>

	<?= $this->partial(
		$this->config( 'admin/jqadm/partial/navsearch', 'common/partials/navsearch-standard' ), [
			'filter' => $this->session( 'aimeos/admin/jqadm/review/filter', [] ),
			'filterAttributes' => $this->get( 'filterAttributes', [] ),
			'filterOperators' => $this->get( 'filterOperators', [] ),
			'params' => $params,
		]
	); ?>
</nav>


<?= $this->partial(
		$this->config( 'admin/jqadm/partial/pagination', 'common/partials/pagination-standard' ),
		['pageParams' => $params, 'pos' => 'top', 'total' => $this->get( 'total' ),
		'page' => $this->session( 'aimeos/admin/jqadm/review/page', [] )]
	);
?>
<style>
    .table-striped tbody tr.row-status-1 .fa{
        color: #71ac0c;
    }
    .table-striped tbody tr.row-status--1 .fa{
        color: #F2888A;
    }
    .review-review div.items-field{
        max-width: 300px;
        overflow: hidden;
        display: block;
        max-height: 40px;
    }
</style>
<form class="list list-review" method="POST" action="<?= $enc->attr( $this->url( $target, $controller, $action, $searchParams, [], $config ) ); ?>">
	<?= $this->csrf()->formfield(); ?>

	<table class="list-items table table-hover table-striped">
		<thead class="list-header">
			<tr>
				<th class="select">
					<a class="btn act-delete fa" tabindex="1" data-multi="1"
						href="<?= $enc->attr( $this->url( $delTarget, $delCntl, $delAction, ['id' => ''] + $params, [], $delConfig ) ); ?>"
						title="<?= $enc->attr( $this->translate( 'admin', 'Delete this entry' ) ); ?>"
						aria-label="<?= $enc->attr( $this->translate( 'admin', 'Delete' ) ); ?>">
					</a>
				</th>

				<?= $this->partial(
						$this->config( 'admin/jqadm/partial/listhead', 'common/partials/listhead-standard' ),
						['fields' => $fields, 'params' => $params, 'data' => $columnList, 'sort' => $this->session( 'aimeos/admin/jqadm/review/sort' )]
					);
				?>

				<th class="actions">
					<a class="btn fa act-add" tabindex="1"
						href="<?= $enc->attr( $this->url( $newTarget, $newCntl, $newAction, $params, [], $newConfig ) ); ?>"
						title="<?= $enc->attr( $this->translate( 'admin', 'Insert new entry (Ctrl+I)' ) ); ?>"
						aria-label="<?= $enc->attr( $this->translate( 'admin', 'Add' ) ); ?>">
					</a>

					<?= $this->partial(
							$this->config( 'admin/jqadm/partial/columns', 'common/partials/columns-standard' ),
							['fields' => $fields, 'data' => $columnList]
						);
					?>
				</th>
			</tr>
		</thead>
		<tbody>

			<?= $this->partial(
				$this->config( 'admin/jqadm/partial/listsearch', 'common/partials/listsearch-standard' ), [
					'fields' => array_merge( $fields, ['select'] ), 'filter' => $this->session( 'aimeos/admin/jqadm/review/filter', [] ),
					'data' => [
						'select' => ['type' => 'checkbox'],
						'review.id' => ['op' => '=='],
						'review.status' => ['op' => '==', 'type' => 'select', 'val' => [
							'1' => $this->translate( 'mshop/code', 'status:1' ),
							'0' => $this->translate( 'mshop/code', 'status:0' ),
							'-1' => $this->translate( 'mshop/code', 'status:-1' ),
							'-2' => $this->translate( 'mshop/code', 'status:-2' ),
						]],
						'review.user_id' => [],
						'review.product_id' => [],
						'review.review' => [],
						'review.rating' => [],
						'review.ctime' => ['op' => '>=', 'type' => 'datetime-local'],
						'review.editor' => [],
					]
				] );
			?>

			<?php foreach( $this->get( 'items', [] ) as $id => $item ) : ?>
				<?php $url = $enc->attr( $this->url( $getTarget, $getCntl, $getAction, ['id' => $id] + $params, [], $getConfig ) ); ?>
				<tr class="list-item <?= $this->site()->readonly( $item->getSiteId() ); ?> row-status-<?= $enc->attr( $item->getStatus() ); ?>" data-label="<?= $enc->attr( $item->getLabel() ) ?>">
					<td class="select"><input class="form-control" type="checkbox" tabindex="1" name="<?= $enc->attr( $this->formparam( ['id', ''] ) ) ?>" value="<?= $enc->attr( $item->getId() ) ?>" /></td>
					<?php if( in_array( 'review.id', $fields ) ) : ?>
						<td class="review-id"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getId() ); ?></a></td>
					<?php endif; ?>
					<?php if( in_array( 'review.status', $fields ) ) : ?>
						<td class="review-status"><a class="items-field" href="<?= $url; ?>"><div class="fa status-<?= $enc->attr( $item->getStatus() ); ?>"></div></a></td>
					<?php endif; ?>
					<?php if( in_array( 'review.user_id', $fields ) ) : ?>
						<td class="review-code"><a class="items-field" href="<?= $url; ?>" tabindex="1"><?= $enc->html( $item->getRowValue('review.user_name','') ); ?></a></td>
					<?php endif; ?>
					<?php if( in_array( 'review.product_id', $fields ) ) : ?>
						<td class="review-label"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getRowValue('review.product_name','')  ); ?>#<?= $enc->html( $item->getRowValue('review.product_id','')  ); ?></a></td>
					<?php endif; ?>
					<?php if( in_array( 'review.review', $fields ) ) : ?>
						<td class="review-review"><div class="items-field" title="<?= $enc->html( $item->getRowValue('review.review','')); ?>"><?= $enc->html( $item->getRowValue('review.review','')); ?></spdivan></td>
					<?php endif; ?>
					<?php if( in_array( 'review.rating', $fields ) ) : ?>
						<td class="review-rating"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getRowValue('review.rating','')); ?></a></td>
					<?php endif; ?>
					<?php if( in_array( 'review.ctime', $fields ) ) : ?>
						<td class="review-ctime"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getTimeCreated() ); ?></a></td>
					<?php endif; ?>
					<?php if( in_array( 'review.editor', $fields ) ) : ?>
						<td class="review-editor"><a class="items-field" href="<?= $url; ?>"><?= $enc->html( $item->getEditor() ); ?></a></td>
					<?php endif; ?>

					<td class="actions">
						<a class="btn act-copy fa" tabindex="1"
							href="<?= $enc->attr( $this->url( $copyTarget, $copyCntl, $copyAction, ['id' => $id] + $params, [], $copyConfig ) ); ?>"
							title="<?= $enc->attr( $this->translate( 'admin', 'Copy this entry' ) ); ?>"
							aria-label="<?= $enc->attr( $this->translate( 'admin', 'Copy' ) ); ?>">
						</a>
						<?php if( !$this->site()->readonly( $item->getSiteId() ) ) : ?>
							<a class="btn act-delete fa" tabindex="1"
								href="<?= $enc->attr( $this->url( $delTarget, $delCntl, $delAction, ['resource' => 'swordbros/review', 'id' => $id] + $params, [], $delConfig ) ); ?>"
								title="<?= $enc->attr( $this->translate( 'admin', 'Delete this entry' ) ); ?>"
								aria-label="<?= $enc->attr( $this->translate( 'admin', 'Delete' ) ); ?>">
							</a>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php if( $this->get( 'items', map() )->isEmpty() ) : ?>
		<div class="noitems"><?= $enc->html( sprintf( $this->translate( 'admin', 'No items found' ) ) ); ?></div>
	<?php endif; ?>
</form>

<?= $this->partial(
		$this->config( 'admin/jqadm/partial/pagination', 'common/partials/pagination-standard' ),
		['pageParams' => $params, 'pos' => 'bottom', 'total' => $this->get( 'total' ),
		'page' => $this->session( 'aimeos/admin/jqadm/review/page', [] )]
	);
?>

<?php $this->block()->stop(); ?>

<?= $this->render( $this->config( 'admin/jqadm/template/page', 'common/page-standard' ) ); ?>
