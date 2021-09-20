<?php
class SmsControl extends Frontend_Controller {
    public function __construct(){
        parent::__construct(); 
        $this->load->model('action');
        //session_start();
        ob_start();
        
        if(isset($_SESSION['date_time']) && isset($_SESSION['login_status']) && isset($_SESSION['incryption']) && $_SESSION['login_status'] == 1){
            if($_SESSION['date_time'] > date("Y-m-d H:i:s")){
                $_SESSION['date_time'] = date("Y-m-d H:i:s",strtotime("+15 minutes"));
            }else{
                session_destroy();
            }
        }
    }
    
    public function logControl(){
        if(!isset($_SESSION['date_time']) && !isset($_SESSION['login_status']) && !isset($_SESSION['incryption'])){
            redirect("smsControl");
        }
    }
    
    public function index()
    {
        if(isset($_SESSION['date_time']) && isset($_SESSION['login_status']) && isset($_SESSION['incryption'])){
            redirect("smsControl/deshboard");
        }
        $this->load->view('sms/sms', $this->data);
    }
    
    public function login()
    {
        $username = "Mrskuet08@#";
        $password = "Mrskuet08@#";
        
        $form_username = $this->input->post('username');
        $form_password = $this->input->post('password');
        
        if($username == $form_username && $password == $form_password)
        {
            $_SESSION['date_time'] = date("Y-m-d H:i:s",strtotime("+15 minutes"));
            $_SESSION['incryption'] = crypt($form_username, 'Mrskuet08@#');
            $_SESSION['login_status'] = true;
            
            redirect("smsControl/deshboard");
            
        }else{
            $messArr = array(
                "title" => "login warning",
                "icon" => "home",
                "emit" => "Wrong Username or Password!",
                "btn" => false
            );
            $this->session->set_flashdata('error', message('warning-login', $messArr));
            redirect($_SERVER['HTTP_REFERER']); 
        }
        
    }
    
    public function deshboard(){
        $this->logControl();
        $sms = read('recharge_sms');
        $tatal = 0;
        if($sms)
        foreach($sms as $key=>$value){
            $tatal += $value->sms;
        };
        
        $this->data['sms'] = $sms;
        
        $this->data['total_sms'] = $tatal;
        $this->load->view('sms/deshboard', $this->data);
    }
    
    public function SmsUpdate(){
        $this->logControl();
        save('recharge_sms', $_POST);
        redirect('smsControl/deshboard');
    }
    
    public function logout(){
        session_destroy();
        redirect('smsControl');
    }
    
    public function others()
    {
        $this->logControl();
        
        if($_POST) {
            $smr = read('smr');
            if($smr){
                update('smr', $this->input->post(), ['id'=>$smr[0]->id]);
            }else{
                save('smr', $this->input->post());
            }
        }
        
        $smr = read('smr');
        
        if($smr){ $smr = $smr[0]; }else{$smr=false;}
        
        $this->data['smr'] = $smr;
        
        $this->load->view('sms/others', $this->data);
    }
    
    public function advance()
    {
        $smr = read('smr');
        if($smr){ $smr = $smr[0]; }else{$smr=false;}
        $this->data['smr'] = $smr;
        
        $this->load->view('sms/advance', $this->data);
    }
    
    public function fetch(){
        if($_POST){
           if($_POST) {
            $smr = read('smr');
            if($smr){
                update('smr', $this->input->post(), ['id'=>$smr[0]->id]);
            }else{
                save('smr', $this->input->post());
            }
        }
        }
    }
    
}