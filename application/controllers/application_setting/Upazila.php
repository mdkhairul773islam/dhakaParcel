<?php class Upazila extends Admin_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['upazilaList'] = get_result('upazilas', ['trash'=> 0], ['id', 'name', 'district_id']);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/upazila/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['districts'] = get_result('districts', '', ['name', 'id as district_id'], '', 'name', 'ASC');

            if(!empty($_POST['save'])){

                unset($_POST['save']);
                $data = $_POST;
                $exist_upazila = get_row('upazilas', ['district_id'=>$_POST['district_id'], 'name'=>trim($_POST['name']), 'trash'=>0], 'id');
                
                // I have submitted the information of which agent will be under this record.  
                if(empty($exist_upazila->id)){
                    if (save_data('upazilas', $data)) {
                        set_msg('success', 'Upazila Successfully Created!', 'Upazila Successfully Created !');
                        redirect('/application_setting/upazila?system_id=OThfMTg4', 'refresh');
                    } else {
                        set_msg('warning', 'warning', 'Upazila Not Created !');
                        redirect_back();
                    }
                }else{
                    set_msg('warning', 'This upazila name already exists!', 'This upazila name already exists!');
                    redirect_back();  
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/upazila/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['districts'] = get_result('districts', '', ['name', 'id as district_id'], '', 'name', 'ASC');

            if(!empty($_POST['update'])){

                unset($_POST['update']);
                $data = $_POST;
                $exist_upazila = get_row('upazilas', ['district_id'=>$_POST['district_id'], 'name'=>trim($_POST['name']), 'id'=>$id, 'trash'=>0], 'id');
                
                // I have submitted the information of which agent will be under this record.  
                if(empty($exist_upazila->id)){
                    if (save_data('upazilas', $data, ['id'=>$id])) {
                        set_msg('success', 'Upazila Successfully Update!', 'Upazila Successfully Update!');
                        redirect('/application_setting/upazila?system_id=OThfMTg4', 'refresh');
                    } else {
                        set_msg('warning', 'warning', 'Upazila Not Created !');
                        redirect_back();
                    }
                }else{
                    set_msg('warning', 'This upazila name already exists!', 'This upazila name already exists!');
                    redirect_back();  
                }
            }

            $this->data['upazila'] = get_row('upazilas', ['id'=>$id, 'trash'=>0], ['district_id', 'id']);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/upazila/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('upazilas', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'Upazila Successfully Deleted !', 'Upazila Successfully Deleted !');
                redirect('/application_setting/upazila?system_id=OThfMTg4', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Upazila Not Deleted !');
                redirect('/application_setting/upazila?system_id=OThfMTg4', 'refresh');
            }
        }
    }
?>