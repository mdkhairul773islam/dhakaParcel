<?php class Raider extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/raider/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add_payment(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/raider/add_payment', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
    }
?>
