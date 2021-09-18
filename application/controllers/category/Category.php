<?php class Category extends Admin_controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';
        
        $where = ['trash'=>0];
        if($_POST && !empty($_POST['id'])){
            $where['id'] = $_POST['id'];
        }

        $this->data['categories'] = readTable('categories', $where);

        $this->data['all_categories'] = readTable('categories', ['trash'=>0]);

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/category/all', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function add() {
        $this->data['meta_keyword'] = '';
        $this->data['meta_title'] = '';
        $this->data['meta_description'] = '';

        if($_POST){
        	$data 		 = $_POST;
    		$data['img'] = uploadToWebp($_FILES['img'], 'public/images/categories/', time(), 270, null, 80);
    		save('categories', $data);
    		set_msg('success', 'Category Successfully Saved');
    		redirect_back();
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/category/add', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function edit($id) {
        $this->data['meta_keyword'] 	= '';
        $this->data['meta_title'] 		= '';
        $this->data['meta_description'] = '';
        $this->data['category'] 		= readTable('categories', ['id'=>$id])[0];
        
        if($_POST){
        	$data = $_POST;
    		$path = uploadToWebp($_FILES['img'], 'public/images/categories/', time(), 270, null, 80);
            if($path){
                $data['img'] = $path;
                if($_POST['old_file']!='' && file_exists($_POST['old_file'])){
                    unlink($_POST['old_file']);
                }
            }
            unset($data['old_file']);
    		update('categories', $data, ['id'=>$id]);
    		set_msg('success', 'Category Successfully Saved');
    		redirect_back();
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/category/edit', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function trash($id){
    	update('categories', ['trash'=>1], ['id'=>$id]);
    	set_msg('success', 'Category Successfully Deleted');
    	redirect_back();
    }
}
