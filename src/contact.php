<?php
// src/Contact.php

require_once 'Base.php';

class Contact extends Base {
    private $conn;
    private $table = 'contacts';

    public $id;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $email;
    public $password;
    public $phone;
    public $department;
    public $address;

    public function __construct($db) {
        parent::__construct();
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET first_name=?, last_name=?, date_of_birth=?, email=?, password=?, 
            phone=?, department=?, address=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssss", $this->first_name, $this->last_name, $this->date_of_birth, $this->email, $this->password, 
            $this->phone, $this->department, $this->address);

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
        $query = "UPDATE " . $this->table . " SET first_name=?, last_name=?, date_of_birth=?, email=?, password=?, 
            phone=?, department=?, address=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssssi", $this->first_name, $this->last_name, $this->date_of_birth, $this->email, 
            $this->password, $this->phone, $this->department, $this->address, $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);

        return $stmt->execute();
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table . " WHERE email = ? AND password = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $this->email, $this->password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
