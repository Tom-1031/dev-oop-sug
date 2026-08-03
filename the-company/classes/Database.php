<?php

class Database {
    private $server_name = "localhost";
    private $user_name   = "root";
    private $password    = "root";  //"root" for MAMP users
    private $db_name     = "the_company_aug";
    protected $conn;     
    
    public function __construct() {
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->conn = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
        // $this->conn holds the connection to the database.

        if ($this->conn->connect_error) {
            die('Unable to connect to database: ' . $this->conn->connect_error);
        }
    }

}
?>