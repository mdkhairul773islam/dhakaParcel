<?php
    class DropdownMenuController extends Admin_Controller{
        public function __construct(){
            parent::__construct();
            $this->data['menu_selector'] = "aside_dropdown";//This menu varriable only used for aside menu activation
            $this->data['aside_menu_id'] = $this->input->get('aside_menu_id');//This menu varriable only used for aside menu activation
        }
        
        // index as a list method
        public function index(){
            $this->data['menu_dropdown_selector'] = "list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $select    = 'system_aside_menu_dropdowns.*, system_aside_menus.name as menu_name';
            $join_cond = 'system_aside_menu_dropdowns.parent_id=system_aside_menus.id';
            $where     = ['system_aside_menu_dropdowns.status'=>1, 'system_aside_menus.status'=>1];
    
            $this->data['menus_dropdown'] = join_read('system_aside_menu_dropdowns', 'system_aside_menus', $join_cond,$where, $select);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/dropdown/nav', $this->data);
            $this->load->view('components/system_menus/dropdown/all', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function add(){
            $this->data['menu_dropdown_selector'] = "create";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['aside_menu_data'] = read('system_aside_menus', ['status'=>1,'has_sub_menu'=>1]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/dropdown/nav', $this->data);
            $this->load->view('components/system_menus/dropdown/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function store(){
            $cond = [
                'parent_id' => $this->input->post('parent_id'),
                'name'      => $this->input->post('name')
            ];
                
            if(exist('system_aside_menu_dropdowns', $cond)) {
                set_msg('warning','Warning!','This Dropdown Already Exist!');
                redirect_back();    
            }
            
            $result = save('system_aside_menu_dropdowns', $_POST);
            if($result){
                set_msg('success','Success!','Dropdown Successfully Added!');
            }else{
                set_msg('warning','Warning!','Dropdown Not Added!');
            }
            redirect_back();
        }
        
        public function edit($id){
            $this->data['menu_dropdown_selector'] = "list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['aside_menu_data'] = read('system_aside_menus');
            $this->data['menu_dropdowns']  = read('system_aside_menu_dropdowns', ['status'=>1, 'id'=>$id]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/dropdown/nav', $this->data);
            $this->load->view('components/system_menus/dropdown/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function edit_process($id){
            $cond = [
                'id !='     => $id,
                'parent_id' => $this->input->post('parent_id'),
                'name'      => $this->input->post('name')
            ];
                
            if(exist('system_aside_menu_dropdowns', $cond)) {
                set_msg('warning','Warning!','This Dropdown Already Exist!');
                redirect_back();    
            }
            
            $result = update('system_aside_menu_dropdowns', $_POST, ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Dropdown Successfully Updated!');
            }else{
                set_msg('warning','Warning!','Dropdown Not Updated!');
            }
            redirect_back();
        }
        
        
        public function trash_list(){
            $this->data['menu_dropdown_selector'] = "trash_list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            
            $select    = 'system_aside_menu_dropdowns.*, system_aside_menus.name as menu_name';
            $join_cond = 'system_aside_menu_dropdowns.parent_id=system_aside_menus.id';
            $where     = ['system_aside_menu_dropdowns.status'=>0, 'system_aside_menus.status'=>1];
    
            $this->data['menus_dropdown'] = join_read('system_aside_menu_dropdowns', 'system_aside_menus', $join_cond,$where, $select);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/dropdown/nav', $this->data);
            $this->load->view('components/system_menus/dropdown/trash_list', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function trash($id){
            $result = update('system_aside_menu_dropdowns', ['status'=>0], ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Dropdown Successfully Send To Trash !');
            }else{
                set_msg('warning','Warning!','Dropdown Not Send To Trash !!');
            }
            redirect_back();
        }
        
        
        public function restore($id){
            $result = update('system_aside_menu_dropdowns', ['status'=>1], ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Dropdown Successfully Testor From Trash !');
            }else{
                set_msg('warning','Warning!','Dropdown Not Testor!');
            }
            redirect_back();
        }
        
        public function delete($id){
            $result = delete('system_aside_menu_dropdowns', ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Dropdown Successfully deleted!');
            }else{
                set_msg('warning','Warning!','Dropdown Not deleted!');
            }
            redirect_back();
        }
        
        
        
        
        
        public function alignment(){
            $this->data['menu_dropdown_selector'] = "alignment";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword']     = '';
            $this->data['meta_title']       = '';
            $this->data['meta_description'] = '';
            
            $this->data['aside_menus'] = read('system_aside_menus', ['status'=>1], 'position ASC');
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/dropdown/nav', $this->data);
            $this->load->view('components/system_menus/dropdown/alignment', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function ajax_alignment_process(){
            $idAndPosition = json_decode($this->input->post("positionStr"));
            
            foreach($idAndPosition as $id => $position){
                update('system_aside_menu_dropdowns', ['position'=>$position], ['id'=>$id]);
            }
            echo 1;
        }
    }
?>