<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'address_book_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
?>