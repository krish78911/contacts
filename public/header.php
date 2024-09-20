<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
require_once '../config/database.php';
require_once '../src/ContactController.php';

$database = new Database();
$db = $database->getConnection();

$contactController = new ContactController($db);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 50;

$result = $contactController->read($page, $limit);
$totalContacts = $db->query("SELECT COUNT(*) AS count FROM contacts")->fetch_assoc()['count'];
$totalPages = ceil($totalContacts / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
</head>
<body>
    <?php
        $isAdmin = false;
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
            $isAdmin = true;
        }

        $userId = 0;
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
        }

        $isLoggedIn = 0;
        if (isset($_SESSION['is_logged_in'])) {
            $isLoggedIn = $_SESSION['is_logged_in'];
        }
    ?>
    <div class="flex-wrapper bg-light">