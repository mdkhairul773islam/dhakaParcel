<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function age($date){
    list($year, $month, $day) = explode("-", $date);

    $doy = date('Y') - $year;
    $dom = date('m') - $month;
    $dod = date('d') - $day;

    if($dod < 0 || $dom < 0) $doy--;
    return $doy;
}


function custom_fetch($var, $field){
    if (isset($var)) {
        return $var[0]->$field;
    }
}


function v_check($value){
    if ($value!=null) {
        return $value;
    }else{
        return "N/A";
    }
}


function f_number($data){
    return number_format($data, 2);
}


function filter($value){
    $capitalize="";
    $rmv_scor=str_replace("_"," ", $value);
    
    if (mb_detect_encoding($rmv_scor)!='UTF-8') {
        $capitalize=ucwords($rmv_scor);
    }else{
        $capitalize=$rmv_scor;
    }
    return $capitalize;
}


//Function for Dynamic Language Start
function caption($index, $lan='en'){
    $CI = & get_instance();
    $label_lang = config_item('label_lang');
    return $label_lang[$index][$lan];
}


function message_length($strlength, $message = NULL){
	$messLen = 0;
	
	if (strlen($message) != strlen(utf8_decode($message))) {
        if( $strlength <= 63){ $messLen = 1; }
		else if( $strlength <= 126){ $messLen = 2; }
		else if( $strlength <= 189){ $messLen = 3; }
		else if( $strlength <= 252){ $messLen = 4; }
		else if( $strlength <= 315){ $messLen = 5; }
		else if( $strlength <= 378){ $messLen = 6; }
		else if( $strlength <= 441){ $messLen = 7; }
		else if( $strlength <= 504){ $messLen = 8; }
		else { $messLen = "Equal to an MMS."; }		
    }else{
		if( $strlength <= 160){ $messLen = 1; }
		else if( $strlength <= 306){ $messLen = 2; }
		else if( $strlength <= 459){ $messLen = 3; }
		else if( $strlength <= 612){ $messLen = 4; }
		else if( $strlength <= 765){ $messLen = 5; }
		else if( $strlength <= 918){ $messLen = 6; }
		else if( $strlength <= 1071){ $messLen = 7; }
		else if( $strlength <= 1080){ $messLen = 8; }
		else { $messLen = "Equal to an MMS."; }
    }
    return $messLen;
}

