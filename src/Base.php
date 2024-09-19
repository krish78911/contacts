<?php
// src/Base.php

class Base {
    public function __construct() {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
    }
}