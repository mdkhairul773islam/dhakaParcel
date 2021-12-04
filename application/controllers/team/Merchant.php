<?php class Merchant extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['merchantList'] = get_join('merchant', 'users', 'merchant.users_id=users.id', ['merchant.trash'=>0, 'merchant.status'=>'active', 'users.trash'=>0, 'users.status'=>'active'], ['merchant.*', 'users.image', 'users.name', 'users.email']);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/merchant/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';


            $this->data['districtList'] = get_result('districts', ['trash'=>0, 'status'=>'active'], ['name', 'id'], '', 'name', 'ASC');
            $this->data['branchList']   = get_result('branch', ['trash'=>0, 'status'=> 'active'], ['name', 'code'], '', 'name', 'ASC');
            
            if(!empty($_POST['save'])){
                unset($_POST['save']);
                
                $merchant_data = $_POST;

                unset($merchant_data['name']);
                unset($merchant_data['address']);
                unset($merchant_data['mobile']);
                unset($merchant_data['facebook']);
                unset($merchant_data['website']);
                unset($merchant_data['email']);
                unset($merchant_data['username']);
                unset($merchant_data['password']);
                unset($merchant_data['image']);

                $user_data = [
                   'opening'        => date('Y-m-d'),
                   'name'           => $_POST['name'],
                   'username'       => $_POST['username'],
                   'email'          => $_POST['email'],
                   'address'        => $_POST['address'],
                   'branch'         => $_POST['branch'],
                   'mobile'         => $_POST['mobile'],
                   'facecbook'      => $_POST['facebook'],
                   'website'        => $_POST['website'],
                   'privilege'      => 'merchant',
                ];

                if(!empty($_POST['password'])){
                    $user_data['password'] = $this->hash($_POST['password']);
                }
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    $user_data['image']          = uploadToWebp($_FILES['image'], 'public/upload/merchant/', 'user'.time(), 270, null, 80);
                }

                if(isset($_FILES['nid_card']['name']) && $_FILES['nid_card']['name']!=''){
                    $merchant_data['nid_card']      = uploadToWebp($_FILES['nid_card'], 'public/upload/merchant/', 'nid'.time(), 270, null, 80);
                }

                if(isset($_FILES['trade_license']['name']) && $_FILES['trade_license']['name']!=''){
                    $merchant_data['trade_license']      = uploadToWebp($_FILES['trade_license'], 'public/upload/merchant/', 'trade'.time(), 270, null, 80);
                }

                if(isset($_FILES['tin_certificate']['name']) && $_FILES['tin_certificate']['name']!=''){
                    $merchant_data['tin_certificate']      = uploadToWebp($_FILES['tin_certificate'], 'public/upload/merchant/', 'tin'.time(), 270, null, 80);
                }

                if(!empty($user_data)){
                    
                    if ($lastId =  save_data('users', $user_data, [], true)) {
                        $merchant_data['users_id']      = $lastId;
                        $merchant_data['merchant_code'] = 'M-'.$lastId;

                        save_data('merchant', $merchant_data);
                        
                        set_msg('success', 'Merchant Successfully Create!');

                        redirect('/team/merchant?system_id=OTdfMTgx?system_id=OTdfMTgw', 'refresh');
                    } else {
                        set_msg('warning', 'Merchant Not Update!');
                        redirect_back();
                    }
                }

            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/merchant/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function show($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['merchant'] = get_row_join('merchant', 'users', 'merchant.users_id=users.id', ['merchant.users_id'=>$id, 'merchant.trash'=>0, 'merchant.status'=>'active', 'users.trash'=>0, 'users.status'=>'active'], ['merchant.*', 'users.image', 'users.name', 'users.email', 'users.address', 'users.mobile', 'users.username', 'users.facecbook', 'users.website']);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/merchant/show', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['districtList'] = get_result('districts', ['trash'=>0, 'status'=>'active'], ['name', 'id'], '', 'name', 'ASC');
            $this->data['branchList']   = get_result('branch', ['trash'=>0, 'status'=> 'active'], ['name', 'code'], '', 'name', 'ASC');


            if(!empty($_POST['update'])){
                unset($_POST['update']);
                
                $merchant_data = $_POST;

                unset($merchant_data['name']);
                unset($merchant_data['address']);
                unset($merchant_data['mobile']);
                unset($merchant_data['facebook']);
                unset($merchant_data['website']);
                unset($merchant_data['email']);
                unset($merchant_data['username']);
                unset($merchant_data['password']);
                unset($merchant_data['image']);

                $user_data = [
                   'name'           => $_POST['name'],
                   'username'       => $_POST['username'],
                   'email'          => $_POST['email'],
                   'address'        => $_POST['address'],
                   'branch'         => $_POST['branch'],
                   'mobile'         => $_POST['mobile'],
                   'facecbook'      => $_POST['facebook'],
                   'website'        => $_POST['website'],
                   'privilege'      => 'merchant',
                ];

                if(!empty($_POST['password'])){
                    $user_data['password'] = $this->hash($_POST['password']);
                }
                
                if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
                    $user_data['image']          = uploadToWebp($_FILES['image'], 'public/upload/merchant/', 'user'.time(), 270, null, 80);
                }

                if(isset($_FILES['nid_card']['name']) && $_FILES['nid_card']['name']!=''){
                    $merchant_data['nid_card']      = uploadToWebp($_FILES['nid_card'], 'public/upload/merchant/', 'nid'.time(), 270, null, 80);
                }

                if(isset($_FILES['trade_license']['name']) && $_FILES['trade_license']['name']!=''){
                    $merchant_data['trade_license']      = uploadToWebp($_FILES['trade_license'], 'public/upload/merchant/', 'trade'.time(), 270, null, 80);
                }

                if(isset($_FILES['tin_certificate']['name']) && $_FILES['tin_certificate']['name']!=''){
                    $merchant_data['tin_certificate']      = uploadToWebp($_FILES['tin_certificate'], 'public/upload/merchant/', 'tin'.time(), 270, null, 80);
                }

                if(!empty($user_data)){
                    
                    if (save_data('users', $user_data, ['id'=>$id])) {
                        save_data('merchant', $merchant_data, ['users_id'=>$id]);
                        set_msg('success', 'Merchant Successfully Update!');

                        redirect('/team/merchant/edit/'.$id.'?system_id=OTdfMTgx?system_id=OTdfMTgw', 'refresh');
                    } else {
                        set_msg('warning', 'Merchant Not Update!');
                        redirect_back();
                    }
                }

            }


            $this->data['merchant'] = get_row_join('merchant', 'users', 'merchant.users_id=users.id', ['merchant.users_id'=>$id, 'merchant.trash'=>0, 'merchant.status'=>'active', 'users.trash'=>0, 'users.status'=>'active'], ['merchant.*', 'users.image', 'users.name', 'users.email', 'users.address', 'users.mobile', 'users.username', 'users.facecbook', 'users.website']);
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/team/merchant/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('merchant', ['trash'=>1], ['users_id'=>$id])) {

                save_data('users', ['trash'=>1], ['id'=>$id]);
                set_msg('success', 'success', 'Merchant Successfully Deleted!');
                redirect('/team/merchant?system_id=OTdfMTgx', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Branch Not Deleted!');
                redirect('/team/merchant?system_id=OTdfMTgx', 'refresh');
            }
        }

        public function hash($string) {
            return hash('md5', $string . config_item('encryption_key'));
        }
    }
?>