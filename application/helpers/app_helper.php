<?php
if(!function_exists('set_title')){
    function set_title($params){
       return ucwords(str_replace("_"," ",$params));
    }
}

if(!function_exists('dump')){
    function dump ($var) {

        // Add formatting
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
         
        
    }
}


?>