<?php class Area extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['areaList'] = get_result('area', ['trash'=> 0], [], '', 'name', 'ASC');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/area/index', $this->data);
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
                
                // I have submitted the information of which agent will be under this record.  
                if (save_data('area', $data)) {
                   set_msg('success', 'success', 'Area Successfully Created !');
                   redirect('/application_setting/area?system_id=OThfMTg5', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Area Not Created !');
                    redirect_back();
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/area/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            if(!empty($_POST['update'])){
                
                unset($_POST['update']);
                $data = $_POST;
                
                // I have submitted the information of which agent will be under this record.  
                if (save_data('area', $data, ['id'=>$id])) {
                   set_msg('success', 'success', 'Area Successfully update!');
                   redirect('/application_setting/area/edit/'.$id.'?system_id=OThfMTg5==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Area Not Updatet!');
                    redirect_back();
                }
                
            }

            $this->data['districts'] = get_result('districts', '', ['name', 'id as district_id'], '', 'name', 'ASC');
            $this->data['area'] = get_row('area', ['id'=>$id, 'trash'=>0], [], '', 'name', 'ASC');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/area/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('area', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'success', 'Area Successfully Deleted !');
                redirect('/application_setting/area?system_id=OThfMTg5', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Area Not Deleted !');
                redirect('/application_setting/area?system_id=OThfMTg5', 'refresh');
            }
        }
    }
?>