<?php

class User_m extends Lab_Model {
    
    protected $_table_name = 'users';
    protected $_order_by = 'name';
    protected $_limit = '1';
            
    function __construct() {
        parent::__construct();
    }

    public function validation(){
        $where = [
            'username' => input_data('mobile'),
            'password' => $this->hash(input_data('password'))
        ];

        $userInfo = readTable('subscribers', $where);
        if($userInfo){

            $_SESSION['_token'] = base64_encode(json_encode($where));

            $header = readTable('header');
            if($header && $header[0]->is_verification!=1){
                if($this->login($where)){
                    return true;
                }else{
                    return false;
                }
            }
            else {
                $code = rand(1111, 9999);
                $text = "Your Verification Code Is {$code}";
                update('subscribers', ['verify_code'=>$code, 'is_use'=>0], $where);
                send_sms(input_data('mobile'), $text); 
                return true;
            }
        }
        else{
            if(isset($_SESSION['_token'])){
                unset($_SESSION['_token']);
            }
            return false;
        }
    }

    public function login($token) {
		$userInfo = readTable('subscribers', $token);
        if(!empty($userInfo)) {
            // log in user
            $data = array(
                'subscriber_id' => $userInfo[0]->id,
                'login_period'  => date('Y-m-d H:i:s a'),
                'name'          => $userInfo[0]->name,
                'email'         => $userInfo[0]->email,
                'username'      => $userInfo[0]->username,
                'mobile'        => $userInfo[0]->mobile,
                'image'         => $userInfo[0]->image,
                'subscriber'    => TRUE
            );

            $this->session->set_userdata($data);
            // store access info
            $info = array(
                'user_id'       => $userInfo[0]->id,
                'login_period'  => $this->session->userdata('login_period')
            );
            save("access_info", $info);
            return true;
        }
        else return false;
    }
    
    public function logout() {
        // updates access info
        $where = array(
            'user_id'       =>$this->session->userdata('user_id'),
            'login_period'  => $this->session->userdata('login_period')
        );

        $data = array('logout_period' => date('Y-m-d H:i:s a'));
        update("access_info", $data, $where);
        $this->session->sess_destroy();
    }
    
    public function isLogin() {
        return (bool) $this->session->userdata('subscriber');
    }
    
    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }
}

