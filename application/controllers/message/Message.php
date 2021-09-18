<?php
    class Message extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }
        
        
        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['message'] = read('message');
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/message/message', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function m_view($id=null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['message'] = read('message',['id'=>$id]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/message/view', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        
        
        public function add_message(){
            $data = [
                'name' => str_secure($this->input->post('name')),
                'email' => str_secure($this->input->post('email')),
                'subject' => str_secure($this->input->post('subject')),
                'message' => str_secure($this->input->post('message'))
            ];
            
            //image upload start
            //---------------------------------------------
            /*$types = array('jpg','JPG','png','PNG','gif','GIF');
            $path  = "backend/images/profile/";
            $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
            $size  = '1024';
    
            if($path = upload_img("img", $types, $size, $path, $name)){
                $data['path'] = $path;
            }*/
            
            // check existance
            if(exist('message', str_secure(['name'=>$this->input->post('name')]))==false){
                if(save('message', $data)){
                    set_msg('success', 'success', 'Message Successfully Created !');
                }else{
                    set_msg('warning', 'warning', 'Message Not Created !');
                }
            }else{
                set_msg('warning', 'warning', 'Message Already Exists !');
            }
            redirect_back();
        }
       
        
        public function delete($id=null){

            // delete old image
               /* if(file_exists($this->input->post('old_img'))){
                    unlink($this->input->post('old_img'));
                }*/

            if(delete('message', ['id'=>$id])){
                set_msg('success', 'success', 'Message Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'Message Not Deleted !');
            }
            redirect_back();
        }
        
        public function alignByAjax(){
            
        }
        
    }
?>