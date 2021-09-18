<?php class Slider_controller extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }
        
        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['slider'] = read('sliders', ['status'=>1]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/slider/list', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        
        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/slider/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        
        public function add_process(){

            $data = [
                'name'      => str_secure($this->input->post('name')),
                'is_offer'  => (isset($_POST['is_offer']) ? $_POST['is_offer'] : 0)
            ];
            
            //image upload start
            //---------------------------------------------
            $types = array('jpg','JPG','jpeg','png','PNG','gif','GIF');
            $path  = "public/images/slider/";;
            $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
            $size  = '1024';
    
            if($path = upload_img("img", $types, $size, $path, $name)){
                $data['path'] = $path;
            }
            
            // check existance
            if(exist('sliders', str_secure(['name'=>$this->input->post('name')]))==false){
                if(save('sliders', $data)){
                    set_msg('success', 'success', 'Slider Successfully Created !');
                }else{
                    set_msg('warning', 'warning', 'Slider Not Created !');
                }
            }else{
                set_msg('warning', 'warning', 'Slider Already Exists !');
            }
            redirect_back();
        }
        
        
        public function edit($id=null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['slider'] = read('sliders', ['id'=>$id,'status'=>1]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/slider/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        
        public function edit_process($id=null){
            $data = [
                'name'      => str_secure($this->input->post('name')),
                'is_offer'  => (isset($_POST['is_offer']) ? $_POST['is_offer'] : 0)
            ];
            
            if(!empty($_FILES['img']['name'])){
                //image upload start 
                $types = array('jpg','JPG','jpeg','png','PNG','gif','GIF');
                $path  = "public/images/slider/";
                $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
                $size  = '1024';
        
                if($path = upload_img("img", $types, $size, $path, $name)){
                    $data['path'] = $path;
                }
                
                // delete old image
                if(file_exists($this->input->post('old_img'))){
                    unlink($this->input->post('old_img'));
                }
            }
            
            
            if(update('sliders', $data, ['id'=>$id])){
                set_msg('success', 'success', 'Slider Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'Slider Not Update !');
            }
            redirect_back();
        }
        
        
        public function trash($id=null){
            if(update('sliders', ['status'=>0], ['id'=>$id])){
                set_msg('success', 'success', 'Slider Successfully Deleted !');
            }else{
                set_msg('warning', 'warning', 'Slider Not Deleted !');
            }
            redirect_back();
        }
        
        
        public function trash_list(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['slider'] = read('sliders', ['status'=>0]);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/slider/trash_list', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        
        public function restore($id=null){
            if(update('sliders', ['status'=>1], ['id'=>$id])){
                set_msg('success', 'success', 'Slider Successfully Restored !');
            }else{
                set_msg('warning', 'warning', 'Slider Not Restored !');
            }
            redirect_back();
        }
        
        
        public function delete($id=null){
            if(delete('sliders', ['id'=>$id])){
                set_msg('success', 'success', 'Slider Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'Slider Not Deleted !');
            }
            redirect_back();
        }
        
        public function alignByAjax(){
            
        }
        
    }
?>