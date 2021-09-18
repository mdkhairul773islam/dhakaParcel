<?php

class CreateProfile extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->data['aside_menu_id'] = '';//This menu varriable only used for aside menu activation
        $this->data['menu_selector'] = '';
    }

    public function index($emit = NULL) {
        // set default message
        $this->data['message'] = $emit;
        $this->data['confirmation'] = null;

        $this->data['menu_dropdown_selector'] = "";//This menu varriable only used for aside Dropdown_menu activation
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';


        
        if (isset($_POST['createProfileBtn'])) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|is_unique[users.email]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('mobile', 'Mobile number', 'trim|required|max_length[15]|is_unique[users.mobile]');
            $this->form_validation->set_rules('privilege', 'Privilege', 'required');

            if ($this->form_validation->run() == FALSE) {
                // call form validation error
                set_msg('danger','danger','Validation Failed.');
            } else {
                // set img upload condition
                $config['upload_path'] = './public/profiles/';
                $config['allowed_types'] = 'jpeg|jpg|png|gif';
                $config['max_size'] = '1024';
                $config['file_name'] = $this->input->post('username');
                $config['overwrite'] = true;

                // $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->form_validation->set_rules('image', 'Photo', 'callback_handle_upload');

                if ($this->form_validation->run() == FALSE) {
                    // call form validation error
                    set_msg('danger','danger','Validation Failed.');
                } else {
                    $upload_data = $this->upload->data();
                    $file = $upload_data['file_name'];

                    $insert = array(
                        'opening'   => date('Y-m-d h:i:s'),
                        'name'      => $this->input->post('f_name'),
                        'email'     => $this->input->post('email'),
                        'mobile'    => $this->input->post('mobile'),
                        'username'  => $this->input->post('username'),
                        'password'  => $this->hash($this->input->post('password')),
                        'privilege' => $this->input->post('privilege'),
                        'image'     => 'public/profiles/'.$file
                    );

                    if(save('users',$insert)){
                        set_msg('success','success','Profile Successfully Created.');
                    }else{
                        set_msg('warning','warning','Profile Not Created.');
                    }
                    redirect('settings/createProfile');
                }
            }
        }

        // set the views
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/settings/create-profile', $this->data);
        $this->load->view('admin/includes/footer');
    }

    function handle_upload() {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                $this->upload->data();
                return true;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('handle_upload', "You must upload an valid image!");
            return false;
        }
    }

    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }

}
