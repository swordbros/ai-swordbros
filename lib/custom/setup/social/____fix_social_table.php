<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FixSocialTable extends Migration
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
            echo " Social can't dropping ...\r\n";
        } catch(Exception $ex){
            echo " Dropping is terminated. \r\n";
        }

    }
    
    private static function fix_tables(){
        $queries = "
        ALTER TABLE `users` ADD `google_id` VARCHAR(255) NULL ;
        ALTER TABLE `users` ADD `vk_id` VARCHAR(255) NULL ;
        ALTER TABLE `users` ADD `fb_id` VARCHAR(255) NULL ;
        ";
        foreach(explode(';', $queries) as $sql){
            if(!empty($sql)){
                $parts = explode('`', $sql);
                if(isset($parts[1])) echo " ".$parts[1]." checking..... ";
                try{
                    DB::statement($sql);
                    if(isset($parts[1])) echo $parts[1]." created ✓\r\n";
                } catch(Exception $ex){
                    echo " Error.".$ex->getMessage()." \r\n";
                }
            }
        }

    }
    private static function copy_assets_files(){
        
    }

}
