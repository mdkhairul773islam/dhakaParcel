<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// send sms the application
    function send_sms($gsm, $txt) {
    
        //Getting SMS report Start here
        $CI = & get_instance();
        $sent_sms = 0;
        
        $total_sms      = config_item("total_sms");
        $total_send_sms = $CI->db->query("SELECT COUNT(*) AS total_send_sms FROM sms_record WHERE delivery_report=1")->row();
        $total_send_sms = (!empty($total_send_sms->total_send_sms) ? $total_send_sms->total_send_sms : 0);
        
        if ($total_send_sms < $total_sms){
            
            try{
                $username = "bgpsc";
                $password = "freelance@IT321";
                $mobile = trim($gsm);
                $url = "https://user.mobireach.com.bd/index.php?r=sms/service";
                
                //Sending Request Start here
                $soapClient = new SoapClient($url);
                $value = $soapClient->SendTextMessage($username,$password,'8801842088236',$mobile,$txt);
                if($value->Status == 0){
                    return true;
                }
                return false;
                
            }catch(Exception $e){
                echo $e;
            }
        }
        else{
            return false;
        }

    }
?>