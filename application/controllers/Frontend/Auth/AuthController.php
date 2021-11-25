<?php class AuthController extends UserController {

    function __construct() {
        parent::__construct();

        if($this->User_m->isLogin() && uri_string()!='logout'){

            set_msg('success', 'You are successful log in!');
            redirect('user-panel/profile', 'refresh');
        }
        // $this->load->model("User_m");
    }

    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function login() {
        $this->data['title'] = 'Login';

        if($_POST){
            if($this->User_m->validation()){
                redirect('verification', 'refresh');                
            }
            else {
                $this->session->set_flashdata('err', 1);
                redirect('login?user='.$_POST['mobile'], 'refresh'); 
            }
        }

        return view('frontend.auth.login');
    }

    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function logout() {
        $this->data['title'] = 'Login';
        
        $this->User_m->logout();
        redirect_back();
    }

    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function forgot() {
        $this->data['title'] = 'Forgot';

        return view('frontend.auth.forgot');
    }
    
    /*
     * *************************
     *  Below Code Load The
     *  Home Page First
     *  @param NULL
     * *********************
    */
    public function registration() {
        $this->data['title'] = 'Registration';

        if($_POST){

            $subscriberId = 'KG-'.rand(100000, 999999);
            while(check_exists('subscribers', ['subscriber_id' => $subscriberId])){
                $subscriberId = 'KG-'.rand(100000, 999999);
            }

            $data = $_POST;

            $data['subscriber_id'] = $subscriberId;
            $data['username'] = $_POST['mobile'];
            $data['password'] = hash('md5', $_POST['password'].config_item('encryption_key'));
            $data['orginal_password'] = $_POST['password'];
            unset($data['confirm_password']);
            if($_POST['password']==$_POST['confirm_password']){
                save('subscribers', $data);
                set_msg('success', 'Registration is successfull');
                redirect('login', 'refresh');
            }else{
                set_msg('warning', 'The password and confirm password fields do not match.'); 
            }
            
        }
        return view('frontend.auth.registration');
    }



    /*
     * *************************
     *  Code Verification
     * *********************
    */
    public function code_verification(){
        if(isset($_SESSION['_token'])){
            $where  = json_decode(base64_decode($_SESSION['_token']), true);
            $this->data['mobile'] = $where['username'];
            if(isset($_POST['code']) && $this->User_m->login(array_merge(['verify_code'=>$_POST['code']], $where))) 
            {
                update('subscribers', ['is_use'=>1], $where);
                redirect('user-panel/dashboard', 'refresh');
            }
            else if(isset($_POST['code'])) {
                $this->session->set_flashdata('err', 1);
            }
        }
        else{
            $this->session->set_flashdata('err', 1);
            redirect('login', 'refresh'); 
        }
        return view('frontend.auth.code_verification');
    }

    /*
     * ****************************
     *  Resend verification code
     * **************************
    */
    public function resend_verification_code(){
        if(isset($_SESSION['_token']))
        {
            $where       = json_decode(base64_decode($_SESSION['_token']), true);
            $subscribers = readTable('subscribers', $where);
            $mobile      = $where['username'];

            if($subscribers && $subscribers[0]->is_use==0){
                $code = $subscribers[0]->verify_code;
            }
            else{
                $code = rand(1111, 9999);
                update('subscribers', ['verify_code'=>$code, 'is_use'=>0], $where);
            }

            $text = "Your Verification Code Is {$code}";
            send_sms($mobile, $text);
            redirect('verification', 'refresh');
        }
    }

    /*
     * *********************
     *  Forgot Password
     * *******************
    */
    public function forgot_password()
    {

        if($_POST && isset($_POST['mobile']) && isset($_POST['code']) && isset($_POST['password']))
        {
            $subscriber = readTable('subscribers', ['mobile'=>$_POST['mobile'], 'verify_code'=>$_POST['code']]);
            if($subscriber){
                update('subscribers', ['is_use'=>1, 'password'=> $this->hash($_POST['password'])], ['id'=>$subscriber[0]->id]);
                echo 1;
                die;
            }
            else {echo 0;}
        }

        else if($_POST && isset($_POST['mobile']) && isset($_POST['code']))
        {
            $subscriber = readTable('subscribers', ['mobile'=>$_POST['mobile'], 'verify_code'=>$_POST['code']]);
            if($subscriber){
                echo 1;
                die;
            }else {echo 0;}
        }
        else if($_POST && isset($_POST['mobile'])){
            $subscriber = readTable('subscribers', ['mobile'=>$_POST['mobile']]);
            if($subscriber)
            {
                if($subscriber[0]->is_use==0){
                    $code = $subscriber[0]->verify_code;
                }
                else{ $code = rand(1111, 9999); }

                $text = "Your Verification Code Is {$code}";
                send_sms($_POST['mobile'], $text);
                update('subscribers', ['verify_code'=>$code, 'is_use'=>0], ['id'=>$subscriber[0]->id]);
                echo 1;
            }
            else { echo 0; }
            die;
        }
        return view('frontend.auth.forgot_password');
    }
    
    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }


}
