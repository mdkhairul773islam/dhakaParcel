<?php class TrxMethod extends Admin_controller{
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['meta_keyword']     = '';
        $this->data['meta_title']       = '';
        $this->data['meta_description'] = '';

        if($_POST){
            $data = $_POST;
            if($_FILES['img']){
                $data['img'] = uploadToWebp($_FILES['img'], 'public/images/logo/', "payment_method-".time(), 400, null, 80);
            }
            save('payment_method', $data);
            set_msg('success', 'Successfully Saved');
            redirect('trx_method/TrxMethod/all?system_id=NzFfMTMz', 'refresh');
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/payment_method/add', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }


    public function all(){
        $this->data['meta_keyword']     = '';
        $this->data['meta_title']       = '';
        $this->data['meta_description'] = '';

        $where = ['trash'=>0];
        if($_POST){
            foreach ($_POST['search'] as $key => $value) {
                if($value!=""){
                  $where[$key] = $value;  
                }
            }
        }

        $this->data['methods'] = readTable('payment_method', $where);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/payment_method/all', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }


    public function edit($id){
        $this->data['meta_keyword']     = '';
        $this->data['meta_title']       = '';
        $this->data['meta_description'] = '';

        $this->data['edit'] = $edit = readTable('payment_method', ['id'=>$id])[0];

        if($_POST){
            $data = $_POST;
            if($_FILES['img'] && $_FILES['img']['name']!=''){
                if(file_exists($edit->img)){
                    unlink($edit->img);
                }
                $data['img'] = uploadToWebp($_FILES['img'], 'public/images/logo/', "payment_method-".time(), 400, null, 80);
            }
            update('payment_method', $data, ['id'=>$id]);
            set_msg('success', 'Successfully Updated');
            redirect('trx_method/TrxMethod/all?system_id=NzFfMTMz', 'refresh');
        }


        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/payment_method/edit', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function delete($id){
        $method = readTable('payment_method', ['id'=>$id])[0];
        if(file_exists($method->img)){
            unlink($method->img);
        }
        remove('payment_method', ['id'=>$id]);
        set_msg('success', 'Successfully Deleted');
        redirect('trx_method/TrxMethod/all?system_id=NzFfMTMz', 'refresh');
    }
}
