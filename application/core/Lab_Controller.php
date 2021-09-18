<?php

class Lab_Controller extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();

        $this->data['errors']      = array();
        $this->data['site_name']   = config_item('site_name');
        $this->data['description'] = NULL;
        $this->load->helper("admin");
        $this->load->helper("io");
        
    }
}


// for fornend
class UserController extends Lab_Controller {
    function __construct() {
        parent::__construct();
        // Set default meta title
        $this->data['meta_title'] = 'Frontend meta title';
        $this->load->helper("confirmation");
        $this->load->helper("custom");
        $this->load->helper("io");
        $this->load->helper("ecom_front");
        $this->load->model("User_m");

        // Header & Footer
        $header = readTable('header');
        $footer = readTable('footer');

        $this->data['header'] = $header ? $header[0]: null;
        $this->data['footer'] = $footer ? $footer[0]: null;
        // End Header & Footer

        // Authenticate Urls
        $exception_uris = [
            'login',
            'registration',
            'verification',
            'resend_verification_code', 
            'forgot'
        ];

        // CHECKING AUTHENTICATION URI
        if(in_array(uri_string(), $exception_uris) == FALSE) {
            if($this->User_m->isLogin() == FALSE) {
                redirect('login');
            }else {
                $this->data['user_id']   = $this->session->userdata('subscriber_id');
                $this->data['image']     = $this->session->userdata('image');
                $this->data['username']  = $this->session->userdata('username');
                $this->data['name']      = $this->session->userdata('name');
                $this->data['email']     = $this->session->userdata('email');
                $this->data['mobile']    = $this->session->userdata('mobile');
            }
        }
    }
}

class Frontend_Controller extends Lab_Controller {
    function __construct() {
        parent::__construct();
        // Set default meta title
        $this->data['meta_title'] = 'Frontend meta title';
        $this->load->helper("confirmation");
        $this->load->helper("custom");
        $this->load->helper("io");
        $this->load->helper("ecom_front");
        $this->load->model("membership_m");
        // Header & Footer
        $header = readTable('header');
        $footer = readTable('footer');

        $this->data['header'] = $header ? $header[0]: null;
        $this->data['footer'] = $footer ? $footer[0]: null;
        // End Header & Footer
    }

}


// for backend
class Admin_Controller extends Lab_Controller {

    function __construct() {
        parent::__construct();
        // Set default meta title
        $this->data['meta_title'] = 'Backend meta title';
        $this->data['width']      = 'width';

        // Load helpers
        $this->load->model("membership_m");
        $this->load->helper("custom");
        $this->load->helper("sms");


        $system_id = $this->input->get('system_id');
        $system_id = explode('_',base64_decode($system_id));
        
        $aside_menu_id    = isset($system_id[0]) ? $system_id[0] : '';
        $dropdown_menu_id = isset($system_id[1]) ? $system_id[1] : 0;
        
        $this->data['aside_menu_id']    = $aside_menu_id; //This varriable only used for aside menu activation
        $this->data['dropdown_menu_id'] = $dropdown_menu_id; 
        
        // this action menus for table list action start
        $this->data["action_menus"] = read('system_action_menus',['status'=>1, 'parent_id'=>$aside_menu_id, 'dropdown_id'=>$dropdown_menu_id], 'position ASC');
        // this action menus for table list action end
        
        if(!empty($this->data['aside_menu_id'])){
            $this->data['menu_selector'] = read('system_aside_menus', ['status' => 1, 'id'=>$this->data['aside_menu_id']])[0]->selector;
        }
        
        if(isset($this->session->userdata()['user_id'])){
            $this->data['user_data'] = $this->session->userdata();
            
            //privilege maintainance code start here------------------
            // for more details contact with: Muhibbullah Ansary. Phone: 01770-989591
            
            // this code for aside menu start
            $this->data['privilege_for_aside']        = read('system_privileges', ['admin_id'=>$this->data['user_data']['user_id']]);
            $this->data['aside_menu_array']           = ($this->data['privilege_for_aside'] && isset($this->data['privilege_for_aside'][0]->aside_menu_id)) ? json_decode($this->data['privilege_for_aside'][0]->aside_menu_id, true) : '';
            $this->data['aside_dropdown_menu_array']  = ($this->data['privilege_for_aside'] && isset($this->data['privilege_for_aside'][0]->aside_menu_dropdown_id)) ? json_decode($this->data['privilege_for_aside'][0]->aside_menu_dropdown_id, true) : '';
            // this code for aside menu end
            
            // this code for view nav page start
            $this->data['privilege_for_nav']          = read('system_privileges', ['admin_id'=>$this->data['user_data']['user_id']]);
            $this->data['aside_dropdown_menu_array']  = ($this->data['privilege_for_nav'] && isset($this->data['privilege_for_nav'][0]->aside_menu_dropdown_id)) ? json_decode($this->data['privilege_for_nav'][0]->aside_menu_dropdown_id, true) : '';
            // this code for view nav page end
            
            // this code for list view page start
            $this->data['privilege_for_action']       = read('system_privileges', ['admin_id'=>$this->data['user_data']['user_id']]);
            $this->data['aside_action_menu_array']    = ($this->data['privilege_for_action'] && isset($this->data['privilege_for_action'][0]->action_menu_id)) ? json_decode($this->data['privilege_for_action'][0]->action_menu_id, true) : '';
            // this code for list view page end
            
            // privilege maintainance code end here------------------
        }
        
        
        // Login check
        $exception_uris = array(
            'access/users/login',
            'access/users/logout'
        );

        if(in_array(uri_string(), $exception_uris) == FALSE) {
            if($this->membership_m->loggedin() == FALSE) {
                redirect('access/users/login');
            }else {
                $this->data['image']     = $this->session->userdata('image');
                $this->data['username']  = $this->session->userdata('username');
                $this->data['name']      = $this->session->userdata('name');
                $this->data['email']     = $this->session->userdata('email');
                $this->data['mobile']    = $this->session->userdata('mobile');
                $this->data['branch']    = $this->session->userdata('branch');

                // $list_of_privilege    = config_item('privilege');
                $this->data['privilege'] = $this->session->userdata('admin');
            }
        }
    }
}

