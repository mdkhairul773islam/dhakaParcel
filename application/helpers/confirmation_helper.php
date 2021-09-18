<?php

// set default CRUD message
function message($type, $content = array()) {
    // set the default title
    $title = array(
        "danger"    => "DANGER",
        "info"      => "INFORMATION",
        "success"   => "SUCCESS",
        "warning"   => "WARNING"
    );

    // set the default icon
    $icon = array(
        "danger"    => "trash-o",
        "info"      => "info-circle",
        "success"   => "check-square-o",
        "warning"   => "warning"
    );

    // set the default emit
    $emit = array(
        "danger"    => "Oh snap! This information need to set by user.",
        "info"      => "Heads up! This information need to set by user.",
        "success"   => "Well done! Your action has been execute successfully.",
        "warning"   => "Warning! This information need to set by user."
    );

    // set the default close button
    $btn = '';

    if(count($content) > 0){
        // check the message title exists into the array
        if(array_key_exists('title', $content)){
            $title[$type] = $content['title'];
        }

        // check the message icon exists into the array
        if(array_key_exists('icon', $content)){
            $icon[$type] = $content['icon'];
        }

        // check the message emit exists into the array
        if(array_key_exists('emit', $content)){
            $emit[$type] = $content['emit'];
        }

        // check the message emit exists into the array
        if(array_key_exists('btn', $content)){
            if($content['btn']){
                $btn = '<button type="button" class="close"><span aria-hidden="true">&times;</span></button>';
            }
        }
    }

    $message = '<div class="alert alert-'. $type .'" style="margin-top:15px;">'
    . '<h3><i class="fa fa-'. $icon[$type] .'"></i> '. strtoupper($title[$type]) .'</h3>'
    . $btn
    . '<p>'. $emit[$type] .'</p>'
    . '</div>';

    return $message;
}
