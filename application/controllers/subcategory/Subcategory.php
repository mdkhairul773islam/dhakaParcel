<?php class Subcategory extends Admin_controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['meta_keyword']     = '';
        $this->data['meta_title']       = '';
        $this->data['meta_description'] = '';
        
        $where = ['trash'=>0];
        if($_POST && !empty($_POST['id'])){
            $where['id'] = $_POST['id'];
        }

        $this->data['subcategories']     = readTable('subcategories', $where, ['orderBy'=>['id', 'DESC']]);
        $this->data['all_subcategories'] = readTable('subcategories', ['trash'=>0], ['orderBy'=>['id', 'DESC']]);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/subcategory/all', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function add() {
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        $this->data['categories'] = readTable('categories', ['trash'=>0], ['orderBy'=>['id', 'DESC']]);

        if($_POST){
    		save('subcategories', $_POST);
    		set_msg('success', 'Subcategory Successfully Saved');
    		redirect_back();
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/subcategory/add', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function edit($id) {
        $this->data['meta_keyword'] 	= '';
        $this->data['meta_title'] 		= '';
        $this->data['meta_description'] = '';
        $this->data['subcategory'] 		= readTable('subcategories', ['id'=>$id])[0];
        $this->data['categories']       = readTable('categories', ['trash'=>0], ['orderBy'=>['id', 'DESC']]);

        if($_POST){
    		update('subcategories', $_POST, ['id'=>$id]);
    		set_msg('success', 'Subcategory Successfully Saved');
    		redirect_back();
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/subcategory/edit', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function trash($id){
    	update('subcategories', ['trash'=>1], ['id'=>$id]);
    	set_msg('success', 'Subcategory Successfully Deleted');
    	redirect_back();
    }
}
