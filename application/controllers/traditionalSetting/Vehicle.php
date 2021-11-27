<?php class Vehicle extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['vehicleList'] = get_result('vehicle', ['trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/vehicle/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';


            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = $_POST;
                $data['date'] = date('Y-m-d');
                $data['vehicle_code'] = date('ymd') . rand(100, 999);

                // I have submitted the information of which agent will be under this record.  
                if (save_data('vehicle', $data)) {
                   set_msg('success', 'success', 'Vehicle Successfully Created !');
                   redirect('/traditionalSetting/vehicle?system_id=MTAwXzE5MA==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Vehicle Not Created !');
                    redirect_back();
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/vehicle/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            if(!empty($_POST['update'])){
                
                unset($_POST['update']);
                $data = $_POST;
                $data['date'] = date('Y-m-d');

                // I have submitted the information of which agent will be under this record.  
                if (save_data('vehicle', $data, ['id'=>$id])) {
                   set_msg('success', 'success', 'Vehicle Successfully update !');
                   redirect('/traditionalSetting/vehicle/edit/'.$id.'?system_id=MTAwXzE5MA==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Vehicle Not Updatet !');
                    redirect_back();
                }
                
            }

            $this->data['vehicleData'] = get_row('vehicle', ['id'=>$id, 'trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/vehicle/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('vehicle', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'success', 'Vehicle Successfully Deleted !');
                redirect('/traditionalSetting/vehicle?system_id=MTAwXzE5MA==', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Vehicle Not Deleted !');
                redirect('/traditionalSetting/vehicle?system_id=MTAwXzE5MA==', 'refresh');
            }
        }
    }
?>