<?php

class EditProfile extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->data['aside_menu_id'] = '';//This menu varriable only used for aside menu activation
        $this->data['menu_selector'] = '';
    }
    
    public function index() {
        $this->data['menu_dropdown_selector'] = "";//This menu varriable only used for aside Dropdown_menu activation
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        $id = $this->input->get('id');
        $where = array('id' => $id);
    
        if(isset($_POST['profileEditBtn'])){
            $this->profileUpdate($id,$where);
        }

        $this->data['profile']=read("users", $where);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/settings/edit-profile', $this->data);
        $this->load->view('admin/includes/footer');
    }

    public function profileUpdate($id,$where){
        $privilege = empty($this->input->post('privilege')) ? 'president' : $this->input->post('privilege');
        $data = array(
            'name'=>$this->input->post('f_name'),
            'email'     => $this->input->post('email'),
            'mobile'    => $this->input->post('mobile'),
            'privilege' => $privilege,
            'branch'    => $this->input->post('branch')
        ); 

        //image size, path and name setup Example
        //---------------------------------------------
        $types = array('jpg','JPG','png','PNG','gif','GIF');
        $path  = "public/profiles/";
        $name  = "profile_".(strtotime(date('Y-m-d h:i:s'))*10);

        if($path = upload_img("image", $types, $size="1024", $path, $name)){
            $data['image'] = $path;
            if (is_file($img)) {
                unlink($img);
            }
        }

        if(update('users', $data, $where)){
            set_msg('success','success','Profile Updated Successfully');
        }else{
            set_msg('warning','warning','Profile Not Updated');
        }

        redirect('settings/editProfile?id='.$id);
    }

    function handle_upload() {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {

                $img = "./".$_POST['img_url'];
                if (is_file($img)) {
                    unlink($img);
                }

                $config['upload_path']   = './public/profiles/';
                $config['allowed_types'] = 'jpeg|jpg|png|gif';
                $config['max_size']      = '1024';
                $config['file_name']     = $this->input->post('username');
                $config['overwrite']     = true;

                // $this->load->library('upload', $config);
                $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                
                return true;
            } else {
                // possibly do some clean up ... then throw an error
                $msg_array=array(
                    "title"=>"Warning",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                );
                $this->data['confirmation']=message('warning',$msg_array);
                set_msg('warning','warning',$this->upload->display_errors());
                return false;
            }
        }
    }
	
	public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }


}

