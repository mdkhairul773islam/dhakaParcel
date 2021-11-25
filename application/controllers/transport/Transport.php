<?php class Transport extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            
            $this->data['transport'] = get_result('transport');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/transport/view', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function create(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/transport/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add_process(){
            
            $code =date('ds').rand(100, 999);
            
            $data = $_POST;
            $data['code'] = $code;

            // check existance
            if(exist('transport', (['code'=>$this->input->post('code')]))===false){
                if(save('transport', $data)){
                    set_msg('success', 'success', 'Transport Successfully Created !');
                }else{
                    set_msg('warning', 'warning', 'Transport Not Created !');
                }
            }else{
                set_msg('warning', 'warning', 'Transport Already Exists !');
            }
            redirect_back();
        }


        public function edit($id=null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            
            $this->data['transport'] = get_row('transport', ['id'=>$id]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/transport/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }


        public function edit_process($id=null){
            
            $data = $_POST;

            if(update('transport', $data, ['id'=>$id])){
                set_msg('success', 'success', 'Transport Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'Transport Not Update !');
            }
            redirect_back();
        }

        public function delete($id=null){
           
            if(delete('transport', ['id'=>$id])){
                set_msg('success', 'success', 'Transport Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'Transport Not Deleted !');
            }
            redirect_back();
        }
    }
?>
