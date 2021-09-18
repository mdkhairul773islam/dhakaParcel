<?php

class Profile extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'profile';
        $this->data['aside_menu_id'] = '';//This menu varriable only used for aside menu activation
        $this->data['menu_selector'] = '';
    }
    
    public function index() {
        $this->data['menu_dropdown_selector'] = "";//This menu varriable only used for aside Dropdown_menu activation
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';
        $this->data['active'] = 'data-target="profile"';
        $this->data['subMenu'] = 'data-target=""';

        $username=$this->data['username'];
        $where=array('username'=>$username);
        $this->data['profile_info']=read('users',$where);


        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/settings/profile', $this->data);
        $this->load->view('admin/includes/footer');
    }
    
    /**
     * 1st check name validation
     * 2nd update database
     * 3rd update session data
     */
    public function name_validation() {
        // set form validation rules
        $this->form_validation->set_rules('full_name', 'New name', 'trim|required|max_length[100]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            message('warning', validation_errors('<p>', '</p>'));
        } else {
            // update information
            $update = array('name' => $this->input->post('full_name'));
            // where condition
            $where = array('username' => $this->data['username']);
            // update the database
            $confirm = update('users',$update, $where);
            // update session data
            $this->session->set_userdata('name', $this->input->post('full_name'));
            // show confirm message
            echo message($confirm);
        }
    }
    
    /**
     * 1st check email validation
     * 2nd update database
     * 3rd update session data
     */
    public function email_validation() {
        // set form validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'New email', 'trim|required|valid_email|max_length[100]|is_unique[users.email]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            message('warning', validation_errors('<p>', '</p>'));
        } else {
            // update information
            $update = array('email' => $this->input->post('email'));
            // where condition
            $where = array('username' => $this->data['username']);
            // update the database
            $confirm = update('users',$update, $where);
            // update session data
            $this->session->set_userdata('email', $this->input->post('email'));
            // show confirm message
            echo message($confirm);
        }
    }
    
    /**
     * 1st check mobile number validation
     * 2nd update database
     * 3rd update session data
     */
    public function mobile_validation() {
        // set form validation rules
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('mobile', 'New mobile number', 'trim|required|max_length[15]|is_unique[users.mobile]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            message('warning', validation_errors('<p>', '</p>'));
        } else {
            // update information
            $update = array('mobile' => $this->input->post('mobile'));
            // where condition
            $where = array('username' => $this->data['username']);
            // update the database
            $confirm = update('users',$update, $where);
            // update session data
            $this->session->set_userdata('mobile', $this->input->post('mobile'));
            // show confirm message
            echo message($confirm);
        }
    }
    
    /**
     * 1st check new and confirm password validation
     * 2nd username and old password combination exists or not
     * 3rd encrypt the password with md5 
     * 4th update database
     */
    public function password_validation() {
        // set form validation rules
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('new_pass', 'New password', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('conf_pass', 'Confirm password', 'trim|required|min_length[6]|matches[new_pass]|xss_clean');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            message('warning', validation_errors('<p>', '</p>'));
        } else {
            $condition = array(
                'username' => $this->data['username'],
                'password' => $this->hash($this->input->post('current_pass'))
            );
            
            if(read('users', $condition)){
                // update information
                $update = array('password' => $this->hash($this->input->post('conf_pass')));
                // where condition
                $where = array('username' => $this->data['username']);
                // update the database
                $confirm = update('users',$update, $where);
                // show confirm message
                echo message($confirm);
            } else {
                // message
                $emit = '<p>Your current password can not matches !</p>';
                echo message('warning', $emit);
            }
            
        }
    }

    public function edit_password(){
        // set form validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('new_pass', 'New password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('conf_pass', 'Confirm password', 'trim|required|min_length[6]|matches[new_pass]');
        
        if($this->form_validation->run() == FALSE){
            // call form validation error
            echo validation_errors();
        } else {
            $condition = array(
                'username' => $this->data['username'],
                'password' => $this->hash($this->input->post('current_pass'))
            );
            
            if(read('users', $condition)){
                // update information
                $update = array('password' => $this->hash($this->input->post('conf_pass')));
                // where condition
                $where = array('username' => $this->data['username']);
                // update the database
                $confirm = update('users', $update, $where);
                
                // show confirm message
                if($confirm){
                    echo 'Password Successfully Changed';
                }else{
                    echo 'Password Not Changed';
                }
            } else {
                // message
                echo 'Your current password can not matches !';
            }
            
        }
    }
    
    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }
}