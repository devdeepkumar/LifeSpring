<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the phone number from the form
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Validate phone number
    if (empty($phone)) {
        echo "Phone number is required.";
        exit;
    }

    // Email details
    $to = "devdeepkr734@gmail.com"; // Replace with your email address
    $subject = "New Phone Number Submission";
    $message = "
        <h2>New Phone Number Submission</h2>
        <p><strong>Phone Number:</strong> $phone</p>
    ";
    $headers = "From: no-reply@example.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your phone number has been received.";
    } else {
        echo "There was a problem sending your request. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
