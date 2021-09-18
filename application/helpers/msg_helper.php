<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// set default CRUD message
function message($type, $error = NULL) {
    $message = '';
    
    if($error == NULL){
        $warning = '<p>Undefine warning ! Error not detected.</p>';
    } else {
        $warning =  $error;
    }
    
    switch ($type) {
        case 'success':
            $message = '<div class="alert alert-success">'
            . '<h3><i class="fa fa-check-circle"></i> Success Message</h3>'
            . '<p>Data saved successfully completed ! Message confirm.</p>'
            . '</div>';
            
            break;
        case 'complete':
            $message = '<div class="alert alert-success">'
            . '<h3><i class="fa fa-check-circle"></i> Success Message</h3>'
            . $warning
            . '</div>';
            
            break;
        case 'update':
            $message = '<div class="alert alert-info">'
            . '<h3><i class="fa fa-pencil-square-o"></i> Update Message</h3>'
            . '<p>Data update successfully completed ! Message confirm.</p>'
            . '</div>';
            
            break;
        case 'delete':
            $message = '<div class="alert alert-danger">'
            . '<h3><i class="fa fa-times-circle"></i> Delete Message</h3>'
            . '<p>Data remove successfully completed ! Message confirm.</p>'
            . '</div>';
        
            break;
        case 'warning':
            $message = '<div class="alert alert-warning">'
            . '<h3><i class="fa fa-exclamation-triangle"></i> Warning Message</h3>'
            . $warning
            . '</div>';
            
            break;
        case 'operation':
            $message = '<div class="alert alert-info">'
            . '<h3><i class="fa fa-certificate"></i> Operation Confirmation</h3>'
            . $warning
            . '</div>';
            
            break;
        default:
            $message = '<div class="alert alert-info">'
            . '<h3><i class="fa fa-bolt"></i> Default Message</h3>'
            . '<p>Data update successfully completed ! Message confirm.</p>'
            . '</div>';
            
            break;
    }
    
    return $message;
}

