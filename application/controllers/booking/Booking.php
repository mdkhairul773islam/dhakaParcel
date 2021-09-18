<?php class Booking extends Admin_Controller{
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
            $this->load->view('components/booking/booking', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
       
        public function delete($id=null){
            if(delete('message', ['id'=>$id])){
                set_msg('success', 'success', 'Booking Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'Booking Not Deleted !');
            }
            redirect_back();
        }
    }
?>