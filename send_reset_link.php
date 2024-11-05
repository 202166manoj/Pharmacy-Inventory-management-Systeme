<?php
// send_reset_link.php
require "php/db_connection.php";

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Generate a unique password reset token
        $token = bin2hex(random_bytes(50));

        // Store the token in the database with an expiration time
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));
        $query = "UPDATE users SET reset_token='$token', reset_expiry='$expiry' WHERE email='$email'";
        mysqli_query($conn, $query);

        // Send an email to the user with the reset link
        $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Hi,\n\nClick the link below to reset your password:\n$resetLink\n\nIf you did not request a password reset, please ignore this email.";
        $headers = "From: no-reply@yourwebsite.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "A password reset link has been sent to your email address.";
        } else {
            echo "Failed to send reset link. Please try again.";
        }
    } else {
        echo "No account found with that email address.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
