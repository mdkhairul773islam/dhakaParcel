<?php class BranchUser extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['branchUserList'] = get_result('users', ['privilege'=>'branch', 'trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branchUser/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['branchList'] = get_result('branch', ['trash'=> 0, 'status'=>'active'], ['code', 'name'], '', 'name', 'ASC');

            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = $_POST;

                if(!empty($_POST['password'])){
                    $data['password'] = $this->hash($_POST['password']);
                    $data['opening'] = date('Y-m-d h:i:sa');
                    $data['privilege'] = "branch";
                }
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    $data['image']   = uploadToWebp($_FILES['image'], 'public/upload/branch/', time(), 270, null, 80);
                }
                          
                if (save_data('users', $data)) {
                    set_msg('success', 'Branch User Successfully Created!');
                    redirect('/team/branchUser?system_id=OTdfMTgw', 'refresh');
                } else {
                    set_msg('warning', 'Branch User Not Created !');
                    redirect_back();
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branchUser/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function show($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['branch'] = get_row('users', ['id'=>$id, 'trash'=> 0], ['branch', 'name', 'email', 'address', 'mobile', 'image', 'status'], '', 'name', 'ASC');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branchUser/show', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['branchList'] = get_result('branch', ['trash'=> 0, 'status'=> 0]);


            if(!empty($_POST['update'])){
                unset($_POST['update']);
                $data = $_POST;

                if(!empty($_POST['password'])){
                    $data['password'] = $this->hash($_POST['password']);
                }
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    $data['image']   = uploadToWebp($_FILES['image'], 'public/upload/branch/', time(), 270, null, 80);
                }
                          
                if (save_data('users', $data, ['id'=>$id])) {
                    set_msg('success', 'Branch User Successfully Update!');
                    redirect('/team/branchUser/edit/'.$id.'?system_id=OTdfMTgw', 'refresh');
                } else {
                    set_msg('warning', 'Branch User Not Update!');
                    redirect_back();
                }
                
            }


            $this->data['branch'] = get_row('users', ['id'=>$id, 'trash'=> 0], ['branch', 'name', 'email', 'address', 'mobile', 'image', 'status'], '', 'name', 'ASC');


            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branchUser/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }


        public function delete($id){

            if (save_data('users', ['trash'=>1], ['id'=>$id])) {
                set_msg('success', 'success', 'Branch Successfully Deleted!');
                redirect('/team/branchUser?system_id=OTdfMTgw', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Branch Not Deleted!');
                redirect('/team/branchUser?system_id=OTdfMTgw', 'refresh');
            }
        }
        
        public function hash($string) {
            return hash('md5', $string . config_item('encryption_key'));
        }
    }
?>