<?php class Testimonial extends Admin_Controller{
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
        $this->load->view('components/website_settings/testimonial/add', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function all_view(){
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        $this->data['testimonial'] = read('testimonial');

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/website_settings/testimonial/view', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function add_process(){
        $data = [
            'name'        => ($this->input->post('name')),
            'designation' => ($this->input->post('designation')),
            'description' => ($this->input->post('description'))
        ];

        $types = array('jpg','JPG','png','PNG','gif','GIF');
        $path  = "backend/images/testimonial/";
        $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
        $size  = '1024';

        if($path = upload_img("img", $types, $size, $path, $name)){
            $data['path'] = $path;
        }

        // check existance
        if(exist('testimonial', (['name'=>$this->input->post('name')]))==false){
            if(save('testimonial', $data)){
                set_msg('success', 'success', 'testimonial Successfully Created !');
            }else{
                set_msg('warning', 'warning', 'testimonial Not Created !');
            }
        }else{
            set_msg('warning', 'warning', 'testimonial Already Exists !');
        }
        redirect_back();
    }


    public function edit($id=null){
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        $this->data['testimonial'] = read('testimonial', ['id'=>$id]);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/website_settings/testimonial/edit', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }


    public function edit_process($id=null){
        $data = [
            'name'        => ($this->input->post('name')),
            'designation' => ($this->input->post('designation')),
            'description' => ($this->input->post('description'))
        ];


        if(!empty($_FILES['img']['name'])){
            $types = array('jpg','JPG','png','PNG','gif','GIF');
            $path  = "backend/images/testimonial/";
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
        if(update('testimonial', $data, ['id'=>$id])){
            set_msg('success', 'success', 'testimonial Successfully Update !');
        }else{
            set_msg('warning', 'warning', 'testimonial Not Update !');
        }
        redirect_back();
    }


    public function delete($id=null){
        if(file_exists($this->input->post('old_img'))){
            unlink($this->input->post('old_img'));
        }
        if(delete('testimonial', ['id'=>$id])){
            set_msg('success', 'success', 'testimonial Permanently Deleted !');
        }else{
            set_msg('warning', 'warning', 'testimonial Not Deleted !');
        }
        redirect_back();
    }
}?>
