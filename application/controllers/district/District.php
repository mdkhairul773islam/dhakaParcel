<?php class District extends Admin_controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $where = [];
        if(!empty($_POST['id'])){
            $where['id'] = $_POST['id'];
        }

        if($_POST && !empty($_POST['name'])){
            save('districts', $_POST);
            set_msg('success', 'Successfully Saved');
            redirect("district/District?system_id=NzI=", "refresh");
        }

        $this->data['districts'] = readTable('districts', $where, ['orderBy'=>['name', 'ASC']]);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/district/index', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function edit($id) {
        
        $this->data['edit'] = readTable('districts', ['id'=>$id])[0];

        if($_POST){
            update('districts', $_POST, ['id'=>$id]);
            set_msg('success', 'Successfully Updated');
            redirect("district/District?system_id=NzI=", "refresh");
        }


        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/district/index', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }


    public function delete($id){
        remove('districts', ['id'=>$id]);
        set_msg('success', 'Successfully Deleted');
        redirect("district/District?system_id=NzI=", "refresh");
    }
}
