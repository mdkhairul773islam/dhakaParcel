<?php
    class ActionMenuController extends Admin_Controller{
        public function __construct(){
            parent::__construct();
            $this->data['menu_selector'] = "aside_action_menu";//This menu varriable only used for aside menu activation
        }
        
        // index as a list method
        public function index(){
            $this->data['menu_dropdown_selector'] = "list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $select = 'system_action_menus.*, system_aside_menus.name as menu_name';
            $join_cond = 'system_action_menus.parent_id=system_aside_menus.id';
            $where = ['system_action_menus.status'=>1, 'system_aside_menus.status'=>1];
            
            $this->data['action_menus'] = join_read('system_action_menus', 'system_aside_menus', $join_cond,$where, $select);
            
            
            // $this->data['action_menus'] = read('system_action_menus', ['status'=>1]);
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/action/nav', $this->data);
            $this->load->view('components/system_menus/action/all', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function add(){
            $this->data['menu_dropdown_selector'] = "create";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['parent_menus'] = read('system_aside_menus',['status'=>1]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/action/nav', $this->data);
            $this->load->view('components/system_menus/action/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function store(){
            $validation = exist('system_action_menus', ['parent_id'=>$_POST['parent_id'],'dropdown_id'=>$_POST['dropdown_id'],'name'=>$_POST['name']]);
            if(!$validation){
                $result = save('system_action_menus', $_POST);
            }
            if($result){
                set_msg('success','Success!','Action Menu Successfully inserted!');
            }else{
                set_msg('warning','Warning!','This Action Menu already exists!');
            }
            redirect_back();
        }
        
        public function edit($id){
            $this->data['menu_dropdown_selector'] = "list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['parent_menus'] = read('system_aside_menus',['status'=>1]);
            $this->data['action_menu_item'] = read('system_action_menus', ['id'=>$id, 'status'=>1])[0];
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/action/nav', $this->data);
            $this->load->view('components/system_menus/action/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function edit_process($id){
            if(!exist('system_action_menus', $_POST['name'])){
                $result = update('system_action_menus', $_POST, ['id'=>$id]);
                if($result){
                    set_msg('success','Success!','Action Menu Successfully Update!');
                }
                else{
                    set_msg('warning','Warning!','Action Menu Not Update!');
                }
            }else{
                set_msg('warning','Warning!','This Action Menu already exists!');
            }
            redirect_back();
        }
        
        public function trash_list(){
            $this->data['menu_dropdown_selector'] = "trash_list";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $select = 'system_action_menus.*, system_aside_menus.name as menu_name';
            $join_cond = 'system_action_menus.parent_id=system_aside_menus.id';
            $where = ['system_action_menus.status'=>0, 'system_aside_menus.status'=>1];
            
            $this->data['action_menus'] = join_read('system_action_menus', 'system_aside_menus', $join_cond,$where, $select);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/action/nav', $this->data);
            $this->load->view('components/system_menus/action/trash_list', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function trash($id){
            $result = update('system_action_menus', ['status'=>0], ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Action Menu Successfully Send to trash!');
            }else{
                set_msg('warning','Warning!','Action Menu Not Successfully Send to trash!');
            }
            redirect_back(); 
        }
        
        public function restore($id){
            $result = update('system_action_menus', ['status'=>1], ['id'=>$id]);
            if($result){
                set_msg('success','Success!','Action Menu Successfully restore!');
            }else{
                set_msg('warning','Warning!','Action Menu Not Successfully restore!');
            }
            redirect_back();
        }
        
        public function delete($id){
            $result = delete('system_action_menus', ['id'=>$id]);;
            if($result){
                set_msg('success','Success!','Action Menu Successfully deleted!');
            }else{
                set_msg('warning','Warning!','Action Menu Not Successfully deleted!');
            }
            redirect_back();
            
        }
        
        
        
        public function alignment(){
            $this->data['menu_dropdown_selector'] = "alignment";//This menu varriable only used for aside Dropdown_menu activation
            $this->data['meta_keyword']     = '';
            $this->data['meta_title']       = '';
            $this->data['meta_description'] = '';
            
            $this->data['aside_menus'] = read('system_aside_menus', ['status'=>1, 'has_sub_menu'=>1, 'has_action_menu'=>1], 'position ASC');
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('components/system_menus/action/nav', $this->data);
            $this->load->view('components/system_menus/action/alignment', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function readDropdownMenuByAjax(){
            $aside_id = $this->input->post("aside_id");
            $query = [
		       'table'   =>'system_aside_menu_dropdowns',
		       'order_by'=>'position ASC',
		       'select'  => 'id,name',
		       'cond'    => ['status'=>1,'parent_id'=>$aside_id]
		   ];
		    
            $result = read($query);
            if($result){
               echo json_encode($result); 
            }else{
                echo 0;
            }
        }
        
        public function ajax_alignment_process(){
            $idAndPosition = json_decode($this->input->post("positionStr"));
            
            foreach($idAndPosition as $id => $position){
                update('system_action_menus', ['position'=>$position], ['id'=>$id]);
            }
            echo 1;
        }
    }
?>