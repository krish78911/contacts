<?php

class ContactFormController
{
    private $name;
    private $email;
    private $subject;
    private $message;

    // Constructor to initialize the form fields
    public function __construct($data)
    {
        $this->emailType = isset($data['emailType']) ? $this->sanitize($data['emailType']) : '';
        if($this->emailType == 'contactUsPage') {
            // TODO
        } elseif($this->emailType == 'contactAllPage') {
            // TODO
        } elseif($this->emailType == 'contactUserPage') {
            // TODO
        }
        $this->name = isset($data['name']) ? $this->sanitize($data['name']) : '';
        $this->email = isset($data['email']) ? $this->sanitize($data['email']) : '';
        $this->subject = isset($data['subject']) ? $this->sanitize($data['subject']) : '';
        $this->message = isset($data['message']) ? $this->sanitize($data['message']) : '';
    }

    // Method to sanitize the input data
    private function sanitize($data)
    {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    // Method to send the email
    public function sendEmail()
    {
        $to = "krishnasingh7891@gmail.com"; // Change to your receiving email
        $subject = $this->subject;
        $body = "Name: " . $this->name . "\n";
        $body .= "Email: " . $this->email . "\n";
        $body .= "Message: " . $this->message . "\n";

        $headers = "From: " . $this->email . "\r\n";
        $headers .= "Reply-To: " . $this->email . "\r\n";

        // Use PHP's mail function (or switch to PHPMailer for better handling)
        if (mail($to, $subject, $body, $headers)) {
            return "Email sent successfully!";
        } else {
            return "Failed to send email.";
        }
    }
}

// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create the ContactFormController object and send email
    $contactForm = new ContactFormController($name, $email, $subject, $message);
    $response = $contactForm->sendEmail();

    // Display the result
    echo $response;
}

?>
