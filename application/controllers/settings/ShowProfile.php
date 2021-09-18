<?php

class ShowProfile extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['aside_menu_id'] = '';//This menu varriable only used for aside menu activation
        $this->data['menu_selector'] = '';
        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['menu_dropdown_selector'] = "";//This menu varriable only used for aside Dropdown_menu activation
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        $this->data['active'] = 'data-target="profile"';
        $this->data['subMenu'] = 'data-target=""';

        $where=array('id'=>$this->input->get('id'));
        $this->data['profile']=read("users",$where);


        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/settings/show-profile', $this->data);
        $this->load->view('admin/includes/footer');
    }
    
    public function deleteProfile() {
        $receive = filter_input(INPUT_POST, 'condition');
        $path = './public/profiles/'.filter_input(INPUT_POST, 'path');
        $condition = json_decode($receive, TRUE); // json object to array
        
        $confirm = delete('users',$condition);
        // delete file from dir
        unlink($path);
        // delete_files($path);
        // show confirm message
        echo $this->data[$confirm];
    }

}

