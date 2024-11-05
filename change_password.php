<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];

function getDashboardLink($role) {
    switch ($role) {
        case 'admin':
            return 'admin_dashboard.php';
        case 'pharmacist':
            return 'pharmacist_dashboard.php';
        case 'customer':
            return 'customer_dashboard.php';
        default:
            return 'login.php';
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/validateForm.js"></script>
    <script src="js/my_profile.js"></script>
    <script src="js/restrict.js"></script>
    <style>
        body {
            background-image: url();
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #ffffff; /* White background for the card */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container-fluid centered-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php require "php/header.php"; ?>
                        <h3 class="text-center">Change Password</h3>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" placeholder="Enter your username">
                                <code class="text-danger small" id="username_error" style="display: none;"></code>
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" id="old_password" class="form-control" placeholder="Enter old password" onblur="checkAdminPassword(this.value, 'old_password_error');">
                                <code class="text-danger small" id="old_password_error" style="display: none;"></code>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Enter new password">
                                <code class="text-danger small" id="password_error" style="display: none;"></code>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm new password">
                                <code class="text-danger small" id="confirm_password_error" style="display: none;"></code>
                            </div>
                            <button type="button" class="btn btn-warning btn-block" onclick="changePassword();">Reset Password</button>
                            <a href="index.php" class="btn btn-secondary btn-block mt-3">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function changePassword() {
        // Validate the form data and send an AJAX request to update the password
        // Make sure to handle cases where the username or password fields are empty
    }
</script>
</body>
</html>

