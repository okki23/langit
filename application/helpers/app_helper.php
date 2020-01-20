<?php
if(!function_exists('set_title')){
    function set_title($params){
       return ucwords(str_replace("_"," ",$params));
    }
}
?>