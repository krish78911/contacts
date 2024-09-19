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

    <?php include 'header.php'; ?>
    <?php include 'redirect_to_login.php'; ?>
    <?php include 'nav.php'; ?>
    
    <div class="container mt-5">
    <h1>Edit Contact</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($contact['id']); ?>">
        
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo htmlspecialchars($contact['first_name']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo htmlspecialchars($contact['last_name']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="dateOfBirth" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" value="<?php echo htmlspecialchars($contact['date_of_birth']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($contact['password']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($contact['phone']); ?>">
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department:</label>
            <select class="form-select" id="department" name="department">
                <option value="">Select</option>
                <option value="Accounts" <?php echo (htmlspecialchars($contact['department']) == "Accounts" ? "selected":""); ?>>Accounts</option>
                <option value="Marketing" <?php echo (htmlspecialchars($contact['department']) == "Marketing" ? "selected":""); ?>>Marketing</option>
                <option value="IT" <?php echo (htmlspecialchars($contact['department']) == "IT" ? "selected":""); ?>>IT</option>
                <option value="Software Development" <?php echo (htmlspecialchars($contact['department']) == "Software Development" ? "selected":""); ?>>Software Development</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3"><?php echo htmlspecialchars($contact['address']); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
</div>
    <?php include 'footer.php'; ?>
