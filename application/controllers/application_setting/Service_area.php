<?php class Service_area extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['service_area'] = get_result('service_area', ['trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/service_area/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['unitList'] = get_result('unit', ['status'=> 'active', 'trash'=> 0], ['name'], '', 'name', 'ASC');

            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = $_POST;
                
                // I have submitted the information of which agent will be under this record.  
                $lastId = save_data('service_area', $data, [], true);
                if ($lastId) {

                    $service_area_code = 'sa-'.$lastId;
                    save_data('service_area', ['service_area_code'=>$service_area_code], ['id'=>$lastId]);
                    
                   set_msg('success', 'Service Area Successfully Created !');
                   redirect('/application_setting/service_area?system_id=OThfMTg1', 'refresh');
                } else {
                    set_msg('warning', 'Service Area Not Created !');
                    redirect_back();
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/service_area/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['unitList'] = get_result('unit', ['status'=> 'active', 'trash'=> 0], ['name'], '', 'name', 'ASC');

            if(!empty($_POST['update'])){
                unset($_POST['update']);
                $data = $_POST;
                
                // I have submitted the information of which agent will be under this record.  

                if (save_data('service_area', $data, ['id'=>$id])) {
                   set_msg('success', 'Service Area Successfully Update!');
                   redirect('/application_setting/service_area/edit/'.$id.'?system_id=OThfMTg1', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Service Area Not Update!');
                    redirect_back();
                }
            }

            $this->data['service_area'] = get_row('service_area', ['id'=>$id]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/service_area/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('service_area', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success',  'Service Area Successfully Deleted !');
                redirect('/application_setting/service_area?system_id=OThfMTg1', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Service Area Not Deleted !');
                redirect('/application_setting/service_area?system_id=OThfMTg1', 'refresh');
            }
        }
    }
?>