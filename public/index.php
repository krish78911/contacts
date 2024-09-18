<?php
require_once '../config/database.php';
require_once '../src/ContactController.php';

$database = new Database();
$db = $database->getConnection();

$contactController = new ContactController($db);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;

$result = $contactController->read($page, $limit);
$totalContacts = $db->query("SELECT COUNT(*) AS count FROM contacts")->fetch_assoc()['count'];
$totalPages = ceil($totalContacts / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Address Book</title>
</head>
<body>
    <h1>Address Book</h1>
    <a href="add.php">Add New Contact</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
            <td><?php echo htmlspecialchars($row['address']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <div>
        <?php if ($page > 1): ?>
            <a href="index.php?page=<?php echo $page - 1; ?>">Previous</a>
        <?php endif; ?>
        <?php if ($page < $totalPages): ?>
            <a href="index.php?page=<?php echo $page + 1; ?>">Next</a>
        <?php endif; ?>
    </div>
</body>
</html>
