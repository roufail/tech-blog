<?php


if(!function_exists('trim_content')){
    function trim_content($content,$length){
        $content_ar = explode(' ',$content);
        $content    = array_splice($content_ar,0,$length);
        $content    = implode(' ',$content);
        return $content;
    }
}
