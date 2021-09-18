<?php

class Users extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $settings = read('header');
        $this->data['meta_title']  = ($settings ? $settings[0]->web_title : 'Login');
        $this->data['lab_favicon'] = '';
    }

    public function login() {
        $this->data['meta_keyword'] = '';
        $this->data['meta_description'] = '';
        
        if($this->membership_m->loggedin() == TRUE){
            redirect('admin/dashboard');
        }
            
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

            
        if($this->form_validation->run() == TRUE) {
            if($this->membership_m->login() == TRUE) {
                redirect('admin/dashboard');
            } else {
                set_msg('warning', 'warning', 'Wrong Username or Password!');
                redirect('access/users/login', 'refresh');
            }
        }
        $this->load->view('access/login', $this->data);
    }

    public function logout(){
        $this->membership_m->logout();
        set_msg('warning', 'warning', 'Logout Successfully Completed !');
        redirect('access/users/login');
    }
}
