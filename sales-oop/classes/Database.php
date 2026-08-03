<?php
class Database {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "root", "sales", 8889);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>