<?php

class SendSms extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('action');
        $this->data['total_sms'] = config_item('total_sms');
        $sent_sms_data = read("sms_record", array("delivery_report" => "1"));
        $total_sent_sms = 0;
        
        if($sent_sms_data)
        foreach($sent_sms_data as $total_sent_sms_data){
            $total_sent_sms = $total_sent_sms + (int)$total_sent_sms_data->total_messages; 
        };
        $this->data['sent_sms'] = $total_sent_sms;
        
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = 'sms';
        $this->data['meta_description'] = '';
    }

    public function index()
    {
        $this->data['meta_title'] = 'SMS';
        $this->data['menu_dropdown_selector'] = "sms";
        
        $this->data['confirmation'] = $this->data["receivers"] = null;
        $this->data['godown_code'] = $this->data["godown_code"] =null;

        if ($this->input->post("show")) {

            if($this->input->post("type") != 'supplier'){
                $where = array(
                    "godown_code" => $this->input->post("godown_code"),
                    "type" => 'client',
                    "customer_type" => $this->input->post('type'),
                    "status" => "active",
                    "trash" => 0
                );
            }else{
                $where = array(
                    "godown_code" => $this->input->post("godown_code"),
                    "type" => $this->input->post("type"),
                    "status" => "active",
                    "trash" => 0
                );
            }
            $this->data['godown_code'] = $this->input->post("godown_code");
            $this->data["receivers"] = get_result("parties", $where);
        }

        // send data
        if (isset($_POST['sendSms'])) {
            $content = $this->input->post('message');

            foreach ($_POST['mobile'] as $key => $num) {
                $message = send_sms($num, $content);
                $insert = array(
                    'delivery_date' => date('Y-m-d'),
                    'delivery_time' => date('H:i:s'),
                    'godown_code' => $this->input->post('godown_code'),
                    'mobile' => $num,
                    'message' => $this->input->post('message'),
                    'total_characters' => $this->input->post('total_characters'),
                    'total_messages' => $this->input->post('total_messages'),
                    'delivery_report' => $message
                );
                $this->action->add('sms_record', $insert);
            }

            if ($message) {
                $options = array(
                    "title" => "success",
                    "emit" => "Your Message has been Successfully Sent!",
                    "btn" => true
                );
                $this->data['confirmation'] = message('success', $options);
            } else {
                $options = array(
                    "title" => "warning",
                    "emit" => "Oops! Something went Wrong!Try again Please.",
                    "btn" => true
                );
                $this->data['confirmation'] = message('warning', $options);
            }
        }


        $this->data["receiversInfo"] = [];
        
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/sms/send-sms', $this->data);
        $this->load->view('admin/includes/footer');
    }


    public function send_custom_sms()
    {
        $this->data['meta_title'] = 'SMS';

        if (isset($_POST['sendSms'])) {
            $mobile_no  = explode(",", $this->input->post('mobiles'));
            $content    = $this->input->post('message');
            
            foreach ($mobile_no as $key => $num) 
            {
                $message = send_sms($num, $content);
                $insert  = array(
                    'delivery_date'     => date('Y-m-d'),
                    'delivery_time'     => date('H:i:s'),
                    'mobile'            => $num,
                    'message'           => $content,
                    'total_characters'  => strlen($content),
                    'total_messages'    => $this->input->post('total_messages'),
                    'delivery_report'   => $message
                );
                save('sms_record', $insert);
            }

            if ($message) {
                set_msg('success', 'SMS Sent Successfully');
            } else {
                set_msg('success', 'Could not send this SMS!');
            }

            redirect("sms/sendSms/send_custom_sms", "refresh");
        }

        
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/sms/send-custom-sms', $this->data);
        $this->load->view('admin/includes/footer');
    }

    public function sms_report()
    {
        $this->data['meta_title'] = 'SMS';

        $this->data['sms_record'] = [];
        if ($this->input->post('show_between')) {

            $where = array();
            foreach ($_POST['date'] as $key => $val) {
                if ($val != null && $key == 'from') {
                    $where['delivery_date >='] = $val;
                }

                if ($val != null && $key == 'to') {
                    $where['delivery_date <='] = $val;
                }
            }
            if(isset($_POST['status']) && $_POST['status'] != ''){
                $where['delivery_report'] = $_POST['status'];
            }
            $this->data['sms_record'] = read('sms_record', $where);
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/sms/sms-report', $this->data);
        $this->load->view('admin/includes/footer');
    }
    
    public function send_sms() {
        $this->data['meta_title'] = 'SMS';

        
        
        if ($_POST && isset($_POST['sendSms'])) {
            
            $mobile_no  = explode(",", $this->input->post('mobiles'));
            $content    = $this->input->post('message').config_item('regards');
            
            $mobile_no = ($mobile_no ? $this->input->post('mobile') : $mobile_no);
            
            foreach ($mobile_no as $key => $num) 
            {
                $message = send_sms($num, $content);
                $insert  = array(
                    'delivery_date'     => date('Y-m-d'),
                    'delivery_time'     => date('H:i:s'),
                    'mobile'            => $num,
                    'message'           => $content,
                    'total_characters'  => strlen($content),
                    'total_messages'    => $this->input->post('total_messages'),
                    'delivery_report'   => $message
                );
                save('sms_record', $insert);
            }

            if ($message) {
                set_msg('success', 'SMS Sent Successfully');
            } else {
                set_msg('success', 'Could not send this SMS!');
            }

            redirect("sms/sendSms/send_sms", "refresh");
        }
        
        $this->data['customers'] = read('booking');
        
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/sms/send-sms', $this->data);
        $this->load->view('admin/includes/footer');
    }


}