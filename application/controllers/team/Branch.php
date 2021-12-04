<?php class Branch extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['branchList'] = get_result('branch', ['trash'=>0, 'status'=>'active']);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branch/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['districtList'] = get_result('districts', ['trash'=> 0, 'status'=>'active'], ['id', 'name']);
            
            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = $_POST;

                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    $data['image']   = uploadToWebp($_FILES['image'], 'public/upload/branch/', time(), 270, null, 80);
                }
                
                $lastId = save_data('branch', $data, [], true);
                    
                if ($lastId) {
                    $code = 'br-'.$lastId;
                    save_data('branch', ['code'=>$code], ['id'=>$lastId]);
                    
                    set_msg('success', 'Branch Successfully Created!');
                    redirect('/team/branch?system_id=OTdfMTc5', 'refresh');
                } else {
                    set_msg('warning', 'Branch Not Created !');
                    redirect_back();
                }
                
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branch/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function show($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['branch'] = get_row('branch', ['id'=>$id, 'trash'=> 0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branch/show', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';


            $this->data['districtList'] = get_result('districts', ['trash'=> 0, 'status'=>'active'], ['id', 'name']);

            $branchImage = get_name('branch', 'image', ['id'=>$id, 'trash'=>0]);
            
            if(!empty($_POST['update'])){
                unset($_POST['update']);
                $data = $_POST;
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    if($data['image']   = uploadToWebp($_FILES['image'], 'public/upload/branch/', time(), 270, null, 80)){
                        (!empty($branchImage->image) ? unlink($branchImage->image) : '');
                    }
                }
                
                if (save_data('branch', $data, ['id'=>$id])) {
                    set_msg('success', 'Branch Successfully Update!');
                    redirect('/team/branch/edit/'.$id.'?system_id=OTdfMTc5', 'refresh');
                } else {
                    set_msg('warning', 'Branch Not Created !');
                    redirect_back();
                }
                
            }
            
            $this->data['branch'] = get_row('branch', ['id'=>$id, 'trash'=>0]);
            
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/branch/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('branch', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'success', 'Branch Successfully Deleted !');
                redirect('/team/branch?system_id=OTdfMTc5', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Branch Not Deleted !');
                redirect('/team/branch?system_id=OTdfMTc5', 'refresh');
            }
        }
    }
?>