<?php
require_once '../config/database.php';
require_once '../src/ContactController.php';

$database = new Database();
$db = $database->getConnection();

$contactController = new ContactController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactController->checkLogin($_POST);
}
?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="container d-flex justify-content-center align-items-center col-sm-6 col-lg-6 col-xl-6">
                <div class="card shadow-lg p-4" style="width: 400px;">
                    <h3 class="text-center mb-4">Login</h3>
                    <form method="POST" id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <p class="text-center mt-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot password?</a>
                    </p>
                    <p class="text-center">
                        <a href="add.php">Create an account</a>
                    </p>
                </div>
            </div>
            <div class="text-center col-sm-6 col-lg-6 col-xl-6">
                <h1 class="display-4">Welcome to Employee Directory</h1>
                <p class="lead">Here you can maintain your Employees details.</p>
            </div>
        </div>
        
    </div>
</section>

<?php include 'footer.php'; ?>