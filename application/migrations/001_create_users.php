<?php

class Migration_Create_users extends CI_Migration {

    function __construct() {
        parent::__construct();
    }
    
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 128
            ),
            'privilege' => array(
                'type' => 'INT',
                'constraint' => 2
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'status' => array(
                'type' => 'TEXT'
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }
    
    public function down() {
        $this->dbforge->drop_table('users');
    }

}

