<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Logout</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .logout-container {
            margin-top: 100px;
            padding: 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .btn-lg {
            width: 100%;
            margin: 10px 0;
        }
        .btn-logout {
            background-color: #28a745; /* Green color */
            color: white;
        }
        .btn-logout:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 logout-container text-center">
                <h2 class="mb-4">Are you sure you want to log out?</h2>
                <button class="btn btn-logout btn-lg" onclick="logout()">Logout</button>
                
            </div>
        </div>
    </div>

    <script>
        function logout() {
            // Perform logout actions (e.g., clearing session, redirecting to index.php page)
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>
