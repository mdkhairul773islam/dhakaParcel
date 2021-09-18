<?php class Product extends Admin_controller {

    function __construct() {
        parent::__construct();
        $this->data['categories'] = readTable('categories', ['trash'=>0], ['orderBy'=>['id', 'DESC']]);
    }

    public function index(){
        $where = [];
        if($_POST && is_array($_POST['search'])){
           foreach ($_POST['search'] as $key => $value) 
           {
               if($value!='') $where['products.'.$key] = $value;
           }
        }

        $tableFrom = 'products';
        $tableTo = ['categories', 'subcategories'];
        $joinCond = ['products.cat_id=categories.id', 'products.sub_cat_id=subcategories.id'];
        $select = ['products.*', 'categories.category', 'subcategories.subcategory'];


        $where['products.trash'] = 0;
        $where['categories.trash'] = 0;
        $where['subcategories.trash'] = 0;

        $this->data['all_product'] = get_join($tableFrom, $tableTo,$joinCond, $where, $select);


        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/product/all', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function add(){

        if($_POST){

            $data = $_POST;
            $data['date'] = date('Y-m-d');

            save('products', $data);

            set_msg('success', 'Product Successfully Saved');
            redirect('product/product/', 'refresh');
        }
        

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/product/add', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    public function edit($id) {

        $this->data['meta_keyword'] 	= '';
        $this->data['meta_title'] 		= '';
        $this->data['meta_description'] = '';

        $this->data['subcategories'] = get_result('subcategories', ['trash'=> 0]);

        $where =  ['id'=>$id];
        $this->data['edit'] = get_row('products', $where);

        if($_POST){

            $data = $_POST;
            $data['date'] = date('Y-m-d');
            update('products', $data, ['id'=>$id]);

            set_msg('success', 'Product Successfully Saved');
            redirect('product/product/', 'refresh');
        }

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/includes/nav', $this->data);
        $this->load->view('components/product/edit', $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }



    public function trash($id){
        update('products', ['trash'=>1], ['id'=>$id]);
        set_msg('success', 'Product Successfully Saved');
        redirect('product/product/', 'refresh');
    }

}
