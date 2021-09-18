<?php class User extends Admin_controller{
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';
        $where = [];

        if($_POST && is_array($_POST['search'])){
            foreach ($_POST['search'] as $key => $value) {
                if($value!=''){
                    $where[$key] = $value;
                }
            }
        }

        $this->data['subscribers'] = readTable('subscribers', $where);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/subscriber/user', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    // Subscriber Deactive
    public function deactive($id) {
        $subscriber = readTable('subscribers', ['id'=>$id])[0];
        $status = ($subscriber->status=='active'?'deactive':'active');
        set_msg('success', 'Subscriber Successfully '.ucfirst($status));
        update('subscribers', ['status'=>$status], ['id'=>$id]);
        redirect_back();
    }
}
