<?php class RiderAgent_list extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            
            $where = [];
            
            if(!empty($_POST['date'])){
                
                foreach($_POST['date'] as $key => $val) {
                    
                    if($val != null && $key == 'from') {
                        $where['date >='] = $val;
                    }
        
                    if($val != null && $key == 'to') {
                        $where['date <='] = $val;
                    }
                }
            }
            
            $this->data['rider_or_agent_registration'] = get_result('rider_or_agent_registration', $where, 'rider_or_agent_registration.*', '', 'id', 'DESC');


            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/riderAgent_list/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function delete($id) {
            
            $data['trash'] = 1;
            
            if(delete('rider_or_agent_registration', ['id'=>$id])){
                set_msg('success', 'Record Successfully Delete !');
                redirect_back();
            }else{
                set_msg('warning', 'Record Not Deleted !');
                redirect_back();
            }

        }
    }
?>