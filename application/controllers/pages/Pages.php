<?php class Pages extends Admin_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->data['meta_keyword'] = '';
            $this->data['meta_title'] = '';
            $this->data['meta_description'] = '';

            if($_POST && $_POST['title']!=''){
                if(!empty(readTable('pages', ['title'=>$_POST['title']]))){
                    update('pages', ['title'=>$_POST['title'], 'description'=>$_POST['description']], ['title'=>$_POST['title']]);
                }
                else {save('pages', $_POST);}
                set_msg('success', 'Successfully Saved');
            }

            $this->load->view('admin/includes/header', $this->data);
            $this->load->view('admin/includes/aside', $this->data);
            $this->load->view('admin/includes/headermenu', $this->data);
            $this->load->view('admin/includes/nav', $this->data);
            $this->load->view('components/pages/pages', $this->data);
            $this->load->view('admin/includes/footer', $this->data);
        }

        function getContent(){
            if($_POST && $_POST['title']!=''){
                echo json_encode(readTable('pages', ['title'=>$_POST['title']]));
            }
            else{echo '';} 
            die;
        }
    }
?>
