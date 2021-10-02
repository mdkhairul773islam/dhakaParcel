<?php class Booking extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['meta_keyword'] = 'Booking List';
        $this->data['meta_title'] = 'Dhaka courier ltd';
        $this->data['meta_description'] = 'dhakacourierltd';
        $this->data['zone_list'] = NULL;
        
        $this->data['zone_list'] = get_result('user_zones', '', '', 'zone', 'zone', 'ASC');
        $this->data['agent_list'] = get_result('users', '', '', 'name', 'name', 'ASC');
        
        $where = [];
        
        if (!empty($_POST['booking_no'])) {
            $where['booking.booking_no'] = $_POST['booking_no'];
        }
        if (!empty($_POST['from_name'])) {
            $where['booking.from_name'] = $_POST['from_name'];
        }
        if (!empty($_POST['from_mobile'])) {
            $where['booking.from_mobile'] = $_POST['from_mobile'];
        }
        if (!empty($_POST['booking_status'])) {
            $where['booking.booking_status'] = $_POST['booking_status'];
        }
        if (!empty($_POST['zone'])) {
            $where['booking.to_upazila'] = $_POST['zone'];
        }
        if (!empty($_POST['agent_name'])) {
            $where['users.name'] = $_POST['agent_name'];
        }
        
        if(!empty($_POST['date'])){
            
            foreach($_POST['date'] as $key => $val) {
                
                if($val != null && $key == 'from') {
                    $where['booking.date >='] = $val;
                }
    
                if($val != null && $key == 'to') {
                    $where['booking.date <='] = $val;
                }
            }
        }
        

        
        if($this->session->userdata['privilege']=='super' || $this->session->userdata['privilege']=='president'){
            
            $tableFrom="booking";
            $tableTo=["user_zones", "users"];
            $joinCond=["booking.to_upazila=user_zones.zone", "user_zones.user_id=users.id", "booking.to_upazila=user_zones.zone"];
            
            $this->data['bookingList'] = get_join($tableFrom,$tableTo, $joinCond, $where,['booking.*', 'user_zones.zone as agent_zone_name', 'users.name as agent_name', 'users.username as agent_username'],'booking.booking_no');
        }
        
        if($this->session->userdata['privilege']=='admin'){
            
            $user_id = $this->session->userdata('user_id');
            
            $tableFrom="booking";
            $tableTo=["user_zones", "users"];
            $joinCond=["booking.to_upazila=user_zones.zone", "user_zones.user_id=users.id", "booking.to_upazila=user_zones.zone"];
            
            $where['users.id'] = $user_id;
            
            $this->data['bookingList'] = get_join($tableFrom,$tableTo, $joinCond, $where,['booking.*', 'user_zones.zone as agent_zone_name', 'users.name as agent_name', 'users.username as agent_username']);
        }
        //dd($this->data['bookingList']);
        

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/booking/booking', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function status_update()
    {
        if (!empty($_POST['id']) && !empty($_POST['status'])) {

            $where = ['id' => $_POST['id']];
            save_data('booking', ['booking_status' => $_POST['status']], $where);

            $status = 'success';
        } else {
            $status = 'error';
        }
        echo $status;
    }

    public function view($booking_no)
    {
        $this->data['meta_keyword'] = 'Booking View';
        $this->data['meta_title'] = 'Dhaka courier ltd';
        $this->data['meta_description'] = 'dhakacourierltd';

        $where['booking_no'] = $booking_no;
        $where['trash'] = 0;
        $this->data['booking_details'] = get_row('booking', $where);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('components/booking/view', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function delete($booking_no = null)
    {

        if (delete('booking', ['booking_no' => $booking_no])) {
            set_msg('success', 'success', 'Booking Permanently Deleted !');
        } else {
            set_msg('warning', 'warning', 'Booking Not Deleted !');
        }
        redirect_back();
    }
}