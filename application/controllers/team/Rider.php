<?php class Rider extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $select = [
                'users.id', 'users.name', 'users.mobile', 'users.branch', 'users.email', 'users.username',
                'rider_district.rider_id', 'rider_district.district_id', 'rider_district.rider_code'
            ];
            $this->data['riderList'] = get_join('users', 'rider_district', 'users.id=rider_district.rider_id', ['users.privilege'=>'rider', 'users.trash'=>0, 'rider_district.trash'=>0], $select);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/rider/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['districtList'] = get_result('districts', ['trash'=> 0, 'status'=>'active'], ['id', 'name'], '', 'name', 'ASC');
            $this->data['branchList'] = get_result('branch', ['trash'=> 0, 'status'=>'active'], ['code', 'name'], '', 'name', 'ASC');

            if(!empty($_POST['save'])){
                unset($_POST['save']);
                $data = [
                    'name'      => $_POST['name'],
                    'username'  => $_POST['username'],
                    'address'   => $_POST['address'],
                    'mobile'    => $_POST['mobile'],
                    'branch'    => $_POST['branch'],
                    'email'     => $_POST['email']
                ];

                if(!empty($_POST['password'])){
                    $data['password']   = $this->hash($_POST['password']);
                    $data['opening']    = date('Y-m-d h:i:sa');
                    $data['privilege']  = "rider";
                }
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    $data['image']   = uploadToWebp($_FILES['image'], 'public/upload/branch/', time(), 270, null, 80);
                }

                $lastID = save_data('users', $data, [], true);
                
                if ($lastID) {
                    $rider_code =  'R-'.date('ymd') . rand(10, 99);
                    
                    $riderInfo = [
                        'rider_id'      => $lastID,
                        'rider_code'    => $rider_code,
                        'district_id'   => $_POST['district_id'],
                    ];
                    
                    save_data('rider_district', $riderInfo);
                    
                    set_msg('success', 'Rider Successfully Created!');
                    redirect('/team/rider?system_id=OTdfMTc4', 'refresh');
                } else {
                    set_msg('warning', 'Rider Not Created !');
                    redirect_back();
                }
            }
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/rider/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function show($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $select = [
                'users.name', 'users.mobile', 'users.branch', 'users.email', 'users.address','users.username', 'users.image','users.status',
                'rider_district.rider_id', 'rider_district.district_id', 'rider_district.rider_code'
            ];
            $this->data['rider'] = get_join('users', 'rider_district', 'users.id=rider_district.rider_id', ['users.id'=>$id, 'users.trash'=>0, 'rider_district.trash'=>0], $select);
        
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/rider/show', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['districtList'] = get_result('districts', ['trash'=> 0, 'status'=>'active'], ['id', 'name'], '', 'name', 'ASC');
            $this->data['branchList'] = get_result('branch', ['trash'=> 0, 'status'=>'active'], ['code', 'name'], '', 'name', 'ASC');


            if(!empty($_POST['update'])){
                unset($_POST['update']);
                $data = [
                    'name'      => $_POST['name'],
                    'username'  => $_POST['username'],
                    'address'   => $_POST['address'],
                    'mobile'    => $_POST['mobile'],
                    'branch'    => $_POST['branch'],
                    'email'     => $_POST['email'],
                    'status'    => $_POST['status']
                ];

                if(!empty($_POST['password'])){
                    $data['password']   = $this->hash($_POST['password']);
                }
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    $data['image']   = uploadToWebp($_FILES['image'], 'public/upload/branch/', time(), 270, null, 80);
                }

                if (save_data('users', $data, ['id'=>$id, 'privilege'=>'rider'])) {
                    
                    $riderInfo = [
                        'district_id'   => $_POST['district_id'],
                    ];
                    
                    save_data('rider_district', $riderInfo, ['rider_id'=>$id]);
                    
                    set_msg('success', 'Rider Successfully Update!');
                    redirect('/team/rider/edit/'.$id.'?system_id=OTdfMTc4', 'refresh');
                } else {
                    set_msg('warning', 'Rider Not Update !');
                    redirect_back();
                }
            }


            $select = [
                'users.name', 'users.mobile', 'users.branch', 'users.email', 'users.address','users.username', 'users.image','users.status',
                'rider_district.rider_id', 'rider_district.district_id', 'rider_district.rider_code'
            ];
            $this->data['rider'] = get_join('users', 'rider_district', 'users.id=rider_district.rider_id', ['users.id'=>$id, 'users.trash'=>0, 'rider_district.trash'=>0], $select);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/rider/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('users', ['trash'=>1], ['id'=>$id])) {

                save_data('rider_district', ['trash'=>1], ['rider_id'=>$id]);
                
                set_msg('success', 'success', 'Rider Successfully Deleted!');
                redirect('/team/rider?system_id=OTdfMTc4', 'refresh');
            } else {
                set_msg('warning', 'Branch Not Deleted!');
                redirect('/team/rider?system_id=OTdfMTc4', 'refresh');
            }
        }
        
        public function hash($string) {
            return hash('md5', $string . config_item('encryption_key'));
        }
    }
?>