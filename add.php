<?php
require_once 'Contact.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $contact = new Contact();
    $contact->create($name, $email, $phone, $address);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
</head>
<body>
    <h1>Add Contact</h1>
    <form action="add.php" method="POST">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Phone: <input type="text" name="phone"></label><br>
        <label>Address: <textarea name="address"></textarea></label><br>
        <button type="submit">Add Contact</button>
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
