<?php

class Profiles_m extends Lab_Model {
    // set default properties
    protected $_table_name = 'users';
    
    function __construct() {
        parent::__construct();
    }
    
    public function getData() {
        return $this->retrieve();
    }
    
    public function deleteData($where) {
        return $this->delete($where);
    }
    
    public function add($data) {
        return $this->save($data);
    }

}
