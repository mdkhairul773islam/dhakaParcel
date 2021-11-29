<?php class Weight_package extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->data['weightPackage'] = get_result('weight_package', ['trash'=>0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/weight_package/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function add(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            if(!empty($_POST['save'])){

                unset($_POST['save']);
                $data = $_POST;
                $exist_data = get_row('weight_package', ['name'=>trim($_POST['name']), 'trash'=>0], 'id');
                
                // I have submitted the information of which agent will be under this record.  
                if(empty($exist_data->id)){
                    
                    $lastId = save_data('weight_package', $data, [], true);
                    
                    if ($lastId) {
                        $wpId = 'wp-'.$lastId;
                        save_data('weight_package', ['wp_id'=>$wpId], ['id'=>$lastId]);
                        
                        set_msg('success', 'Weight Package Successfully Created!');
                        redirect('/application_setting/weight_package?system_id=OThfMTg0', 'refresh');
                    } else {
                        set_msg('warning', 'Weight Package Not Created !');
                        redirect_back();
                    }
                }else{
                    set_msg('warning', 'This weight package already exists!');
                    redirect_back();  
                }
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/weight_package/add', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function show(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/weight_package/show', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function edit($id){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';


            if(!empty($_POST['update'])){

                unset($_POST['update']);
                $data = $_POST;
                
                // I have submitted the information of which agent will be under this record.  
                if (save_data('weight_package', $data, ['id'=>$id])) {
                       
                    set_msg('success', 'Weight Package Successfully Update!');
                    redirect('/application_setting/weight_package/edit/'.$id.'?system_id=OThfMTg0', 'refresh');
                } else {
                    set_msg('warning', 'Weight Package Not Created!');
                    redirect_back();
                }

            }

            $this->data['weight_package'] = get_row('weight_package', ['id'=>$id]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/application_setting/weight_package/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        public function delete($id){

            if (save_data('weight_package', ['trash'=>1], ['id'=>$id])) {
                
                set_msg('success', 'Weight Package Successfully Deleted !');
                redirect('/application_setting/weight_package?system_id=OThfMTg0', 'refresh');
            } else {
                set_msg('warning', 'warning', 'Weight Package Not Deleted !');
                redirect('/application_setting/weight_package?system_id=OThfMTg0', 'refresh');
            }
        }
    }
?>