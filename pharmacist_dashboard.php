<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Pharmacist Dashboard - Home</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/sidenav.css">
  <link rel="stylesheet" href="css/home.css">
  <script src="js/restrict.js"></script>
  <style>
    .sidenav {
      height: 100%;
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    .sidenav a {
      padding: 8px 8px 8px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .main {
      margin-left: 260px; /* Same as the width of the sidenav */
      padding: 0px 10px;
    }

    .dashboard-stats {
      background: #f8f9fa;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .dashboard-stats:hover {
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    }

    .dashboard-stats a {
      text-decoration: none;
      color: inherit;
    }

    .dashboard-stats .h4 {
      margin: 0;
    }

    .dashboard-stats .small {
      color:  #28a745;
    }
  </style>
</head>
<body>
  <div class="sidenav">
    <?php include "sections/phsidenav.html"; ?>
  </div>

  <div class="main">
    <div class="container-fluid">
      <div class="container">
        <!-- Header Section -->
        <?php
          require "php/header.php";
          createHeader('home', 'Pharmacist Dashboard', 'Home');
        ?>
        <!-- Header Section End -->

        <!-- Main Content -->
        <div class="row">
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <!-- Sections for Medicines and Suppliers -->
            <div class="row">
              <?php
                function createSection($location, $title, $table, $condition = '') {
                  require 'php/db_connection.php';

                  $query = "SELECT * FROM $table $condition";
                  $result = mysqli_query($conn, $query);
                  $count = mysqli_num_rows($result);

                  echo '
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                      <div class="dashboard-stats" onclick="location.href=\'' . $location . '\'">
                        <a class="text-dark text-decoration-none" href="' . $location . '">
                          <span class="h4">' . $count . '</span>
                          <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                          <div class="small font-weight-bold">' . $title . '</div>
                        </a>
                      </div>
                    </div>
                  ';
                }

                createSection('manage_medicine.php', 'Total Medicine', 'medicines');
                createSection('manage_medicine_stock.php?out_of_stock', 'Out of Stock', 'medicines_stock', 'WHERE QUANTITY = 0');
                createSection('manage_medicine_stock.php?expired', 'Expired', 'medicines_stock', 'WHERE EXPIRY_DATE < NOW()');
                createSection('manage_supplier.php', 'Total Supplier', 'suppliers');
              ?>
            </div>
          </div>
        </div>

        <hr style="border-top: 2px solid  #28a745">

        <div class="row">
          <?php
            function createLinkSection($icon, $location, $title) {
              echo '
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
                  <div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href=\'' . $location . '\'">
                    <div class="text-center">
                      <span class="h1"><i class="fa fa-' . $icon . ' p-2"></i></span>
                      <div class="h5">' . $title . '</div>
                    </div>
                  </div>
                </div>
              ';
            }

            createLinkSection('shopping-bag', ' padd_medicine.php', 'Add New Medicine');
            createLinkSection('group', 'padd_supplier.php', 'Add New Supplier');
            createLinkSection('bar-chart', 'padd_purchase.php', 'Add New Purchase');
          ?>
        </div>
        <!-- Main Content End -->

        <hr style="border-top: 2px solid  #28a745">
      </div>
    </div>
  </div>
</body>
</html>

