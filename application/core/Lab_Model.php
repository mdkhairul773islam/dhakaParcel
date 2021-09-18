<?php

class Lab_Model extends CI_Model {

    protected $_table_name = '';
    protected $_order_by = 'id';
    protected $_order_type = 'asc';
    protected $_limit = '';

    function __construct() {
        parent::__construct();
    }

}
