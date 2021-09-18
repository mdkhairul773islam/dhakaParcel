<?php class Upazila extends Admin_controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $where = [];
        if(!empty($_POST['id'])){
            $where['upazillas.id'] = $_POST['id'];
        }

        if($_POST && !empty($_POST['name'])){
            save('upazillas', $_POST);
            set_msg('success', 'Successfully Saved');
            redirect("upazila/Upazila?system_id=NzM=", "refresh");
        }

        $this->data['upazillas'] = get_join('upazillas', 'districts', 'upazillas.district_id=districts.id', $where, 'upazillas.*, districts.name as district_name, districts.id as district_id', null, 'upazillas.name', 'ASC');


        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/upazila/index', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function edit($id)
    {
        $this->data['edit'] = get_join('upazillas', 'districts', 'upazillas.district_id=districts.id', ['upazillas.id'=>$id], 'upazillas.*, districts.name as district_name, districts.id as district_id', null, 'upazillas.name', 'ASC')[0];

        if($_POST){
            update('upazillas', $_POST, ['id'=>$id]);
            set_msg('success', 'Successfully Updated');
            redirect("upazila/Upazila?system_id=NzM=", "refresh");
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/upazila/index', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }


    public function delete($id){
        remove('upazillas', ['id'=>$id]);
        set_msg('success', 'Successfully Deleted');
        redirect("upazila/Upazila?system_id=NzM=", "refresh");
    }
}
