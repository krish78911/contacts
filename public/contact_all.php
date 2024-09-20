<?php
require_once '../src/ContactFormController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactFormController = new ContactFormController($_POST);
    $contactFormController->sendEmail();
    //header('Location: index.php');
}
?>

<?php include 'header.php'; ?>
<?php include 'redirect_to_login.php'; ?>
<?php include 'nav.php'; ?>
<div class="container mt-4 mb-4 shadow-sm p-3 mb-5 bg-white rounded">
    <h2>Contact Us</h2>
    <form method="POST" id="contactForm">

        <div class="mb-3">
            <label for="name" class="form-label">Sender Id</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $userId; ?>" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Sender Id</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $userId; ?>" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>
</div>
<?php include 'footer.php'; ?>