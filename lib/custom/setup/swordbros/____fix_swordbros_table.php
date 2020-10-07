<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FixSwordbrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->fix_tables();
        $this->copy_assets_files();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        try{

        } catch(Exception $ex){
            echo " Dropping is terminated. \r\n";
        }

    }
    
    private static function fix_tables(){
        $table_sql = "";
        foreach(explode(';', $table_sql) as $sql){
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
        $files[] = public_path('swordbros/css/swordbros.css');
        $files[] = public_path('swordbros/js/swordbros.js');
        $files[] = public_path('swordbros/img/empty.png');
        foreach($files as $file ){
            echo " File: ".$file;
            if( !is_file($file)){
                if(!is_dir(dirname($file)))mkdir(dirname($file), 0777, true);
                if(fopen($file, "w")){
                    echo " is created ✓\r\n";
                } else {
                    echo " is not created ×\r\n";
                }
            } else{
                 echo " is allreadey exists ×\r\n";
            }
        }
    }

}
