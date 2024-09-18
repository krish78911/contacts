<?php
require_once '../config/database.php';
require_once '../src/ContactController.php';

$database = new Database();
$db = $database->getConnection();

$contactController = new ContactController($db);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id) {
    $contactController->delete($id);
}

header('Location: index.php');
