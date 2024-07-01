<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Example: Send email (you can replace with your actual email sending logic)
    $to = "fireraider98@gmail.com";
    $subject = "Contact Form Submission";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_content)) {
        echo "<p>Thank you for your message, $name. I will get back to you soon.</p>";
    } else {
        echo "<p>Oops! Something went wrong. Please try again later.</p>";
    }
}
?>
