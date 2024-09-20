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

<div class="container mt-4 mb-4 shadow-sm p-3 mb-5 bg-white rounded">
    <h3 class="text-center mb-4">Add New Contact</h3>
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
            <input type="text" class="form-control" id="password" name="password" minlength="8" required>
            <div class="invalid-feedback">Please provide a valid Password.</div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
            <div class="invalid-feedback">Please provide a valid Phone Number.</div>
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
            <div class="invalid-feedback">Please select a department.</div>
        </div>

        <div class="mb-3">
            <label for="job_type" class="form-label">Job Type:</label>
            <select class="form-select" id="job_type" name="job_type" required>
                <option value="">Select</option>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
                <option value="Mini">Mini</option>
                <option value="Freelance">Freelance</option>
            </select>
            <div class="invalid-feedback">Please select job type.</div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            <div class="invalid-feedback">Please provide address.</div>
        </div>

        <?php if($isAdmin): ?>
            <div class="mb-3">
                <label for="sick_leave" class="form-label">Number of - Sick Leaves:</label>
                <input type="number" name="sick_leave" min="0" value="0" class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="child_sick_leave" class="form-label">Number of - Child Sick Leaves:</label>
                <input type="number" name="child_sick_leave" min="0" value="0" class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="emergency_leave" class="form-label">Number of - Emergency Leaves:</label>
                <input type="number" name="emergency_leave" min="0" value="0" class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary (Yearly):</label>
                <input type="number" name="salary" min="0" value="0" class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="is_admin" class="form-label">Job Type:</label>
                <select class="form-select" id="is_admin" name="is_admin" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                <div class="invalid-feedback">Please select admin rights.</div>
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary w-100">Add Contact</button>
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

<script src="../assets/showPassword.js"></script>

<?php include 'footer.php'; ?>