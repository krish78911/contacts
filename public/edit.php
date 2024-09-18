<?php
require_once '../config/database.php';
require_once '../src/ContactController.php';

$database = new Database();
$db = $database->getConnection();

$contactController = new ContactController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactController->update($_POST);
    header('Location: index.php');
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$contact = $contactController->readOne($id);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($contact['id']); ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($contact['name']); ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
        <br>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($contact['phone']); ?>">
        <br>
        <label>Address:</label>
        <textarea name="address"><?php echo htmlspecialchars($contact['address']); ?></textarea>
        <br>
        <input type="submit" value="Update Contact">
    </form>
</body>
</html>
