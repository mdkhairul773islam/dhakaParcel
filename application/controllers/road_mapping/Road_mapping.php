<?php class Road_mapping extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['rods'] = get_result('roads', ['trash'=> 0], 'id, road_name', '', 'road_name', 'ASC');

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/road_mapping/index', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function add_process(){
            
            
             $data = $_POST;

            // check existance
            if(exist('roads', (['road_name'=>$this->input->post('road_name')]))==false){
                if(save('roads', $data)){
                    set_msg('success', 'success', 'Road Mapping Successfully Created !');
                }else{
                    set_msg('warning', 'warning', 'Road Mapping Not Created !');
                }
            }else{
                set_msg('warning', 'warning', 'Road Mapping Already Exists !');
            }
            redirect_back();
        }


        public function edit($id=null){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            $this->data['rods'] = get_row('roads', ['id'=>$id, 'trash'=> 0]);

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/road_mapping/edit', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }


        public function edit_process($id=null){
            
            $data = $_POST;
            if(update('roads', $data, ['id'=>$id])){
                set_msg('success', 'success', 'Transport Successfully Update !');
            }else{
                set_msg('warning', 'warning', 'Transport Not Update !');
            }
            redirect_back();
        }


        public function delete($id=null){
            if(update('roads', ['trash'=>1], ['id'=>$id])){
                set_msg('success', 'success', 'Transport Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'Transport Not Deleted !');
            }
            redirect_back();
        }
        
        public function mapping(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            
            $this->data['roads'] = get_result('roads', ['trash'=> 0], 'id, road_name', '', 'road_name', 'ASC');
            
            if(!empty($_POST)){
                
                $invoice =  'rdmp-'.date('ymd') . rand(1000, 9999);

                // check existance
                if(exist('road_mapping', ['invoice'=>$invoice])==false){
                    $status = false;
                    foreach ($_POST['transport_code'] as $key => $value) {
                        $data = array(
                            'date'                  => $this->input->post('date'),
                            'invoice'               => $invoice,
                            'transport_code'        => $this->input->post('transport_code')[$key],
                            'road'                  => $this->input->post('road')[$key],
                            'trash'                 =>0
                        );
                        $status = save('road_mapping', $data);
                    }
                    
                    if($status){
                        set_msg('success', 'success', 'Road Mapping Successfully Created !');
                    }else{
                        set_msg('warning', 'warning', 'Road Mapping Not Created !');
                    }
                }else{
                    set_msg('warning', 'warning', 'Road Mapping Already Exists !');
                }
                redirect_back();
                
            }            

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/road_mapping/mapping', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        
        public function all_mapping(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
               
            $where=[
                'road_mapping.trash' => 0,   
                'transport.trash'=> 0,    
                'roads.trash'   => 0,
                'road_mapping.date' => date('Y-m-d')
            ];
            
            if(!empty($_POST)){
                
                unset($where['road_mapping.date']);

                foreach($_POST['date'] as $key => $val) {
                    if($val != null && $key == 'from') {
                        $where['road_mapping.date >='] = $val;
                    }

                    if($val != null && $key == 'to') {
                        $where['road_mapping.date <='] = $val;
                    }
                }
            }
            
            $join_cond = ['road_mapping.transport_code=transport.code', 'road_mapping.road=roads.id'];
            $select = ['road_mapping.id as mapping_id', 'road_mapping.date as road_mapping_date', 'road_mapping.invoice', 'transport.engine_no', 'transport.car_number', 'transport.chassis_no', 'transport.driver_name', 'transport.driver_mobile',  'roads.road_name'];
           
            $this->data['road_maping'] = get_join('road_mapping', ['transport', 'roads'], $join_cond, $where, $select, '', 'road_mapping.date', 'DESC');
            
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/road_mapping/all_mapping', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function edit_mapping($invoice){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';
            
            
            $this->data['roads'] = get_result('roads', ['trash'=> 0], 'id, road_name', '', 'road_name', 'ASC');
            
            $where=[
                'road_mapping.invoice' => $invoice,
                'road_mapping.trash' => 0,   
                'transport.trash'=> 0,    
                'roads.trash'   => 0 
            ];
            $join_cond = ['road_mapping.transport_code=transport.code', 'road_mapping.road=roads.id'];
            $select = ['road_mapping.date as road_mapping_date', 'road_mapping.id', 'road_mapping.invoice', 'transport.engine_no', 'transport.car_number', 'transport.chassis_no', 'transport.driver_name', 'transport.driver_mobile',  'roads.road_name', 'roads.id as roads_id'];
            $this->data['road_maping'] = get_join('road_mapping', ['transport', 'roads'], $join_cond, $where, $select, '', 'road_mapping.date', 'DESC');
            
            
            
            $this->data['roads'] = get_result('roads', ['trash'=> 0], 'id, road_name', '', 'road_name', 'ASC');
            
            if(!empty($_POST)){
                
                    $status = false;
                    foreach ($_POST['mapping_id'] as $key => $value) {
                        $data = array(
                            'road'                  => $this->input->post('road')[$key],
                        );

                        $status = update('road_mapping', $data, ['id'=>$this->input->post('mapping_id')[$key]]);
                    }
                    
                    if($status){
                        set_msg('success', 'success', 'Road Mapping Successfully Created !');
                    }else{
                        set_msg('warning', 'warning', 'Road Mapping Not Created !');
                    }
                
                    redirect('road_mapping/road_mapping/all_mapping/', 'refresh');
                
            }
            
              
            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/road_mapping/edit_mapping', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }
        
        public function deleteMapping($id=null){
            if(update('road_mapping', ['trash'=>1], ['id'=>$id])){
                set_msg('success', 'success', 'Road Maping Permanently Deleted !');
            }else{
                set_msg('warning', 'warning', 'Road Maping Not Deleted !');
            }
            redirect_back();
        }
    }
?>
