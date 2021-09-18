<?php

class Action extends Lab_Model {

/*    function __construct() {
        parent::__construct();
        
        $news = $this->db->read('page');
        print_r($news);
    }

    // for custom helper
    public function maxId($table) {
        $sql = "SELECT id AS maxId FROM $table ORDER BY id DESC LIMIT 1";

        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return 0;
    }

    public function max_value($table, $column, $where = array()) {
        $this->db->select_max($column);
        $this->db->where($where);

        $result = $this->db->get($table)->row();

        return $result->$column;
    }


     public function readOrderby($table,$order_by,$where=array(),$sort='asc'){
        $this->db->order_by($order_by,$sort);
        $this->db->where($where);
        $query = $this->db->get($table);

        return $query->result();
    }


    // for custom helper
    public function forIdGenerator($table) {
        $this->_table_name = $table;
        $this->_order_type = 'desc';
        $this->_limit = '1';

        return $this->retrieve();
    }

    // retrieve unic value from database
    public function read_distinct($table, $where = array(), $column) {
        $this->db->distinct();
        $this->db->select($column);
        $this->db->where($where);

        return $this->db->get($table)->result();
    }
    // check existance
    public function exists($table, $where) {
        return $this->existance($table, $where);
    }

    // save into database
    public function add($table, $data) {
        $this->_table_name = $table;
        return $this->save($data);
    }

	// retrieve last inserted id from database
	public function addAndGetId($table, $data) {
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

    // update into database
    public function update($table, $data, $where) {
        $this->_table_name = $table;
        return $this->save($data, $where);
    }

    // retrieve from database
    public function read($table, $where = array(), $by="asc") {
        $this->_table_name = $table;
        $this->_order_type = $by;

        if(count($where) > 0){
            return $this->retrieve_by($where);
        } else {
            return $this->retrieve();
        }
    }

    public function read_limit($table, $where = array(), $by="asc",$limit) {
        $this->_table_name = $table;
        $this->_order_type = $by;
        if (isset($limit)) {
            $this->_limit = $limit;
        }

        if(count($where) > 0){
            return $this->retrieve_by($where);
        } else {
            return $this->retrieve();
        }
    }

    public function readGroupBy($table, $groupBy, $where=array(), $orderBy="id", $sort="desc"){
        $this->db->select('*');
        $this->db->group_by($groupBy);
        $this->db->order_by($orderBy, $sort);
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }

    public function read_sum($table, $column, $where=array()){
        $this->db->select_sum($column);
        $this->db->where($where);
        $result = $this->db->get($table);

        return $result->result();
    }

    public function sum($table, $column, $where=array()){
        $this->db->select("SUM($column) AS amount", FALSE);
        $this->db->where($where);
        $query = $this->db->get($table);

        return $query->result();
    }


	// retrieve from database using two table
    public function joinAndRead($from, $join, $joinCond, $where=array()){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($join, $joinCond);
        $this->db->where($where);
        // $this->db->where($where2);

        $query = $this->db->get();

		return $query->result();
    }

    // retrieve from database using two table
    public function joinAndReadPurchase($from, $join, $joinCond, $where=array(),$orderbye="id", $ordertype="asc"){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($join, $joinCond);
        $this->db->order_by($orderbye, $ordertype);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result();
    }

    // retrieve from database using two table
    public function joinAndReadGroupby($from, $join, $joinCond, $where=array(), $groupby, $where2=array()){
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($join, $joinCond);
        $this->db->where($where);
        $this->db->where($where2);
        $this->db->group_by($groupby); // $groupby = 'table-name.column-name'

        $query = $this->db->get();

        return $query->result();
    }

    // retrieve from database using multiple table
    public function multipleJoinAndRead($from, $details=array(), $where=array()){
        $this->db->select('*');
        $this->db->from($from);

        // check type exists or not
        foreach ($details as $key => $val) {
            if(array_key_exists("type", $val)){
                $this->db->join($key, $val["condition"], $val["type"]);
            } else {
                $this->db->join($key, $val["condition"]);
            }
        }

        // appling condition
        $this->db->where($where);
        // get the result set
        $query = $this->db->get();


        // return the set
        return $query->result();
    }

    public function searchTransaction($table) {
        $bank= $this->input->post('bank_name');
        $account= $this->input->post('account_no');
        $fromDate= $this->input->post('date_from');
        $toDate= $this->input->post('date_to');

        $sql = "SELECT * FROM $table WHERE bank='$bank' AND account_number='$account' AND transaction_date BETWEEN   '$fromDate' AND  '$toDate' ";

		$query = $this->db->query($sql);
		return $query->result();
    }

	public function searchCost($table){
        $fromDate= $this->input->post('date_from');
        $toDate= $this->input->post('date_to');

        $sql = "SELECT * FROM $table WHERE  datetime BETWEEN   '$fromDate' AND  '$toDate' order by datetime asc";

		$query = $this->db->query($sql);
		return $query->result();
    }

    // retrieve from database
    public function showbyClass($table, $where = array()){
        $this->_table_name = $table;
        return $this->retrieve_by($where);
    }

	// retrieve from database
    public function show($table){
        $this->_table_name = $table;
		$this->_limit = '10';
        $this->_order_type = 'desc';
        return $this->retrieve();
    }

	// retrieve from database
    public function showbyDesc($table){
        $this->_table_name = $table;
        $this->_order_type = 'desc';
        return $this->retrieve();
    }

    // delete information from table
    public function deleteData($table, $where) {
        $this->_table_name = $table;

        if($this->delete($where)){
            return 'danger';
        }
    }

	public function getAllItems($table) {
        return $this->db->distinct('account_number')->from($table)->get()->result();
    }// for distinct value


    public function retrieve_cond($table, $where = array(), $order = 'asc') {
        $this->db->where($where);
        $this->db->order_by("id", $order);
        $query = $this->db->get($table);

        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
    }

	// retrieve from database
    public function readDistinct($table, $field_name){
        $sql = "select distinct $field_name from $table";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function read_leftJoin($leftTable,$leftField,$rightTable,$rightField){
        $sql= "select * from $leftTable LEFT JOIN users ON $leftTable.$leftField=$rightTable.$rightField";
        $query=$this->db->query($sql);
        return $query->result();
    }

    public function check_existance($table, $where) {
        return $this->existance($table, $where);
    }

    public function update_profile($info, $where) {
        $this->_table_name = 'users';
        return $this->save($info, $where);
    }

    public function sms_between($table,$fromDate,$toDate) {
        $sql = "SELECT * FROM $table WHERE delivery_date BETWEEN '$fromDate' AND  '$toDate'";
        $query = $this->db->query($sql);
        return $query->result();
    }

        // retrieve from database
    public function attendance_DISTINCT($session,$class,$shift,$section,$group){
        $sql = "SELECT DISTINCT attendance_roll,attendance_class,attendance_section,attendance_session,attendance_group,attendance_shift FROM attendance where `attendance_session`='$session' and `attendance_class`='$class' and `attendance_shift`='$shift' and `attendance_section`='$section' and `attendance_group`='$group' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

/*
    public function read_leftJoin(){
        $sql= "select * from employee LEFT JOIN users ON employee.employee_mobile=users.mobile where employee_mobile='01735189237' ";
        $query=$this->db->query($sql);
        return $query->result();
    }*/

