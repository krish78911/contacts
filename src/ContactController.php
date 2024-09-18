<?php
// src/ContactController.php

require_once 'Contact.php';

class ContactController {
    private $contact;

    public function __construct($db) {
        $this->contact = new Contact($db);
    }

    public function create($data) {
        $this->contact->name = $data['name'];
        $this->contact->email = $data['email'];
        $this->contact->phone = $data['phone'];
        $this->contact->address = $data['address'];

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
        $this->contact->name = $data['name'];
        $this->contact->email = $data['email'];
        $this->contact->phone = $data['phone'];
        $this->contact->address = $data['address'];

        return $this->contact->update();
    }

    public function delete($id) {
        $this->contact->id = $id;
        return $this->contact->delete();
    }
}
