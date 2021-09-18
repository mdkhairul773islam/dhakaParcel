<?php

class Retrieve extends Lab_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    /*// for custom helper
    public function forIdGenerator($table) {
        $this->_table_name = $table;
        $this->_order_type = 'desc';
        $this->_limit = '1';
        
        return $this->retrieve();
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
    
    // update into database
    public function update($table, $data, $where) {
        $this->_table_name = $table;
        return $this->save($data, $where);
    }
    
    // retrieve from database
    public function read($table, $where = array(),$by="asc") {
        $this->_table_name = $table;
        $this->_order_type = $by;
        
        if(count($where) > 0){
            return $this->retrieve_by($where);
        } else {
            return $this->retrieve();
        }
    }
	
	// retrieve from database
    public function readDistinct($table, $field_name)
	 {
      $sql="select distinct $field_name from $table";
	  $query = $this->db->query($sql);
	  return $query->result();      	  
     }
	
	// read between two dates	
	
	 public function readByDate($table)
      {
       
        $currentDate= date('Y-m-d');		
        $pastDate = date('Y-m-d',strtotime($currentDate) - (24*60*60*7));
		
        $sql = "SELECT * FROM $table WHERE  date BETWEEN   '$pastDate' AND  '$currentDate' order by date desc";
			
		$query = $this->db->query($sql);
		return $query->result();
    }
	
    
    // delete information from table
    public function deleteData($table, $where) {
        $this->_table_name = $table;
        return $this->delete($where);
    }
 */   
}
