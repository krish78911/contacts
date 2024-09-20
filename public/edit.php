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
    
    <div class="container mt-4 mb-4 shadow-sm p-3 mb-5 bg-white rounded">
    <h3 class="text-center mb-4">Edit Contact</h3>
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
            <input type="checkbox" onclick="showPassword()">Show Password
            <input type="password" class="form-control" id="password" name="password" minlength="8" 
                value="<?php echo htmlspecialchars($contact['password']); ?>" required>
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
            <label for="job_type" class="form-label">Job Type:</label>
            <select class="form-select" id="job_type" name="job_type" required>
                <option value="">Select</option>
                <option value="Full Time" <?php echo (htmlspecialchars($contact['job_type']) == "Full Time" ? "selected":""); ?>>
                    Full Time</option>
                <option value="Part Time" <?php echo (htmlspecialchars($contact['job_type']) == "Part Time" ? "selected":""); ?>>
                    Part Time</option>
                <option value="Mini" <?php echo (htmlspecialchars($contact['job_type']) == "Mini" ? "selected":""); ?>>
                    Mini</option>
                <option value="Freelance" <?php echo (htmlspecialchars($contact['job_type']) == "Freelance" ? "selected":""); ?>>
                    Freelance</option>
            </select>
            <div class="invalid-feedback">Please select job type.</div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3"><?php echo htmlspecialchars($contact['address']); ?></textarea>
        </div>

        <?php if($isAdmin): ?>
            <div class="mb-3">
                <label for="sick_leave" class="form-label">Number of - Sick Leaves:</label>
                <input type="number" name="sick_leave" min="0" value="<?php echo htmlspecialchars($contact['sick_leave']); ?>" 
                    class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="child_sick_leave" class="form-label">Number of - Child Sick Leaves:</label>
                <input type="number" name="child_sick_leave" min="0" value="<?php echo htmlspecialchars($contact['child_sick_leave']); ?>" 
                    class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="emergency_leave" class="form-label">Number of - Emergency Leaves:</label>
                <input type="number" name="emergency_leave" min="0" value="<?php echo htmlspecialchars($contact['emergency_leave']); ?>" 
                    class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary (Yearly):</label>
                <input type="number" name="salary" min="0" value="<?php echo htmlspecialchars($contact['salary']); ?>" 
                    class="form-control" oninput="this.value = Math.abs(this.value)">
                <div class="invalid-feedback">Please select job type.</div>
            </div>
            <div class="mb-3">
                <label for="is_admin" class="form-label">Job Type:</label>
                <select class="form-select" id="is_admin" name="is_admin" required>
                    <option value="0" <?php echo (htmlspecialchars($contact['is_admin']) == "0" ? "selected":""); ?>>No</option>
                    <option value="1" <?php echo (htmlspecialchars($contact['is_admin']) == "1" ? "selected":""); ?>>Yes</option>
                </select>
                <div class="invalid-feedback">Please select admin rights.</div>
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary w-100">Update Contact</button>
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
