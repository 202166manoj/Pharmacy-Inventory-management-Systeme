<?php 
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin') { ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .bg {
            /* The image used */
            background-image: url("images/cap.jpg");

            /* Control the height of the image */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
        }
    </style>
</head>
<body>
    <div class="bg d-flex justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <img src="images/Owner.jpg" class="card-img-top" alt="admin image">
            <div class="card-body text-center">
                <h5 class="card-title"><?=$_SESSION['name']?></h5>
                <a href="f.php" class="btn btn-dark w-100">Login</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php } else {
    header("Location: index.php");
} ?>
