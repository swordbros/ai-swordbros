<?php 
return [

    'table' => [
        'sw_slider' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

            $table = $schema->createTable( 'sw_slider' );

            $table->addColumn( 'id', 'integer', array( 'autoincrement' => true ) );
            $table->addColumn( 'siteid', 'integer', [] );
            $table->addColumn( 'type', 'string', array( 'length' => 64 ) );
            $table->addColumn( 'code', 'string', array( 'length' => 64, 'notnull' => false ) );
            $table->addColumn( 'langid', 'string', array( 'length' => 5, 'notnull' => false ) );
            $table->addColumn( 'domain', 'string', array( 'length' => 32 ) );
            $table->addColumn( 'label', 'string', array( 'length' => 255 ) );
            $table->addColumn( 'content', 'text', array( 'length' => 0xffffff ) );
            $table->addColumn( 'provider', 'string', array( 'length' => 255 ) );
            $table->addColumn( 'status', 'smallint', [] );
            $table->addColumn( 'mtime', 'datetime', [] );
            $table->addColumn( 'ctime', 'datetime', [] );
            $table->addColumn( 'editor', 'string', array('length' => 255 ) );
            $table->addColumn( 'start', 'datetime', [] );
            $table->addColumn( 'end', 'datetime', [] );
            $table->addColumn( 'config', 'text', array( 'length' => 0xffffff ) );
            $table->addColumn( 'pos', 'integer', [] );
            $table->setPrimaryKey( array( 'id' ), 'pk_swsil_id' );
            $table->addIndex( array( 'siteid', 'domain', 'code' ), 'idx_swsil_sid_domain_status' );
            return $schema;
        },
    ]

];
?>