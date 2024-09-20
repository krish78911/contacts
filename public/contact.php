<?php
require_once '../src/ContactFormController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactFormController = new ContactFormController($_POST);
    $contactFormController->sendEmail();
    //header('Location: index.php');
}
?>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="container d-flex justify-content-center align-items-center col-sm-6 col-lg-6 col-xl-6">
                <div class="card shadow-lg p-4" style="width: 400px;">
                    <h3 class="text-center mb-4">Contact Us</h3>
                    <form method="POST" id="contactForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="text-center col-sm-6 col-lg-6 col-xl-6">
                <?php include 'about_intro.php'; ?>
            </div>
        </div>
        
    </div>
</section>
<?php include 'footer.php'; ?>