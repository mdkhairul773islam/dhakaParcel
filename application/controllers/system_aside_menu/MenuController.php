<?php
    class MenuController extends Admin_Controller{
        public function __construct(){
            parent::__construct();
            $this->data['menu_selector'] = "aside_menu";//This menu varriable only used for aside menu activation
        }
        
        // index as a list method
        public function index(){
            $this->data['menu_dropdown_selector'] = "list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['menus'] = read('system_aside_menus', ['status'=>1]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/menu/nav', $this->data);
            $this->load->view('components/system_menus/menu/all', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function add(){
            $this->data['menu_dropdown_selector'] = "create";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/menu/nav', $this->data);
            $this->load->view('components/system_menus/menu/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function store(){
            $validation = exist('system_aside_menus', ['name'=>$_POST['name']]);
            if(!$validation){
                $result = save('system_aside_menus', $_POST);
                if($result){
                    set_msg('success','Success!','Aside Menu Successfully Created!');
                }else{
                    set_msg('warning','Warning!','Aside Menu Not Created!');
                }
            }else{
                set_msg('danger','Danger!','This Menu already exists!');
            }
            redirect_back();
        }
        
        public function edit($id){
            $this->data['menu_dropdown_selector'] = "list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['menu_item'] = read('system_aside_menus', ['id'=>$id, 'status'=>1]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/menu/nav', $this->data);
            $this->load->view('components/system_menus/menu/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function edit_process($id){
            if(!isset($_POST['has_sub_menu'])){
                $_POST['has_sub_menu'] = 0;
            }
            if(!isset($_POST['has_action_menu'])){
                $_POST['has_action_menu']=0;
            }
            $result = update('system_aside_menus', $_POST, ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Aside Menu Successfully Update!');
            }else{
                set_msg('warning','Warning!','Aside Menu Not Update!');
            }
            redirect_back();
        }
        
        public function trash_list(){
            $this->data['menu_dropdown_selector'] = "trash_list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['menus'] = read('system_aside_menus', ['status'=>0]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/menu/nav', $this->data);
            $this->load->view('components/system_menus/menu/trash_list', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function trash($id){
            $result = update('system_aside_menus', ['status'=>0], ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Aside Menu Successfully Send to Trash!');
            }else{
                set_msg('warning','Warning!','Aside Menu Not Send to Trash!');
            }
            redirect_back();
            
        }
        
        public function restore($id){
            $result = update('system_aside_menus', ['status'=>1], ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Aside Menu Successfully Restor From Trash!');
            }else{
                set_msg('warning','Warning!','Aside Menu Not Restor From Trash!');
            }
            redirect_back();
        }
        
        public function delete($id){
            $result = delete('system_aside_menus', ['id'=>$id]);;
            if($result){
                set_msg('success','Success!','Aside Menu Successfully deleted!');
                
                // delete dropdown according to menu
                delete('system_aside_menu_dropdowns', ['parent_id'=>$id]);
                // delete action menu according to menu
                delete('system_action_menus', ['parent_id'=>$id]);
            }else{
                set_msg('warning','Warning!','Aside Menu Not deleted!');
            }
            redirect_back();
            
        }
        
        
        
        
        
        public function alignment(){
            $this->data['menu_dropdown_selector'] = "alignment";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword']     = '';
            $this->data['meta_title']       = '';
            $this->data['meta_description'] = '';
            
            $this->data['menus'] = read('system_aside_menus', ['status'=>1], 'position ASC');
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/menu/nav', $this->data);
            $this->load->view('components/system_menus/menu/alignment', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function ajax_alignment_process(){
            $idAndPosition = json_decode($this->input->post("positionStr"));
            
            foreach($idAndPosition as $id => $position){
                update('system_aside_menus', ['position'=>$position], ['id'=>$id]);
            }
            echo 1;
        }
        
    }
?>