<?php
// src/ContactController.php

require_once 'Contact.php';
require_once 'Base.php';

class ContactController extends Base {
    private $contact;

    public function __construct($db) {
        parent::__construct();
        $this->contact = new Contact($db);
    }

    public function create($data) {
        $this->contact->first_name = $data['first_name'];
        $this->contact->last_name = $data['last_name'];
        $this->contact->date_of_birth = $data['date_of_birth'];
        $this->contact->email = $data['email'];
        $this->contact->password = $data['password'];
        $this->contact->phone = $data['phone'];
        $this->contact->department = $data['department'];
        $this->contact->job_type = $data['job_type'];
        $this->contact->address = $data['address'];
        // optional only admin can add
        $this->contact->sick_leave = $data['sick_leave'];
        $this->contact->child_sick_leave = $data['child_sick_leave'];
        $this->contact->emergency_leave = $data['emergency_leave'];
        $this->contact->salary = $data['salary'];
        $this->contact->is_admin = $data['is_admin'];

        return $this->contact->create();
    }

    public function read($page = 1, $limit = 10) {
        return $this->contact->read($page, $limit);
    }

    public function readOne($id) {
        $this->contact->id = $id;
        return $this->contact->readOne();
    }

    public function update($data) {
        $this->contact->id = $data['id'];
        $this->contact->first_name = $data['first_name'];
        $this->contact->last_name = $data['last_name'];
        $this->contact->date_of_birth = $data['date_of_birth'];
        $this->contact->email = $data['email'];
        $this->contact->password = $data['password'];
        $this->contact->phone = $data['phone'];
        $this->contact->department = $data['department'];
        $this->contact->job_type = $data['job_type'];
        $this->contact->address = $data['address'];
        // optional only admin can edit
        $this->contact->sick_leave = $data['sick_leave'];
        $this->contact->child_sick_leave = $data['child_sick_leave'];
        $this->contact->emergency_leave = $data['emergency_leave'];
        $this->contact->salary = $data['salary'];
        $this->contact->is_admin = $data['is_admin'];

        return $this->contact->update();
    }

    public function delete($id) {
        $this->contact->id = $id;
        return $this->contact->delete();
    }

    public function checkLogin($data) {
        // Check if email and password are set in the data
        if (empty($data['email']) || empty($data['password'])) {
            return ['error' => 'Email and password are required.'];
        }

        // Sanitize email
        $this->contact->email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $this->contact->password = $data['password'];
        $result = $this->contact->login();
        if($result) {
            $_SESSION['is_logged_in'] = 1;
            $_SESSION['is_admin'] = $result['is_admin'];
            $_SESSION['user_id'] = $result['id'];
            header('Location: index.php');
        }
        else {
            echo "Username or Password is wrong.";
        }
    }
}
