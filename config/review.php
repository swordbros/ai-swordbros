<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2020
 */


return array(
	'manager' => array(
		/*'lists' => array(
			'type' => array(
				'standard' => array(
					'delete' => array(
						'ansi' => '
							DELETE FROM "sw_review_list_type"
							WHERE :cond AND siteid = ?
						'
					),
					'insert' => array(
						'ansi' => '
							INSERT INTO "sw_review_list_type" ( :names
								"code", "domain", "label", "pos", "status",
								"mtime", "editor", "siteid", "ctime"
							) VALUES ( :values
								?, ?, ?, ?, ?, ?, ?, ?, ?
							)
						'
					),
					'update' => array(
						'ansi' => '
							UPDATE "sw_review_list_type"
							SET :names
								"code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
								"status" = ?, "mtime" = ?, "editor" = ?
							WHERE "siteid" = ? AND "id" = ?
						'
					),
					'search' => array(
						'ansi' => '
							SELECT :columns
								msuplity."id" AS "review.lists.type.id", msuplity."siteid" AS "review.lists.type.siteid",
								msuplity."code" AS "review.lists.type.code", msuplity."domain" AS "review.lists.type.domain",
								msuplity."label" AS "review.lists.type.label", msuplity."status" AS "review.lists.type.status",
								msuplity."mtime" AS "review.lists.type.mtime", msuplity."editor" AS "review.lists.type.editor",
								msuplity."ctime" AS "review.lists.type.ctime", msuplity."pos" AS "review.lists.type.position"
							FROM "sw_review_list_type" AS msuplity
							:joins
							WHERE :cond
							ORDER BY :order
							OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
						',
						'mysql' => '
							SELECT :columns
								msuplity."id" AS "review.lists.type.id", msuplity."siteid" AS "review.lists.type.siteid",
								msuplity."code" AS "review.lists.type.code", msuplity."domain" AS "review.lists.type.domain",
								msuplity."label" AS "review.lists.type.label", msuplity."status" AS "review.lists.type.status",
								msuplity."mtime" AS "review.lists.type.mtime", msuplity."editor" AS "review.lists.type.editor",
								msuplity."ctime" AS "review.lists.type.ctime", msuplity."pos" AS "review.lists.type.position"
							FROM "sw_review_list_type" AS msuplity
							:joins
							WHERE :cond
							ORDER BY :order
							LIMIT :size OFFSET :start
						'
					),
					'count' => array(
						'ansi' => '
							SELECT COUNT(*) AS "count"
							FROM (
								SELECT msuplity."id"
								FROM "sw_review_list_type" AS msuplity
								:joins
								WHERE :cond
								ORDER BY msuplity."id"
								OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
							) AS list
						',
						'mysql' => '
							SELECT COUNT(*) AS "count"
							FROM (
								SELECT msuplity."id"
								FROM "sw_review_list_type" AS msuplity
								:joins
								WHERE :cond
								ORDER BY msuplity."id"
								LIMIT 10000 OFFSET 0
							) AS list
						'
					),
					'newid' => array(
						'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
						'mysql' => 'SELECT LAST_INSERT_ID()',
						'oracle' => 'SELECT sw_review_list_type_seq.CURRVAL FROM DUAL',
						'pgsql' => 'SELECT lastval()',
						'sqlite' => 'SELECT last_insert_rowid()',
						'sqlsrv' => 'SELECT @@IDENTITY',
						'sqlanywhere' => 'SELECT @@IDENTITY',
					),
				),
			),
			'standard' => array(
				'aggregate' => array(
					'ansi' => '
						SELECT "key", COUNT("id") AS "count"
						FROM (
							SELECT :key AS "key", msupli."id" AS "id"
							FROM "sw_review_list" AS msupli
							:joins
							WHERE :cond
							GROUP BY :key, msupli."id"
							ORDER BY :order
							OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
						) AS list
						GROUP BY "key"
					',
					'mysql' => '
						SELECT "key", COUNT("id") AS "count"
						FROM (
							SELECT :key AS "key", msupli."id" AS "id"
							FROM "sw_review_list" AS msupli
							:joins
							WHERE :cond
							GROUP BY :key, msupli."id"
							ORDER BY :order
							LIMIT :size OFFSET :start
						) AS list
						GROUP BY "key"
					'
				),
				'delete' => array(
					'ansi' => '
						DELETE FROM "sw_review_list"
						WHERE :cond AND siteid = ?
					'
				),
				'insert' => array(
					'ansi' => '
						INSERT INTO "sw_review_list" ( :names
							"parentid", "key", "type", "domain", "refid", "start", "end",
							"config", "pos", "status", "mtime", "editor", "siteid", "ctime"
						) VALUES ( :values
							?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					'
				),
				'update' => array(
					'ansi' => '
						UPDATE "sw_review_list"
						SET :names
							"parentid" = ?, "key" = ?, "type" = ?, "domain" = ?, "refid" = ?, "start" = ?,
							"end" = ?, "config" = ?, "pos" = ?, "status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
				),
				'search' => array(
					'ansi' => '
						SELECT :columns
							msupli."id" AS "review.lists.id", msupli."parentid" AS "review.lists.parentid",
							msupli."siteid" AS "review.lists.siteid", msupli."type" AS "review.lists.type",
							msupli."domain" AS "review.lists.domain", msupli."refid" AS "review.lists.refid",
							msupli."start" AS "review.lists.datestart", msupli."end" AS "review.lists.dateend",
							msupli."config" AS "review.lists.config", msupli."pos" AS "review.lists.position",
							msupli."status" AS "review.lists.status", msupli."mtime" AS "review.lists.mtime",
							msupli."editor" AS "review.lists.editor", msupli."ctime" AS "review.lists.ctime"
						FROM "sw_review_list" AS msupli
						:joins
						WHERE :cond
						ORDER BY :order
						OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
					',
					'mysql' => '
						SELECT :columns
							msupli."id" AS "review.lists.id", msupli."parentid" AS "review.lists.parentid",
							msupli."siteid" AS "review.lists.siteid", msupli."type" AS "review.lists.type",
							msupli."domain" AS "review.lists.domain", msupli."refid" AS "review.lists.refid",
							msupli."start" AS "review.lists.datestart", msupli."end" AS "review.lists.dateend",
							msupli."config" AS "review.lists.config", msupli."pos" AS "review.lists.position",
							msupli."status" AS "review.lists.status", msupli."mtime" AS "review.lists.mtime",
							msupli."editor" AS "review.lists.editor", msupli."ctime" AS "review.lists.ctime"
						FROM "sw_review_list" AS msupli
						:joins
						WHERE :cond
						ORDER BY :order
						LIMIT :size OFFSET :start
					'
				),
				'count' => array(
					'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT msupli."id"
							FROM "sw_review_list" AS msupli
							:joins
							WHERE :cond
							ORDER BY msupli."id"
							OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
						) AS list
					',
					'mysql' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT msupli."id"
							FROM "sw_review_list" AS msupli
							:joins
							WHERE :cond
							ORDER BY msupli."id"
							LIMIT 10000 OFFSET 0
						) AS list
					'
				),
				'newid' => array(
					'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
					'mysql' => 'SELECT LAST_INSERT_ID()',
					'oracle' => 'SELECT sw_review_list_seq.CURRVAL FROM DUAL',
					'pgsql' => 'SELECT lastval()',
					'sqlite' => 'SELECT last_insert_rowid()',
					'sqlsrv' => 'SELECT @@IDENTITY',
					'sqlanywhere' => 'SELECT @@IDENTITY',
				),
			),
		),*/
		'standard' => array(
			'delete' => array(
				'ansi' => '
					DELETE FROM "sw_review"
					WHERE :cond AND siteid = ?
				'
			),
			'insert' => array(
				'ansi' => '
					INSERT INTO "sw_review" ( :names
						"code", "label", "status",  "user_id", "product_id", "review", "rating", "mtime", "editor", "siteid", "ctime"
					) VALUES ( :values
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
			),
			'update' => array(
				'ansi' => '
					UPDATE "sw_review"
					SET :names
						"code" = ?, "label" = ?, "status" = ?, "user_id" = ?, "product_id" = ?, "review" = ?, "rating" = ?, "mtime" = ?, "editor" = ?
					WHERE "siteid" = ? AND "id" = ?
				'
			),
			'search' => array(
				'ansi' => '
					SELECT :columns
						msup."id" AS "review.id", msup."siteid" AS "review.siteid",
						msup."code" AS "review.code", msup."label" AS "review.label",
						msup."status" AS "review.status", msup."mtime" AS "review.mtime",
						msup."editor" AS "review.editor", msup."ctime" AS "review.ctime",
                        msup."user_id" AS "review.user_id",
                        msup."product_id" AS "review.product_id",
                        msup."review" AS "review.review",
                        msup."rating" AS "review.rating",
                        (SELECT "name" FROM "users" u WHERE u.id=msup.user_id LIMIT 1) AS "review.user_name", 
                        (SELECT "label" FROM "mshop_product" p WHERE p.id=msup.product_id LIMIT 1) AS "review.product_name"
					FROM "sw_review" AS msup
					:joins
					WHERE :cond
					GROUP BY :columns :group
						msup."id", msup."siteid", msup."code", msup."label", msup."status", msup."mtime",
						msup."editor", msup."ctime"
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
				'mysql' => '
					SELECT :columns
						msup."id" AS "review.id", msup."siteid" AS "review.siteid",
						msup."code" AS "review.code", msup."label" AS "review.label",
						msup."status" AS "review.status", msup."mtime" AS "review.mtime",
						msup."editor" AS "review.editor", msup."ctime" AS "review.ctime",
                        msup."user_id" AS "review.user_id",
                        msup."product_id" AS "review.product_id",
                        msup."review" AS "review.review",
                        msup."rating" AS "review.rating",
                        (SELECT "name" FROM "users" u WHERE u.id=msup.user_id LIMIT 1) AS "review.user_name", 
                        (SELECT "label" FROM "mshop_product" p WHERE p.id=msup.product_id LIMIT 1) AS "review.product_name"
					FROM "sw_review" AS msup
					:joins
					WHERE :cond
					GROUP BY :group msup."id"
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
			),
			'count' => array(
				'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT msup."id"
						FROM "sw_review" AS msup
						:joins
						WHERE :cond
						GROUP BY msup."id"
						ORDER BY msup."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
				'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT msup."id"
						FROM "sw_review" AS msup
						:joins
						WHERE :cond
						GROUP BY msup."id"
						ORDER BY msup."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
			),
			'newid' => array(
				'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
				'mysql' => 'SELECT LAST_INSERT_ID()',
				'oracle' => 'SELECT sw_review_seq.CURRVAL FROM DUAL',
				'pgsql' => 'SELECT lastval()',
				'sqlite' => 'SELECT last_insert_rowid()',
				'sqlsrv' => 'SELECT @@IDENTITY',
				'sqlanywhere' => 'SELECT @@IDENTITY',
			),
		),
	),
);
