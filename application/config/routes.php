<?php defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");


$route['default_controller'] 	= "Home";
$route['admin']  				= "access/users/login";
$route['user']   				= "access/subscriber/login";

$route['about']   			    = "Frontend/HomeController/about_us";
$route['sister_concern']        = "Frontend/HomeController/sister_concern";
$route['services']              = "Frontend/HomeController/services";
$route['testimonial']    	    = "Frontend/HomeController/testimonial";
$route['news']    	            = "Frontend/HomeController/news";
$route['contact']   			= "Frontend/HomeController/contact";
$route['get_password']   		= "Frontend/HomeController/get_password";
$route['password_message']      = "Frontend/HomeController/password_message";
$route['rider_or_agent_registration']      = "Frontend/HomeController/rider_or_agent_registration";

$route['page/(:any)']			= "Frontend/HomeController/pages/$1";

// User Authentication
$route['login']   			    = "Frontend/Auth/AuthController/login";
$route['verification']		    = "Frontend/Auth/AuthController/code_verification";
$route['logout']   			    = "Frontend/Auth/AuthController/logout";
$route['forgot']   			    = "Frontend/Auth/AuthController/forgot";
$route['registration']   		= "Frontend/Auth/AuthController/registration";

$route['resend_verification_code']		            = "Frontend/Auth/AuthController/resend_verification_code";
$route['forgot']						            = "Frontend/Auth/AuthController/forgot_password";
   
$route['user-panel/dashboard']  		            = "Frontend/Upanel/UpanelController";
$route['user-panel/user_info_set']  	            = "Frontend/Upanel/UpanelController/user_info_set";
$route['user-panel/profile']    		            = "Frontend/Upanel/UpanelController/profile";
$route['user-panel/user_image_set']                 = "Frontend/Upanel/UpanelController/user_image_set";
$route['user-panel/booking']                        = "Frontend/Upanel/UpanelController/booking";
$route['user-panel/booking/payment_method_info_get']= "Frontend/Upanel/UpanelController/payment_method_info_get";
$route['user-panel/booking_list']                   = "Frontend/Upanel/UpanelController/booking_list";
$route['user-panel/get_agent_zone_wise']            = "Frontend/Upanel/UpanelController/get_agent_zone_wise";
$route['user-panel/serialNo']                       = "Frontend/Upanel/UpanelController/serialNo";
$route['user-panel/delete']                         = "Frontend/Upanel/UpanelController/delete";
$route['user-panel/settings']   		            = "Frontend/Upanel/UpanelController/settings";

$route['404_override'] = '';