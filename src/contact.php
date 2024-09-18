<?php
// src/Contact.php

class Contact {
    private $conn;
    private $table = 'contacts';

    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET name=?, email=?, phone=?, address=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $this->name, $this->email, $this->phone, $this->address);

        return $stmt->execute();
    }

    public function read($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        $query = "SELECT * FROM " . $this->table . " LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET name=?, email=?, phone=?, address=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $this->name, $this->email, $this->phone, $this->address, $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);

        return $stmt->execute();
    }
}
