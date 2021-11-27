<?php class Item extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';


            $this->data['itemList'] = get_result('item', ['trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/item/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['categoryList'] = get_result('item_category', ['trash'=>0, 'status'=>'active'], '', '', 'category_name', 'ASC');
            $this->data['unitList']     = get_result('unit', ['trash'=>0, 'status'=>'active'], '', '', 'name', 'ASC');
            

            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = $_POST;
                $data['date'] = date('Y-m-d');
                $data['item_code'] = date('ymd') . rand(100, 999);

                // I have submitted the information of which agent will be under this record.  
                if (save_data('item', $data)) {
                   set_msg('success', 'success', 'Item Successfully Created !');
                   redirect('/traditionalSetting/item?system_id=MTAwXzE5Mw==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Item Not Created !');
                    redirect_back();
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/item/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['categoryList'] = get_result('item_category', ['trash'=>0, 'status'=>'active'], '', '', 'category_name', 'ASC');
            $this->data['unitList']     = get_result('unit', ['trash'=>0, 'status'=>'active'], '', '', 'name', 'ASC');
            
            if(!empty($_POST['update'])){
                unset($_POST['update']);
                $data = $_POST;
                $data['date'] = date('Y-m-d');
                
                // I have submitted the information of which agent will be under this record.  
                if (save_data('item', $data, ['id'=>$id])) {
                   set_msg('success', 'success', 'Item Successfully Update!');
                   redirect('traditionalSetting/item/edit/'.$id.'?system_id=MTAwXzE5Mw==', 'refresh');
                } else {
                    set_msg('warning', 'warning', 'Item Not Update !');
                    redirect_back();
                }
            }

            $this->data['item_data'] = get_row('item', ['id'=>$id, 'trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/traditional_setting/item/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('item', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'success', 'Item Successfully Deleted !');
                redirect('/traditionalSetting/item?system_id=MTAwXzE5Mw==', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Item Not Deleted !');
                redirect('/traditionalSetting/item?system_id=MTAwXzE5Mw==', 'refresh');
            }
        }
    }
?>