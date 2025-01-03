<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $datetime = htmlspecialchars(trim($_POST['datetime']));
    $service = htmlspecialchars(trim($_POST['service']));

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($datetime) || empty($service)) {
        echo "All fields are required.";
        exit;
    }

    // Email details
    $to = "devdeepkr734@gmail.com"; // Replace with your email
    $subject = "New Appointment Request";
    $message = "
        <h2>New Appointment Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Date & Time:</strong> $datetime</p>
        <p><strong>Service:</strong> $service</p>
    ";
    $headers = "From: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Your appointment request has been sent successfully!";
    } else {
        echo "There was a problem sending your appointment request. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
