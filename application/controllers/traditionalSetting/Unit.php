<?php class Unit extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['unitList'] = get_result('unit', ['trash'=>0]);
 
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/unit/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';


            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = $_POST;
                
                // I have submitted the information of which agent will be under this record.  
                if (save_data('unit', $data)) {
                   set_msg('success', 'success', 'Unit Successfully Created !');
                   redirect('/traditionalSetting/unit?system_id=MTAwXzE5Mg==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'unit Not Created !');
                    redirect_back();
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/unit/add', $this->data);
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
                if (save_data('unit', $data, ['id'=>$id])) {
                   set_msg('success', 'success', 'Unit Successfully update !');
                   redirect('/traditionalSetting/unit/edit/'.$id.'?system_id=MTAwXzE5Mg==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Unit Not Updatet !');
                    redirect_back();
                }
                
            }

            $this->data['unit'] = get_row('unit', ['id'=>$id, 'trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/unit/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('unit', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'success', 'Unit Successfully Deleted !');
                redirect('/traditionalSetting/unit?system_id=MTAwXzE5MA==', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Unit Not Deleted !');
                redirect('/traditionalSetting/unit?system_id=MTAwXzE5MA==', 'refresh');
            }
        }
    }
?>