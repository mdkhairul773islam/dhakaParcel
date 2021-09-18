<?php

class Picture extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['aside_menu_id'] = '';//This menu varriable only used for aside menu activation
        $this->data['menu_selector'] = '';
    }
    
    public function index($emit = NULL) {
        // set default message
        $this->data['message'] = $emit;
        
        $this->data['menu_dropdown_selector'] = "";//This menu varriable only used for aside Dropdown_menu activation
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/navigation', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('components/settings/picture', $this->data);
        $this->load->view('admin/includes/footer');
    }
    
    public function validation() {
        $config['upload_path']      = './public/profiles/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = '1024';
        $config['file_name']        = $this->session->userdata('username');
        $config['overwrite']        = true;
        
        $this->load->library('upload', $config);
           
        if ($this->upload->do_upload("profile_pic")) {
            $upload = $this->upload->data();
            $this->session->set_userdata('image', $upload['file_name']);
            
            $upload_data = $this->upload->data();
            
            $update = array('image' => $upload_data['file_name']);
            $where = array('username' => $this->session->userdata('username'));
            
            $this->load->model('settings_m');
            $confirm = $this->settings_m->update_profile($update, $where);
            
            // $this->data['description'] = 'Update confirm!';
            $this->index(message($confirm));
        }
    }
    
}

