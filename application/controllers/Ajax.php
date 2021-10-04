<?php
class Ajax extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }

    // Read Table
    function read(){
        if($_POST){
            if(!empty($_POST['table']) && $_POST['table']!=''){
                $where = $niddle = [];
                if(!empty($_POST['where']))
                    $where = json_decode($_POST['where'], true);
                if(!empty($_POST['niddle']))
                    $niddle = json_decode($_POST['niddle'], true);

                $result = readTable($_POST['table'], $where, $niddle);
                echo json_encode($result);
            }
        }
        else {
            // get the incoming object
            $content = file_get_contents("php://input");
            // convart object to array
            $receive = json_decode($content, true);

            $where = [];
            if(array_key_exists('where', $receive)){
                $where = $receive['where'];
            }

            if(array_key_exists('table', $receive)){
                $result = readTable($receive['table'], $where);
                echo json_encode($result);
            }

        }

    }

    // Read Table
    function delete(){
        if($_POST){
            if(!empty($_POST['table']) && $_POST['table']!=''){
                $where = [];
                if(!empty($_POST['where']))
                    $where = json_decode($_POST['where'], true);

                $result = remove($_POST['table'], $where);
                echo json_encode($result);
            }
        }
    }


    // PRODUCT IMAGE DELETE
    function imageDelete(){

        if(!empty($_POST['id']) && $_POST['id']!=''){
            $images = readTable('product_images', ['id'=>$_POST['id']]);
            if($images){
                if(file_exists($images[0]->large))
                    unlink($images[0]->large);
                if(file_exists($images[0]->medium))
                    unlink($images[0]->medium);
                if(file_exists($images[0]->small))
                    unlink($images[0]->small);
            }
            echo remove('product_images', ['id'=>$_POST['id']]);
        }
    }

    // Get Products
    function getProducts(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        $where = [];
        if(array_key_exists('where', $receive)){
            $where = $receive['where'];
        }
        echo json_encode(getProducts($where)); 
    }


    // Get Supplier Info
    function getSupplier(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        if(array_key_exists('supplier_id', $receive))
        {
            echo json_encode(getSupplierInfo($receive['supplier_id']));
        }
        
    }


    // Get Supplier Info
    function purchaseInvoice(){
        // get the incoming object
        $content = file_get_contents("php://input");
        // convart object to array
        $receive = json_decode($content, true);

        if(array_key_exists('sap_record_id', $receive))
        {
            echo json_encode(purchaseInvoice($receive['sap_record_id']));
        }
        
    }

    function orderStatus(){
        if($_POST && $_POST['status'] && $_POST['order_id']){
            update('orders', ['status'=>$_POST['status']], ['id'=>$_POST['order_id']]);
            echo 1;
        }
        else echo 0;

    }

    function save_theme(){
        if($_POST && $_POST['theme']){
            $theme = readTable('site_meta', ['meta_key'=>'theme']);
            if($theme){
                update('site_meta', ['meta_value'=>$_POST['theme']], ['meta_key'=>'theme']);
            }else{
                save('site_meta', ['meta_key'=>'theme', 'meta_value'=>$_POST['theme']]);
            }
            echo 1;
        }
    }


    // all result
    public function result(){
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $table = $receive['table'];

        // set a default condition
        $where = [];
        // check the condition exists into the array
        if(array_key_exists('cond', $receive)){
            $where = $receive['cond'];
        }
		
		$where_in = [];
        // check the condition exists into the array
        if(array_key_exists('where_in', $receive)){
            $where_in = $receive['where_in'];
        }
        
        // check select column
        if(array_key_exists('select', $receive)){
            $select = $receive['select'];
        }else{
            $select = '';
        }

        // check group
        if(array_key_exists('groupBy', $receive)){
            $groupBy = $receive['groupBy'];
        }else{
            $groupBy = '';
        }
        
        // check border by
        if(array_key_exists('order_col', $receive) &&  array_key_exists('order_by', $receive)){
            $order_col = $receive['order_col'];
            $order_by  = $receive['order_by'];
        }else{
            $order_col = '';
            $order_by = '';
        }
        
        // get information from database
        $result = get_result($table, $where, $select, $groupBy, $order_col, $order_by);

        // convart the information array to JSON string
        echo json_encode($result);
    }

    // all join
    public function join(){
		
        // get the incoming object
        $content = file_get_contents("php://input");
        
        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $tableFrom  = $receive['tableFrom'];
        $tableTo    = $receive['tableTo'];

        // join condition
        $joinCond = [];
        if(array_key_exists('joinCond', $receive)){
            $joinCond = $receive['joinCond'];
        }
        
        // where condition
        $where = [];
        if(array_key_exists('cond', $receive)){
            $where = $receive['cond'];
        }
		
		// where in condition
		$where_in = [];
        if(array_key_exists('where_in', $receive)){
            $where_in = $receive['where_in'];
        }
        
        // check select column
        if(array_key_exists('select', $receive)){
            $select = $receive['select'];
        }else{
            $select = '';
        }

        // check group
        if(array_key_exists('groupBy', $receive)){
            $groupBy = $receive['groupBy'];
        }else{
            $groupBy = '';
        }
        
        // check border by
        if(array_key_exists('order_col', $receive) &&  array_key_exists('order_by', $receive)){
            $order_col = $receive['order_col'];
            $order_by  = $receive['order_by'];
        }else{
            $order_col = '';
            $order_by = '';
        }
        
        
        // get information from database
        $result = get_join($tableFrom, $tableTo, $joinCond, $where, $select, $groupBy, $order_col, $order_by, $where_in);

        // convart the information array to JSON string
        echo json_encode($result);
    }

}