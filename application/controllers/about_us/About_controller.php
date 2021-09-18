<?php class About_controller extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function add() {
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $about = readTable('about');
            $this->data['about'] = ($about ? $about[0] : null);

            if($_POST)
            {
                $data = ['description' => $_POST['description']];
                if($_FILES && $_FILES['img']['name']!=''){
                    if($about && file_exists($about[0]->path)){
                        unlink($about[0]->path);
                    }
                    $data['path'] = uploadFile('public/images', 'img');                        
                }
                if($about) {
                    update('about', $data, ['id'=>$about[0]->id]);
                }
                else {
                    save('about', $data);
                }
                set_msg('success', 'Successfully Saved');
                redirect('about_us/About_controller/add?system_id=MjY=', 'refresh');
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/about_us/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

    }
?>
