<?php class Blog extends Admin_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';
        
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/website_settings/blog/add', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }
    
    
    public function all_view(){
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';
        
        $this->data['blog'] = read('blog');
        
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/website_settings/blog/list', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }
    
    public function add_process(){
        $data = [
            'date' => ($this->input->post('date')),
            'title' => ($this->input->post('title')),
            'description' => ($this->input->post('description'))
        ];
        
        //image upload start
        $types = array('jpg','JPG','png','PNG','gif','GIF', 'webp');
        $path  = "backend/images/blog/";
        $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
        $size  = '1024';

        if($path = upload_img("img", $types, $size, $path, $name)){
            $data['path'] = $path;
        }
        
        // check existance
        if(exist('blog', (['title'=>$this->input->post('title')]))==false){
            if(save('blog', $data)){
                set_msg('success', 'success', 'blog Successfully Created !');
            }else{
                set_msg('warning', 'warning', 'blog Not Created !');
            }
        }else{
            set_msg('warning', 'warning', 'blog Already Exists !');
        }
        redirect_back();
    }
    
    public function edit($id=null){
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';
        
        $this->data['blog'] = read('blog', ['id'=>$id]);
        
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/website_settings/blog/edit', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }
    
    
    public function edit_process($id=null){
        $data = [
            'date' => ($this->input->post('date')),
            'title' => ($this->input->post('title')),
            'description' => ($this->input->post('description'))
        ];
        
        if(!empty($_FILES['img']['name'])){
            //image upload start
            $types = array('jpg','JPG','png','PNG','gif','GIF', 'webp');
            $path  = "backend/images/blog/";
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
        
        if(update('blog', $data, ['id'=>$id])){
            set_msg('success', 'success', 'blog Successfully Update !');
        }else{
            set_msg('warning', 'warning', 'blog Not Update !');
        }
        redirect_back();
    }
    
    public function delete($id=null){
        // delete old image
        if(file_exists($this->input->post('old_img'))){
            unlink($this->input->post('old_img'));
        }

        if(delete('blog', ['id'=>$id])){
            set_msg('success', 'success', 'blog Permanently Deleted !');
        }else{
            set_msg('warning', 'warning', 'blog Not Deleted !');
        }
        redirect_back();
    }
}?>