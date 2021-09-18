<?php

class Membership_m extends Lab_Model {
    
    protected $_table_name = 'users';
    protected $_order_by = 'name';
    protected $_limit = '1';
            
    function __construct() {
        parent::__construct();
    }

    public function login() {
    	$holder = config_item('privilege');
        $developer=config_item('developer');

    	if($this->input->post('username') == $developer["username"] && $this->input->post('password') == $developer["password"]){}
    	else {
            $where = [
                'username' => input_data('username'),
                'password' => $this->hash(input_data('password'))
            ];
            
    		$userInfo = read('users', $where);
            
	        if(!empty($userInfo)) {
	            // log in user
	            $data = array(
	                'user_id'       => $userInfo[0]->id,
	                'login_period'  => date('Y-m-d H:i:s a'),
	                'name'          => $userInfo[0]->name,
	                'email'         => $userInfo[0]->email,
	                'username'      => $userInfo[0]->username,
	                'mobile'        => $userInfo[0]->mobile,
	                'privilege'     => $userInfo[0]->privilege,
	                'image'         => $userInfo[0]->image,
	                'branch'        => $userInfo[0]->branch,
	                'holder'        => $userInfo[0]->privilege,
	                'loggedin'      => TRUE
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
    	}
    }
    
    public function logout() {
        // updates access info
        $where = array(
            'user_id'       =>$this->session->userdata('user_id'),
            'login_period'  => $this->session->userdata('login_period')
        );
        $data = array('logout_period' => date('Y-m-d H:i:s a'));
        update("access_info",$data,$where);

        $this->session->sess_destroy();
    }
    
    public function loggedin() {
        return (bool) $this->session->userdata('loggedin');
    }
    
    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }
}

