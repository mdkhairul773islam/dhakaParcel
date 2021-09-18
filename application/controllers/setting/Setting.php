<?php class Setting extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }
        
        public function header() {
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['header'] = read('header');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/setting/header', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function footer(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['footer'] = read('footer');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/setting/footer', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add_header(){
            $data = [
                'web_title' => ($this->input->post('site_title'))
            ];

            $types = array('jpg','JPG','png','PNG','gif','GIF');
            $path  = "backend/images/header/";
            $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
            $size  = '1024';

            if($path = upload_img("fev_img", $types, $size, $path, $name)){
                $data['fev_icon'] = $path;
            }

            // check existance
            if(update('header', $data, ['id'=>1])){
                set_msg('success', 'success', 'header Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'header Not Update !');
            }
            redirect_back();
        }

        public function add_header_logo(){
            $types = array('jpg','JPG','png','PNG','gif','GIF');
            $path  = "backend/images/header/";
            $name  = 'gallery'.(strtotime(date('Y-m-d h:i:s'))*10);
            $size  = '1024';

            if($path = upload_img("web_logo", $types, $size, $path, $name)){
                $data['web_logo'] = $path;
            }

            // check existance
            if(update('header', $data, ['id'=>1])){
                set_msg('success', 'success', 'footer Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'footer Not Update !');
            }
            redirect_back();
        }


        public function add_footer(){
            $data = [
                'location'  => ($this->input->post('location')),
                'email'     => ($this->input->post('email')),
                'phone'     => ($this->input->post('phone')),
                'fb_link'   => str_case_secure($this->input->post('fb_link')),
                'g_link'    => str_case_secure($this->input->post('g_link')),
                'in_link'   => str_case_secure($this->input->post('in_link')),
                'tw_link'   => str_case_secure($this->input->post('tw_link')),
                'youtube'   => str_case_secure($this->input->post('youtube'))
            ];

            // check existance
            if(update('footer', $data, ['id'=>1])){
                set_msg('success', 'success', 'footer Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'footer Not Update !');
            }
            redirect_back();
        }

        public function set_verification(){
            $header = readTable('header');
            if($header && isset($_POST['is_verification'])){
                update('header', $_POST, ['id'=>$header[0]->id]);
                set_msg('success', 'Status Successfully Updated');
            }
            redirect('setting/setting/header?system_id=MzRfODE=', 'refresh');
        }
    }
?>
