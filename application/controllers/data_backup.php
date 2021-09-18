<?php

class Data_backup extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->helper('backup');
        $this->data['db_name']=config_item('my_database');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Admit';
        $this->data['active'] = 'data-target="backup_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        
        $date=date("d-M-Y");
        $db_name=$this->data['db_name'];
        $this->data['confirmation'] = null;

    //Creating All table list Start here
        $table_list=array();
        $result=mysql_query("show tables from ".$db_name);
        while($row=mysql_fetch_row($result)){
            $table_list[]=$row[0];
        }
        $this->data['table_list']=$table_list;
    //Creating All table End here
        
    // Export
        if ($this->input->post("export")) {
            dbe_engin("./public/backup_Data/");
        }
        

        $database_list=glob("public/backup_Data/*");
        $this->data['database_list']=$database_list;
    //Creating All database list Start here

    //Delete
        if (isset($_GET["delete_token"])) {
            $filepath="./".$_GET["delete_token"];
            if (is_file($filepath)) {
                unlink($filepath);
            }
            //header("location:".$_SERVER['PHP_SELF']);
            redirect('data_backup','refresh');
            
        }        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/data_backup/data_backup_nav', $this->data);
        $this->load->view('components/data_backup/data_backup', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function import_data() {
        $this->data['meta_title'] = 'Admit';
        $this->data['active'] = 'data-target="backup_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation']=$this->data["student_info"]= null;
        
        if (isset($_POST["upload"])){
            $name=$_FILES["datafile"]["name"];
            $des="./public/imported_data/".$name;
            $src=$_FILES["datafile"]["tmp_name"];
            $success=copy($src,$des);
            if ($success) {
                $confirm=dbi_engin($des);
                if($confirm){
                    $this->data['confirmation'] = message("success");
                    unlink($des);
                }
            }

        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/data_backup/data_backup_nav', $this->data);
        $this->load->view('components/data_backup/import_data', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
  
    
}
