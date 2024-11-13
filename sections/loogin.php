<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management - Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            width: 100px;
            display: block;
            margin: 0 auto 20px;
        }
        h1.logo-caption {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .form-group select {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="logo">
                    <img src="images/prof.jpg" class="profile"/>
                    <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
                </div>
                <form action="authenticate.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Position</label>
                        <select name="role" class="form-control" id="role" required>
                            <option value="">Select Position</option>
                            <option value="owner">Owner</option>
                            <option value="pharmacist">Pharmacist</option>
                            <option value="manager">Manager</option>
                            <option value="cashier">Cashier</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="text-center mt-3">
                    <a href="forgot_password.php" class="text-dark">Forgot password?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
