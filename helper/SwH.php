<?php
class SwH{
   static function get_language(){
        try
        {
            $query = \DB::table('mshop_locale')->select('langid')->groupBy('langid')->having('langid', '>', '')->get();
            return json_decode(json_encode($query->all()),1);
            
        } catch(Exception $e){
            echo $e->getMessage();
        }       
   }
}
?>
