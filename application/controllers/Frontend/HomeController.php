<?php 

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed


class HomeController extends Frontend_Controller {

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
        $this->data['title']       = "Home";
        $this->data['slider']      = readTable("sliders", ['status'=>1, 'is_offer'=>0]);
        $this->data['about']       = read('about');
        $this->data['services']    = read('services', [], [], 6);
        $this->data['testimonial'] = read('testimonial', [], [], 6);
        $this->data['sister']      = readTable('sister_concern', [], ['limit'=>4, 'orderBy'=> ['id', 'DESC']]);
        $this->data['blogs']       = readTable('blog', [], ['limit'=>18, 'orderBy'=>['id', 'DESC']]);

        return view('frontend.pages.index');
    }

     /*
     * *****************************
     *  Show The About Page
     *  @param NULL
     * *************************
    */

    public function about_us() {
        $this->data['title']        = "About";

    	$this->data['about']        = get_result('about');
        return view('frontend.pages.about_us');
    }

    public function sister_concern() {
        $this->data['title']  = "Sister Concern";
        $this->data['sister'] = readTable('sister_concern', [], ['limit'=>4, 'orderBy'=> ['id', 'DESC']]);

        return view('frontend.pages.sister_concern');
    }
    
    public function services() {
        $this->data['title']        = "Services";
    	$this->data['services']     = read('services');

        return view('frontend.pages.services');
    }

    public function service_details($id) {
        $this->data['title']        = "Service Details";
    	$this->data['service']      = read('services', ['id'=>$id])[0];

        return view('frontend.pages.service_details');
    }

    public function testimonial() {
        $this->data['title']        = 'Testimonial';
        $this->data['testimonial']  = read('testimonial');

        return view('frontend.pages.testimonial');
    }

    public function news() {
        $this->data['title'] = 'News';
        $this->data['blogs'] = read('blog');

        return view('frontend.pages.news');
    }

    public function news_detail($id=null) {
        $this->data['title'] = 'News Detail';
        $this->data['blog'] = read('blog',['id'=>$id]);

        return view('frontend.pages.news_details');
    }

    /*
     * *************************
     *  Below Code Process
     *  Contact Page
     *  @param NULL
     * *********************
    */
    public function contact() {
        $this->data['title'] = "Contact";

        return view('frontend.pages.contact');
    }

    public function add_message(){
        $data = [
            'name'          => str_secure($this->input->post('name')),
            'email'         => str_secure($this->input->post('email')),
            'last_name'     => str_secure($this->input->post('last_name')),
            'mobile'        => str_secure($this->input->post('phone')),
            // 'subject' => str_secure($this->input->post('subject')),
            'message'       => str_secure($this->input->post('message'))
        ];

        // check existance
        if(exist('message', str_secure(['name'=>$this->input->post('name')]))==false){
            if(save('message', $data)){
                set_msg('success', 'success', 'Message Successfully Send !');
            }else{
                set_msg('warning', 'warning', 'Message Not Send !');
            }
        }else{
            set_msg('warning', 'warning', 'Message Already Exists !');
        }
        redirect_back('#message');
    }
    
    // Subscriber For Updates
    public function subscriber() {
        if(isset($_POST['email']) && $_POST['email']!=''){
            if(empty(readTable('subscriber', ['email'=>$_POST['email']]))){
                save('subscriber', [
                    'email' => $_POST['email'],
                    'date'  => date('Y-m-d')
                ]);
            }
        }
        set_msg('success', 'Successfully Subscribed');
        redirect_back();
    }

    //
    public function pages($title) {
        $this->data['title'] = filter($title);
        $page = get_result('pages', ['title'=>$title]);
        $this->data['page_content'] = ($page ? $page[0] : null);

        return view('frontend.pages.pages');
    }
    
    
    
    // Subscriber password get and send 
    
    public function get_password() {
        
           if(!empty($_POST['mobile_no'])){
               
               $get_password = get_row('subscribers', ['mobile'=>$this->input->post('mobile_no'), 'status'=> 'active'], ['name', 'orginal_password as password', 'username', 'mobile'], '', 'id', 'DESC');
           
                if(!empty($get_password)){
                    $message = "Dear, ". $get_password->name." Thank You For Requesting. Your username is: ".$get_password->username." and Password: ".$get_password->password." Regards: Dhaka Parcel & Courier Ltd.";
                    send_sms($get_password->mobile, $message);
                    
                    redirect('/Frontend/HomeController/password_message/'.base64_encode($get_password->mobile));
                }else{
                   redirect('/Frontend/HomeController/password_message/'.base64_encode($this->input->post('mobile_no')));
               }
           }
           
        
    }
    
    public function password_message($mobile) {
        
        $this->data['get_password'] = get_row('subscribers', ['mobile'=>base64_decode($mobile), 'status'=> 'active'], ['name', 'orginal_password as password', 'username', 'mobile'], '', 'id', 'DESC');
        
        return view('frontend.auth.password_request');
    }
    
    public function rider_or_agent_registration(){
        
        if(!empty($_POST)){
            $data = $_POST;
            $data['date'] = date('Y-m-d');
            
            save('rider_or_agent_registration', $data);
            
            set_msg('success', 'Successfully Subscribed');
            redirect('/', 'refresh');
        }
        
    }
    
}
