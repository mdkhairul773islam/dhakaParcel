<?php class WarehouseUser extends Admin_Controller{
        public function __construct(){
            parent::__construct();

            $this->load->library('upload');

            $this->data['warehouseList'] = get_result('warehouse', ['trash' => 0]);
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['results'] = get_result('users', ['privilege' => 'warehouse', 'trash' => 0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/warehouseUser/index', $this->data);
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
            $this->load->view('components/team/warehouseUser/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function store()
        {
            if(isset($_POST['save'])){

                $data = [
                    'opening' => date('Y-m-d H:i:s'),
                    'name'  => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'username' => $this->input->post('username'),
                    'password' => $this->hash($this->input->post('password')),
                    'branch' => $this->input->post('warehouse_code'),
                    'image' => file_upload('image', 'upload/warehouse_user'),
                    'privilege' => 'warehouse',
                ];

                save_data('users', $data);

                set_msg('success', 'Warehouse user Successfully Created.');
            }

            redirect('/team/warehouseUser?system_id=OTdfMTgz', 'refresh');
        }

        public function show($id = null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['info'] = get_row('users', ['id' => $id, 'privilege' => 'warehouse', 'trash' => 0]);

            if(empty($this->data['info'])){
                redirect('/team/warehouseUser?system_id=OTdfMTgz', 'refresh');
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/warehouseUser/show', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id = null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['info'] = get_row('users', ['id' => $id, 'privilege' => 'warehouse', 'trash' => 0]);

            if(empty($this->data['info'])){
                redirect('/team/warehouseUser?system_id=OTdfMTgz', 'refresh');
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/warehouseUser/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function update($id = null)
        {
            if(isset($_POST['update']) && !empty($id)){

                $data = [
                    'name'  => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'username' => $this->input->post('username'),
                    'branch' => $this->input->post('warehouse_code'),
                    'status' => $this->input->post('status'),
                ];

                if(!empty($_POST['password'])){
                    $data['password'] = $this->hash($this->input->post('password'));
                }

                if(!empty($_FILES['image']['name'])){
                    if(!empty($_POST['old_image']) && file_exists($_POST['old_image'])){
                        unlink($_POST['old_image']);
                    }

                    $data['image'] = file_upload('image', 'upload/warehouse_user');
                }


                save_data('users', $data, ['id' => $id, 'privilege' => 'warehouse', 'trash' => 0]);

                set_msg('update', 'Warehouse User Successfully Update.');
            }

            redirect('/team/warehouseUser?system_id=OTdfMTgz', 'refresh');
        }


        public function delete($id=null)
        {
           if(!empty($id)){

            save_data('users', ['trash' => 1], ['id' => $id, 'privilege' => 'warehouse', 'trash' => 0]);

                set_msg('trash', 'Warehouse User Successfully deleted.');
            }

            redirect('/team/warehouseUser?system_id=OTdfMTgz', 'refresh');
        }

        private function hash($string) {
            return hash('md5', $string . config_item('encryption_key'));
        }
    }
?>