  /*public function readPagination($table,$per_page,$offset,$order="asc")
    {
        $dateM=explode("-",date('Y-m-d'));
        $val=$dateM[2]-1;
        if(strlen($val) == 1){
          $date_cond = "0".$val;
        }else{
         $date_cond = $val;
        }
        $this->db->order_by('id',$order);
        $this->db->where("installment_type","monthly");
        $this->db->where("installment_date",$date_cond);
        $this->db->where("status","opened");
        $query=$this->db->get($table,$per_page,$offset);
        if($query->num_rows()>0){
          return $query->result();
        }else{
          return FALSE;
        }

    }*/

/*    public function read_absent_client($date, $showroom){
        // $sql = "SELECT party_code FROM `saprecords` WHERE party_code in (select code from`parties` where type='client') and sap_at < '$date' and showroom_id = '$showroom' group by party_code";

        $sql = "SELECT party_code FROM `saprecords` WHERE party_code in (select code from `parties` where type='client') and sap_at < '$date' and showroom_id = '$showroom' and party_code not in (select party_code from saprecords where sap_at >= '$date') group by party_code";
        $query = $this->db->query($sql);
        return $query->result();
    }*/


    
    

//image upload mathod
    /** 
    /*you have need to send 5 argument by upload() function following this sequence
    /*  (01) input field name attribute value (<input type='file' name="img">)
    /*  (02) allowed types as array like: array('jpg','png','gif')
    /*  (03) allowed file size in kb
    /*  (04) upload location with '/' at the end like: "path/img/"
    /*  (05) file name without extenssion like: fileName
    /*
    /* Then this function return the file location with file name you cane save this 
    /*  in to database for future use.

        //image size, path and name setup Example
        ---------------------------------------------
        $types = array('jpg','JPG','png','PNG','gif','GIF');
        $path  = "frontend/images/banner/";
        $name  = 'multimedia'.(strtotime(date('Y-m-d h:i:s'))*10);

        if($path = $this->action->upload("banner", $types, $size="1024", $path, $name)){
            $data['path'] = $path;
        }
    */

    /*public function upload($file=null,$types=array(),$size=null,$path=null,$name=null){
        
        if(is_null($file)){
            echo 'Please Set Your File Name from input field';
            return false;
        }
        $upload_path  = '';
        $allowed_types= array('jpg','JPG','png','PNG','gif','GIF');
        $max_size     = 1000;
        $file_name    = pathinfo($_FILES[$file]['name'])['filename'];
        $error_msg = null;

        //chacking argument and setting value
        if(!empty($types)){
            $allowed_types = $types;
        }
        if(!is_null($size)){
            $max_size = $size;
        }
        if(!is_null($path)){
            $upload_path = $path;
        }
        if(!is_null($name)){
            $file_name = $name;
        }

        //if this directory not exist creat automatically this directory
        if(!is_dir($upload_path)){
            mkdir($upload_path);
        }

        //chacking file type
        $file_type = pathinfo($_FILES[$file]['name'])['extension'];
        if (in_array($file_type, $allowed_types)) {

            //chacking file size
            if ($_FILES[$file]['size']<=$max_size*1000) {
                //now time to upload the image
                if(copy($_FILES[$file]['tmp_name'], $upload_path."/".$file_name.".".$file_type)){
                    return $upload_path.$file_name.".".$file_type;
                }else{
                    return false;
                }
            }else{
                $error_msg['img_type'] = "File size must be less than ".$max_size."kb";
            }
            echo pathinfo($_FILES[$file]['name'])['extension'];
        }else{
            $error_msg['img_type'] = "This file type is not supported";
        }
    }

*/

 // retrieve from database
    public function showbyClass($table, $where = array()){
        $this->_table_name = $table;
        return $this->retrieve_by($where);
    }
}
