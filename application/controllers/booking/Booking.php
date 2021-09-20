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

        $where = [];
        if (!empty($_POST['booking_no'])) {
            $where['booking_no'] = $_POST['booking_no'];
        }
        if (!empty($_POST['from_name'])) {
            $where['from_name'] = $_POST['from_name'];
        }
        if (!empty($_POST['from_mobile'])) {
            $where['from_mobile'] = $_POST['from_mobile'];
        }
        if (!empty($_POST['booking_status'])) {
            $where['booking_status'] = $_POST['booking_status'];
        }

        $this->data['bookingList'] = get_result('booking', $where);

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