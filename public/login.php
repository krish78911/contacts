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
                            <input type="email" class="form-control" id="email" name="email" 
                                placeholder="Enter your email" required>
                            <div class="invalid-feedback">Please provide valid Email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8"
                                placeholder="Enter your password" required>
                                <div class="invalid-feedback">Please provide password.</div>
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
                <?php include 'about_intro.php'; ?>
            </div>
        </div>
        
    </div>
</section>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<?php include 'footer.php'; ?>