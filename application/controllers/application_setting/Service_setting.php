<?php class Service_setting extends Admin_Controller{
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
            $this->load->view('components/application_setting/service_setting/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['serviceArea'] = get_result('service_area', ['trash'=> 0, 'status'=>'active'], ['service_area_code', 'name']);

            if(!empty($_POST['save'])){

                unset($_POST['save']);
                $save = 0;
                
                if($_POST['weight_package_id']){
                    foreach($_POST['weight_package_id'] as $key =>$area){

                        $data = [
                            'service_area_code' =>$_POST['service_area_code'],
                            'weight_package_id' =>$_POST['weight_package_id'][$key],
                            'rate'              =>$_POST['rate'][$key]
                        ];
                        
                        $whereService = [
                            'service_area_code' =>$_POST['service_area_code'],
                            'weight_package_id' =>$_POST['weight_package_id'][$key]
                        ];
                        $getServiceSetting = get_row('service_area_setting', $whereService);
                        
                        if(empty($getServiceSetting->service_area_code)){
                            $save = save_data('service_area_setting', $data);
                        }else{
                            $save = save_data('service_area_setting', $data, $whereService);
                        }
                    }
                }

                if ($save) {
                   set_msg('success', 'Service Area Setting Successfully Created !');
                   redirect('/application_setting/service_setting?system_id=OThfMTg2', 'refresh');
                } else {
                    set_msg('warning', 'Service Area Setting Not Created !');
                    redirect_back();
                }
            }
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/service_setting/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($service_area_code){

            if (save_data('service_area_setting', ['trash'=>1], ['service_area_code'=>$service_area_code])) {
                
                set_msg('success',  'Service Area Successfully Deleted !');
                redirect('/application_setting/service_setting?system_id=OThfMTg2', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Service Area Not Deleted !');
                redirect('/application_setting/service_setting?system_id=OThfMTg2', 'refresh');
            }
        }
    }
?>