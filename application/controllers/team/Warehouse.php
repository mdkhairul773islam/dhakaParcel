<?php class Warehouse extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['results'] = get_result('warehouse', ['trash' => 0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/warehouse/index', $this->data);
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
            $this->load->view('components/team/warehouse/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function store()
        {
            if(isset($_POST['save'])){

                $data = [
                    'created' => date('Y-m-d'),
                    'name' => $this->input->post('name'),
                    'type' => $this->input->post('type')
                ];

                $id = save_data('warehouse', $data, '', true);

                save_data('warehouse', ['code' => 'wh-'. $id], ['id' => $id]);


                set_msg('success', 'Warehouse Successfully Created.');
            }
            redirect('/team/warehouse?system_id=OTdfMTgy', 'refresh');
        }

        public function edit($id=null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['info'] = get_row('warehouse', ['id' => $id, 'trash' => 0]);

            if(empty($this->data['info'])){
                redirect('/team/warehouse?system_id=OTdfMTgy', 'refresh');
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/warehouse/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function update($id = null)
        {
            if(isset($_POST['update']) && !empty($id)){

                $data = [
                    'name' => $this->input->post('name'),
                    'type' => $this->input->post('type')
                ];

                save_data('warehouse', $data, ['id' => $id]);

                set_msg('update', 'Warehouse Successfully Update.');
            }

            redirect('/team/warehouse?system_id=OTdfMTgy', 'refresh');
        }


        public function delete($id=null)
        {
           if(!empty($id)){

                save_data('warehouse', ['trash' => 1], ['id' => $id]);

                set_msg('trash', 'Warehouse Successfully deleted.');
            }

            redirect('/team/warehouse?system_id=OTdfMTgy', 'refresh');
        }
    }
?>