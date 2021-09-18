<?php class Sms extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->data['total_sms'] = config_item('total_sms');
        $sent_sms_data = read("sms_record", array("delivery_report" => "1"));
        $total_sent_sms = 0;

        if($sent_sms_data)
        foreach($sent_sms_data as $total_sent_sms_data){
            $total_sent_sms = $total_sent_sms +$total_sent_sms_data->total_messages;
        };
        $this->data['sent_sms'] = $total_sent_sms;

        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = 'SMS';
        $this->data['meta_description'] = '';

    }

    public function custom_sms() {
        $this->data['meta_title'] = 'Custom SMS';

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

            redirect("sms/sendSms/send_custom_sms?system_id=NTZfMTA5", "refresh");
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/sms/custom_sms', $this->data);
        $this->load->view('admin/includes/footer');
    }

    public function sms_report() {
        $this->data['meta_title'] = 'SMS Report';

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
        $this->load->view('components/sms/sms_report', $this->data);
        $this->load->view('admin/includes/footer');
    }

    public function send_sms() {
        $this->data['meta_title'] = 'Send SMS';

        $this->data['members'] = [];
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

            redirect("sms/sendSms/send_sms?system_id=NTZfMTAy", "refresh");
        }
        else if(isset($_POST['show'])){
            unset($_POST['show']);
            $this->data['members'] = read('members', $_POST);
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/sms/send_sms', $this->data);
        $this->load->view('admin/includes/footer');
    }
}
