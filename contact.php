<?php
require_once 'config.php';

class Contact {
    private $conn;
    private $table = 'contacts';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

    public function create($name, $email, $phone, $address) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (name, email, phone, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $email, $phone, $address);
        return $stmt->execute();
    }

    public function read($limit, $offset) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table LIMIT ? OFFSET ?");
        $stmt->bind_param('ii', $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function update($id, $name, $email, $phone, $address) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
        $stmt->bind_param('ssssi', $name, $email, $phone, $address, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function count() {
        $result = $this->conn->query("SELECT COUNT(*) as count FROM $this->table");
        $row = $result->fetch_assoc();
        return $row['count'];
    }
}
?>
