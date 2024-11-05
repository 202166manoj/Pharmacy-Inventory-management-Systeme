<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/my_profile.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
    <style>
        .back-btn {
            background-color: white;
            color: #28a745;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .back-btn:hover {
            background-color:   #6c757d;
        }

        .form-control[disabled], .form-control[readonly] {
            background-color: #fff;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .header-section {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .header-section h3 {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="container">

        <!-- Back to Dashboard Button -->
        <button class="back-btn" onclick="window.location.href='home.php';"><i class="fa fa-arrow-left"></i> Back to Dashboard</button>

        <!-- header section -->
        <?php
        require "php/header.php";
        createHeader('user', 'Profile', 'Manage Admin Details');
        // header section end
        require "php/db_connection.php";
        if ($conn) {
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);

            $pharmacy_name = $row['PHARMACY_NAME'];
            $address = $row['ADDRESS'];
            $email = $row['EMAIL'];
            $contact_number = $row['CONTACT_NUMBER'];
        }
        ?>

        <div class="card">
            <div class="header-section">
                <h3>Admin Profile</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold" for="pharmacy_name">Pharmacy Name :</label>
                        <input id="pharmacy_name" type="text" class="form-control" value="<?php echo $pharmacy_name; ?>" placeholder="pharmacy name" onkeyup="validateName(this.value, 'pharmacy_name_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="pharmacy_name_error" style="display: none;"></code>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="address">Address :</label>
                        <textarea id="address" class="form-control" placeholder="address" onkeyup="validateAddress(this.value, 'address_error');" style="max-height: 100px;" disabled><?php echo $address; ?></textarea>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="address_error" style="display: none;"></code>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="email">Email :</label>
                        <input id="email" type="email" class="form-control" value="<?php echo $email; ?>" placeholder="email" onkeyup="notNull(this.value, 'email_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="email_error" style="display: none;"></code>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="contact_number">Contact Number :</label>
                        <input id="contact_number" type="number" class="form-control" value="<?php echo $contact_number; ?>" placeholder="contact number" onkeyup="validateContactNumber(this.value, 'contact_number_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="contact_number_error" style="display: none;"></code>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="username">Username :</label>
                        <input id="username" type="text" class="form-control" value="<?php echo $username; ?>" placeholder="username" onkeyup="notNull(this.value, 'username_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="username_error" style="display: none;"></code>
                    </div>

                    <!-- horizontal line -->
                    <hr style="border-top: 2px solid #02b6ff;">

                    <!-- form submit button -->
                    <div class="d-flex justify-content-between" id="edit">
                        <button class="btn btn-primary font-weight-bold" onclick="edit();">EDIT</button>
                        <a href="change_password.php" class="btn btn-warning font-weight-bold">Change Password</a>
                    </div>

                    <div class="d-flex justify-content-between" id="update_cancel" style="display: none;">
                        <button class="btn btn-danger font-weight-bold" onclick="edit(true);">CANCEL</button>
                        <button class="btn btn-success font-weight-bold" onclick="updateAdminDetails();">UPDATE</button>
                    </div>

                    <!-- result message -->
                    <div id="admin_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"></div>
                </div>
            </div>
        </div>
        <hr style="border-top: 2px solid #ff5252;">
    </div>
</div>
</body>
</html>

