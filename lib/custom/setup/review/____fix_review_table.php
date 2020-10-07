<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FixReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->fix_tables();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        try{
            echo " `sw_review`, `sw_review_list` is Dropping...\r\n";
            // DB::statement("DROP TABLE `sw_review`, `sw_review_list`;");
            echo " Tables Dropped ✓\r\n";
        } catch(Exception $ex){
            echo " Dropping is terminated. \r\n";
        }

    }
    
    private static function fix_tables(){
        $sw_review = "CREATE TABLE `sw_review` (
  `id` int(11) NOT NULL,
  `siteid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varbinary(64) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sw_review_list` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `siteid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varbinary(134) NOT NULL DEFAULT '',
  `type` varbinary(64) NOT NULL,
  `domain` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refid` varbinary(36) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `sw_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_mssup_sid_status` (`siteid`,`status`),
  ADD KEY `idx_mssup_sid_label` (`siteid`,`label`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `sw_review_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_mssupli_pid_sid_dm_ty_rid` (`parentid`,`siteid`,`domain`,`type`,`refid`),
  ADD KEY `idx_mssupli_sid_key` (`siteid`,`key`),
  ADD KEY `fk_mssupli_pid` (`parentid`),
  ADD KEY `idx_mssupli_pid_sid_dm_pos_rid` (`parentid`,`siteid`,`domain`,`pos`,`refid`);

ALTER TABLE `sw_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `mshop_product`
  ADD `review_count` INT(11) NOT NULL, ADD `rating` DECIMAL(10,2) NOT NULL";
        foreach(explode(';', $sw_review) as $sql){
            if(!empty($sql)){
                $parts = explode('`', $sql);
                if(isset($parts[1])) echo " ".$parts[1]." Table checking..... ";
                try{
                    DB::statement($sql);
                    if(isset($parts[1])) echo $parts[1]." Table created ✓\r\n";
                } catch(Exception $ex){
                    echo " Table is exists. \r\n";
                }
            }
        }

    }
    private static function copy_assets_files(){
        
    }

}
