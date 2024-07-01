<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate input
    $errors = [];
    if (empty($name) || empty($email) || empty($message)) {
        $errors[] = "All fields are required.";
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Process the form if no errors
    if (empty($errors)) {
        // Example: Send email
        $to = getenv('CONTACT_EMAIL');
        $subject = "Contact Form Submission";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email
        if (mail($to, $subject, $email_content, $headers)) {
            echo "<p>Thank you for your message, $name. I will get back to you soon.</p>";
        } else {
            echo "<p>Oops! Something went wrong. Please try again later.</p>";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
