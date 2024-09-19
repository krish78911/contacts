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

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="container mt-5">
    <form method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="first_name" required>
            <div class="invalid-feedback">First Name is required.</div>
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="last_name" required>
            <div class="invalid-feedback">Last Name is required.</div>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="date_of_birth" required>
            <div class="invalid-feedback">Please select your Date of Birth.</div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">Please provide a valid email.</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">Please provide a valid Password.</div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department:</label>
            <select class="form-select" id="department" name="department" required>
                <option value="">Select</option>
                <option value="Accounts">Accounts</option>
                <option value="Marketing">Marketing</option>
                <option value="IT">IT</option>
                <option value="Software Development">Software Development</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Contact</button>
    </form>
</div>

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