<?php class Agent extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            
            $where = ['trash'=> 0] ;

            if(!empty($_POST)){
                
                foreach($_POST['date'] as $key => $val) {
                    if($val != null && $key == 'from') {
                        $where['date >='] = $val;
                    }

                    if($val != null && $key == 'to') {
                        $where['date <='] = $val;
                    }
                }
            }

            
            $this->data['agent_transactions'] = get_result('agent_transactions', $where);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/agent/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add_payment(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';


            if(!empty($_POST)){
                unset($_POST['save']);

                $data = $_POST;
                unset($data['payment']);

                $data['debit'] = $_POST['payment'];

                if(save_data('agent_transactions', $data)){
                    set_msg('success', 'Payment Successfully Created !', 'Payment Successfully Created !');
                    redirect_back();
                }else{
                    set_msg('warning', 'Payment Not Created !', 'Payment Not Created !');
                    redirect_back();
                }
            }


            $this->data['agent_list'] = get_result('users', ['privilege'=>'admin'], ['name as agnet_name', 'id', 'privilege', 'mobile'], '', 'name', 'ASC');

            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/agent/add_payment', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){
            
            $data['trash'] = 1;
            
            if(save_data('agent_transactions', $data, ['id'=>$id])){
                set_msg('success', 'Payment Successfully Delete !');
                redirect_back();
            }else{
                set_msg('warning', 'Payment Not Deleted !');
                redirect_back();
            }

        }
    }
?>