<?php class Item_category extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['item_category_list'] = get_result('item_category', ['trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/item_category/index', $this->data);
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
                $data['category_code'] = date('ymd') . rand(10, 99);

                // I have submitted the information of which agent will be under this record.  
                if (save_data('item_category', $data)) {
                   set_msg('success', 'success', 'Item Category Successfully Created !');
                   redirect('traditionalSetting/item_category?system_id=MTAwXzE5MQ==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Item Category Not Created !');
                    redirect_back();
                } 
                
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/item_category/add', $this->data);
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
                if (save_data('item_category', $data, ['id'=>$id])) {
                   set_msg('success', 'success', 'Item Category Successfully update!');
                   redirect('traditionalSetting/item_category?system_id=MTAwXzE5MQ==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Item Category Not Updatet!');
                    redirect_back();
                }
                
            }

            $this->data['item_category_data'] = get_row('item_category', ['id'=>$id, 'trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/item_category/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('item_category', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'success', 'Item Category Successfully Deleted !');
                redirect('/traditionalSetting/vehicle?system_id=MTAwXzE5MA==', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Item Category Not Deleted !');
                redirect('/traditionalSetting/item_category?system_id=MTAwXzE5MQ==', 'refresh');
            }
        }
    }
?>