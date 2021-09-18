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
                        update('subscribers', ['password'=> $this->hash($_POST['confirm_password'])], ['id'=>$subscriber_id]);

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
        $this->data['upazillas'] = get_result('upazillas');

        $this->data['payment_methods'] = get_result('payment_method', [], 'method as name');

        if(!empty($_POST)) {

            $data = $_POST;

            $data['date'] = date('Y-m-d');
            $data['booking_no'] = date('ymd') . rand(1000, 9999);
            $data['user_id'] = $this->session->subscriber_id;
            $data['user_name'] = $this->session->name;


            if (save_data('booking', $data)) {
                set_msg('success', 'success', 'Booking Successfully Created !');
                redirect_back();
            } else {
                set_msg('warning', 'warning', 'Booking Not Created !');
                redirect_back();
            }
        }

        return view('frontend.pages.upanel.booking');
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
}