<?php class Sister_concern extends Admin_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';
        
        $this->data['sister'] = read('sister_concern');

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/website_settings/sister_concern/index', $this->data);
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
        $this->load->view('components/website_settings/sister_concern/add', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }
    
    
    public function add_process(){
        $data = [
            'date'  => date('Y-m-d'),
            'title' => ($this->input->post('title')),
            'url'   => ($this->input->post('url'))
        ];

        //image upload start
        $types = array('jpg','JPG','png','PNG','gif','GIF');
        $path  = "backend/images/sister/";
        $name  = 'sister'.(strtotime(date('Y-m-d h:i:s'))*10);
        $size  = '1024';

        if($path = upload_img("img", $types, $size, $path, $name)){
            $data['path'] = $path;
        }

        // check existance
        if(exist('sister_concern', (['title'=>$this->input->post('name')]))==false){
            if(save('sister_concern', $data)){
                set_msg('success', 'success', 'Sister Concern Successfully Created !');
            }else{
                set_msg('warning', 'warning', 'Sister Concern Not Created !');
            }
        }else{
            set_msg('warning', 'warning', 'Sister Concern Already Exists !');
        }
        redirect_back();
    }

    public function edit($id=null){
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        $this->data['sister'] = read('sister_concern', ['id'=>$id]);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/website_settings/sister_concern/edit', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }


    public function edit_process($id=null){
        $data = [
            'update_at' => date('Y-m-d'),
            'title'     => ($this->input->post('title')),
            'url'       => ($this->input->post('url'))
        ];
        if(!empty($_FILES['img']['name'])){
            //image upload start
            $types = array('jpg','JPG','png','PNG','gif','GIF');
            $path  = "backend/images/sister/";
            $name  = 'sister'.(strtotime(date('Y-m-d h:i:s'))*10);
            $size  = '1024';
            if($path = upload_img("img", $types, $size, $path, $name)){
                $data['path'] = $path;
            }
            // delete old image
            if(file_exists($this->input->post('old_img'))){
                unlink($this->input->post('old_img'));
            }
        }
        if(update('sister_concern', $data, ['id'=>$id])){
            set_msg('success', 'success', 'Sister Concern Successfully Updated !');
        }else{
            set_msg('warning', 'warning', 'Sister Concern Not Update !');
        }
        
        redirect_back();
    }

    public function delete($id=null){
        // delete old image
        if(file_exists($this->input->post('old_img'))){
            unlink($this->input->post('old_img'));
        }
        if(delete('sister_concern', ['id'=>$id])){
            set_msg('success', 'success', 'Sister Concern Permanently Deleted !');
        }else{
            set_msg('warning', 'warning', 'Sister Concern Not Deleted !');
        }
        redirect_back();
    }
}?>