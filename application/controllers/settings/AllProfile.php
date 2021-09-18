<?php

class AllProfile extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['aside_menu_id'] = '';//This menu varriable only used for aside menu activation
        $this->data['menu_selector'] = '';
    }
    
    public function index() {
        $this->data['menu_dropdown_selector'] = "";//This menu varriable only used for aside Dropdown_menu activation
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        //---------------------Delete Data Start------------------------------
        if($this->input->get("id")){
            delete('users',array('id'=>$this->input->get("id")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            set_msg('success','Success','User Successfully Deleted');
            redirect('settings/allProfile','refresh');
        }
        //---------------------Delete Data End--------------------------------

        $this->data['profiles']=read("users", ['privilege !='=>'president']);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/settings/all-profile', $this->data);
        $this->load->view('admin/includes/footer');
    }

}

