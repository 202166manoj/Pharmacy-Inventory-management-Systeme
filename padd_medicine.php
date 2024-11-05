<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Medicine</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/suggestions.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
    <style>
      body, html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
      }
      .container {
        max-width: 600px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-color: white;
        border-radius: 10px;
      }
      .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
      }
      .header-section h2 {
        margin: 0;
      }
      .back-btn {
        background-color: white;
        color: #28a745;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
      }
      .back-btn:hover {
        background-color: #e2e6ea;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- header section -->
      <div class="header-section">
        <h2><i class="fa fa-shopping-bag"></i> Add Medicine</h2>
        <button class="back-btn" onclick="window.location.href='pharmacist_dashboard.php';"><i class="fa fa-arrow-left"></i> Back to Dashboard</button>
      </div>
      <!-- header section end -->

      <!-- form content -->
      <div class="row mt-4">
        <div class="col-md-12">
          <?php
            // form content
            require "sections/add_new_medicine.html";
          ?>
        </div>
      </div>
      <hr style="border-top: 2px solid #28a745;">
      <!-- form content end -->
    </div>
  </body>
</html>

