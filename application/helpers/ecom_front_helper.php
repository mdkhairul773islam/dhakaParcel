<?php

// Get All Colors Id As Array
if (!function_exists('toSlug')) {
    function toSlug($text){   
        return str_replace(' ', '-', $text);
    }
}

// Get All Colors Id As Array
if (!function_exists('toBase64')) {
    function toBase64($text){   
        if(gettype($text)=='array'){
            return base64_encode(json_encode($text));
        }
        else{return base64_encode($text);}
    }
}

function user(){
    $CI = & get_instance();

    if($CI->session->userdata('subscriber'))
    {
        $user = readTable('subscribers', ['id'=>$CI->session->userdata('subscriber_id')]);
        return ($user ? $user[0] : false);
    }
    else{
        return false;
    }
    
}
if (!function_exists('slug')) {
    function slug($title){   
        //
        return str_replace(' ', '-', str_replace('/', '-', $title));
    }
}





