<?php
require_once '../config/database.php';
require_once '../src/ContactController.php';

$database = new Database();
$db = $database->getConnection();

$contactController = new ContactController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactController->create($_POST);
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
</head>
<body>
    <h1>Add New Contact</h1>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Phone:</label>
        <input type="text" name="phone">
        <br>
        <label>Address:</label>
        <textarea name="address"></textarea>
        <br>
        <input type="submit" value="Add Contact">
    </form>
</body>
</html>
