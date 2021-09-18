<?php
    class PrivilegeController extends Admin_Controller{
        public function __construct(){
            parent::__construct();
            $this->data['menu_selector'] = "privilege";
        }
        public function index(){
            $this->data['menu_dropdown_selector'] = "";
            
            $this->data['users'] = read('users', ['privilege !='=>'president']);
            $this->data['system_aside_menus'] = read('system_aside_menus', ['status'=>1]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            //$this->load->view('components/system_privilege/nav', $this->data);
            $this->load->view('components/system_privilege/set_privilege', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        } 
        
        function process(){
            foreach($_POST as $key => $value){
                if($key !== 'save' && $key !== 'update' && $key !== 'admin_id'){
                    $data[$key] = json_encode($value);
                }
                if($key == 'admin_id'){
                    $data[$key] = $value;
                }
            }
            if(isset($_POST['save'])){
                if(save('system_privileges',$data)){
                    set_msg('success', 'Success', 'Privilege Successfully Saved!');
                }else{
                    set_msg('success', 'Success', 'Privilege Not Saved!');
                }
            }
            
            if(isset($_POST['update'])){
                if(update('system_privileges', $data, ["admin_id"=>$this->input->post('admin_id')])){
                    set_msg('success', 'Success', 'Privilege Successfully Updated!');
                }else{
                    set_msg('success', 'Success', 'Privilege Not Updated!');
                }
            }
            redirect_back();
        }
    }
?>