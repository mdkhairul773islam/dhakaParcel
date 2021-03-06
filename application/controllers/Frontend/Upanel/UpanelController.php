<?php class UpanelController extends UserController {

    function __construct() {
        parent::__construct();
    }

    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function index() {
        $this->data['title'] = "Dashboard";
        $this->data['aside'] = "dashboard";

        // Subscriber Id
        $subscriber_id              = $this->session->subscriber_id;
        $this->data['user_info']    = get_row('subscribers', ['id'=> $subscriber_id]);
        
        $this->data['booking_info'] = count(get_result('booking', ['user_id'=> $subscriber_id, 'trash'=>0]));
        $this->data['booking_delivered'] = count(get_result('booking', ['user_id'=> $subscriber_id, 'booking_status'=>'delivered', 'trash'=>0]));
        $this->data['booking_pending'] = count(get_result('booking', ['user_id'=> $subscriber_id, 'booking_status'=>'pending', 'trash'=>0]));
        $this->data['booking_processing'] = count(get_result('booking', ['user_id'=> $subscriber_id, 'booking_status'=>'processing', 'trash'=>0]));
        

        return view('frontend.pages.upanel.dashboard');
    }

    public function user_info_set(){
        // Subscriber Id
        $subscriber_id = $this->session->subscriber_id;
        $user_info    = get_row('subscribers', ['id'=> $subscriber_id]);
        $data = $this->input->post();

        $data['profile_verification'] = 'processing';
        save_data('subscribers', $data, ['id'=>$subscriber_id]);

        set_msg('success', 'Product Successfully Saved');
        redirect('user-panel/dashboard', 'refresh');
    }

    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function profile() {
        $this->data['title'] = "Profile";
        $this->data['aside'] = "profile";

        // Subscriber Id
        $subscriber_id = $this->session->subscriber_id;

        if($_POST){

            $get_password = get_name('subscribers', 'password', ['id'=> $subscriber_id]);
            if(isset($_POST['change_password'])){

                if($_POST['password']==$get_password){
                    
                    if($_POST['new_password']==$_POST['confirm_password'] && !empty($_POST['new_password'])  && !empty($_POST['confirm_password'])){
                       
                        unset($_POST['new_password']);
                        update('subscribers', ['password'=> $this->hash($_POST['confirm_password']), 'orginal_password'=> $_POST['confirm_password']], ['id'=>$subscriber_id]);

                        set_msg('success', 'Password Successfully Updated');
                        redirect_back();
                        
                    }else{
                        set_msg('warning', 'Password And confirm Password Dont Match!');
                        redirect_back();
                    }

                }else{
                    set_msg('warning', 'Old Password Dont Match!');
                    redirect_back();
                }
            }

            unset($_POST['password']);
            unset($_POST['new_password']);
            unset($_POST['confirm_password']);

            update('subscribers', $_POST, ['id'=>$subscriber_id]);
            set_msg('success', 'Profile Successfully Updated');
            redirect_back();
        }
        $this->data['user_data'] = get_row('subscribers', ['id'=> $subscriber_id]);
         
        return view('frontend.pages.upanel.profile');
    }

    public function user_image_set(){
        // Subscriber Id
        $subscriber_id = $this->session->subscriber_id;
        $user_info    = get_row('subscribers', ['id'=> $subscriber_id]);

        // Below code process the feature Images
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
            
            if($data['image']   = uploadToWebp($_FILES['file'], 'public/upload/user_photo/', time(), 270, null, 80)){
                (!empty($user_info->image) ? unlink($user_info->image) : '');
            }
        }
        save_data('subscribers', $data, ['id'=>$subscriber_id]);
        set_msg('success', 'Profile Successfully Updated');
    }

    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function settings() {
        $this->data['title'] = "Settings";
        $this->data['aside'] = "setting";

        return view('frontend.pages.upanel.settings');
    }

    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function booking() {
        $this->data['title'] = "Booking";
        $this->data['aside'] = "booking";

        $this->data['categoryList'] =get_result('categories', ['trash'=> 0]);
        $this->data['subCategoryList'] =get_result('subcategories', ['trash'=> 0]);

        $this->data['divisions'] = get_result('divisions');
        $this->data['districts'] = get_result('districts');
        $this->data['upazillas'] = get_result('upazilas');
        $this->data['agnet_set_upazila'] = get_result('user_zones', '', '', 'zone', 'zone', 'ASC');

        $this->data['payment_methods'] = get_result('payment_method', [], 'method as name');
        
        $this->data['user_info'] = get_row('booking', ['user_id'=>$this->session->subscriber_id, 'trash'=>0], ['from_division', 'from_districts', 'from_upazila', 'from_address'], '', 'id', 'DESC');

        $booking_no = '';

        if(!empty($_POST)) {

            $data = $_POST;
            unset($data['agent_id']);

            $data['date'] = date('Y-m-d');
            $booking_no =  $data['booking_no'] = date('ymd') . rand(1000, 9999);
            $data['user_id'] = $this->session->subscriber_id;
            $data['user_name'] = $this->session->name;
            $data['service_charge'] = 120;

            $message = "Hi, Your Booking was successfully submitted.";

            $from_valid_mobile =  $this->validate_mobile($_POST['from_mobile']);
            $to_valid_mobile =  $this->validate_mobile($_POST['to_mobile']);

            if(!empty($_POST['from_mobile'])){
                if($from_valid_mobile) {
                    send_sms($_POST['from_mobile'], $message);
                    set_msg('success', 'success', 'Your Booking was successfully submitted !');
                }
            }else{
                set_msg('success', 'success', 'Sms Not Sent!');
            }

            if(!empty($_POST['to_mobile'])){
                if($to_valid_mobile) {
                    send_sms($_POST['to_mobile'], $message);
                    set_msg('success', 'success', 'Your Booking was successfully submitted !');
                }
            }else{
                set_msg('success', 'success', 'Sms Not Sent!');
            }

            if (save_data('booking', $data)) {
                // I have submitted the information of which agent will be under this record. 
               
                if(!empty($_POST['agent_id'])){

                    foreach($_POST['agent_id'] as $key => $agent){
                        $agentData = [
                            'agent_id'          => $agent,
                            'date'              =>date('Y-m-d'),
                            'booking_no'        => $booking_no,
                            'booking_user_id'   => $this->session->subscriber_id
                        ];
                        save_data('booking_agent_records',$agentData);
                    }
                }
                set_msg('success', 'success', 'Booking Successfully Created !');
                redirect_back();
            } else {
                set_msg('warning', 'warning', 'Booking Not Created !');
                redirect_back();
            }
        }

        return view('frontend.pages.upanel.booking');
    }
    
    //get all payment method infromation
    public function payment_method_info_get(){
        
        $data = [];
        if(!empty($_POST['method'])){
            
            $where = ['method' => $_POST['method']];
            $data = get_result('payment_method', $where);
        }
        echo  json_encode($data);
    }


    public function get_agent_zone_wise(){
        
        $data = [];
        if(!empty($_POST['zone'])){
            
            $where = ['zone' => $_POST['zone']];
            $data = get_result('user_zones', $where, ['user_id as agent_id']);
        }
        echo  json_encode($data);
    }
    
    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function booking_list() {
        $this->data['title'] = "Booking List";
        $this->data['aside'] = "booking_list";

        $this->data['bookingList'] = get_result('booking', ['user_id'=>$this->session->subscriber_id, 'trash'=>0]);

        return view('frontend.pages.upanel.booking_list');
    }

    public function serialNo(){


        $this->data['title'] = "Booking List";
        $this->data['aside'] = "booking_list";

        $serial_no = $this->input->get('serialNo');

        $this->data['booking_details'] = get_row('booking', ['booking_no'=>$serial_no, 'trash'=>0]);


        return view('frontend.pages.upanel.booking_voucher');
    }

    public function delete(){
        
        $this->data['title'] = "Booking List";
        $this->data['aside'] = "booking_list";

        $serial_no = $this->input->get('serialNo');

        if (save_data('booking', ['trash'=>1], ['booking_no'=>$serial_no])) {
            save_data('booking_agent_records', ['trash'=>1], ['booking_no'=>$serial_no]);
            
            set_msg('success', 'success', 'Booking Successfully Deleted !');
            redirect('user-panel/booking', 'refresh');
        } else {
            set_msg('warning', 'warning', 'Booking Not Deleted !');
            redirect('user-panel/booking', 'refresh');
        }
    }
    
    private function validate_mobile($mobile)
    {
        return preg_match('/^[0-9]{11}+$/', $mobile);
    }
    
    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }
}