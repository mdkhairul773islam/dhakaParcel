<?php class District extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['districtList'] = get_result('districts', ['trash'=>0], [], '', 'name', 'ASC');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/district/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['service_area'] = get_result('service_area', ['trash'=>0, 'status'=>'active']);

            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = $_POST;
                if (save_data('districts', $data)) {
                   set_msg('success', 'Districts Successfully Created!');
                   redirect('/application_setting/district?system_id=OThfMTg3', 'refresh');
                } else {
                    set_msg('warning', 'Districts Not Created!');
                    redirect_back();
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/district/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['service_area'] = get_result('service_area', ['trash'=>0, 'status'=>'active']);

            if(!empty($_POST['update'])){
                unset($_POST['update']);
                $data = $_POST;
                if (save_data('districts', $data, ['id'=>$id])) {
                   set_msg('success', 'Districts Successfully Update!');
                   redirect('/application_setting/district/edit/'.$id.'?system_id=OThfMTg3', 'refresh');
                } else {
                    set_msg('warning', 'Districts Not Update!');
                    redirect_back();
                }
            }
            
            $this->data['district'] = get_row('districts', ['id'=>$id, 'trash'=>0]);

            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/district/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('districts', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success',  'District Successfully Deleted !');
                redirect('/application_setting/district?system_id=OThfMTg3', 'refresh');
            } else {
                set_msg('warning', 'District Not Deleted !');
                redirect('/application_setting/district?system_id=OThfMTg3', 'refresh');
            }
        }
    }
?>