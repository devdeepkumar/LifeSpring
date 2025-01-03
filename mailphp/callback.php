<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form data
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Validate required fields
    if (empty($name) || empty($phone)) {
        echo "Both Name and Phone Number are required.";
        exit;
    }

    // Email details
    $to = "devdeepkr734@gmail.com"; // Replace with your email
    $subject = "New Call Back Request";
    $message = "
        <h2>New Call Back Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone Number:</strong> $phone</p>
    ";
    $headers = "From: no-reply@example.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your request has been received.";
    } else {
        echo "There was a problem sending your request. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
