<?php
class SmsManage extends Frontend_Controller {
    function __construct() {
        parent::__construct();
        $this->data['about'] = read('about');
        
        $this->data['footer'] = read('footer');
        $this->data['header'] = read('header');
    }
    public function index() {
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/sms_manamge', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
    }
}
