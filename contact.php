<?php
// Turn on error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $project = isset($_POST['project']) ? htmlspecialchars($_POST['project']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Validate form data
    if (empty($name) || empty($email) || empty($project) || empty($message)) {
        echo "Please fill in all fields.";
    } else {
        // Set the email recipient
        $to = 'amaanzubair5@gmail.com'; // Replace with your email address
        $subject = 'New contact form submission';

        // Create the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Project: $project\n";
        $email_content .= "Message:\n$message\n";

        // Set email headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            echo "Thank you for your message. We will get back to you soon.";
        } else {
            echo "There was an error sending your message. Please try again.";
        }
    }
}
?>
