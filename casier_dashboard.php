<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Cashier Dashboard - Home</title>
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
      text-align: center; /* Center align the content */
      margin-bottom: 20px; /* Add some margin at the bottom for spacing */
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

    .profile {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 80%;
      border-radius: 50%;
    }

    .logo {
      text-align: center;
      padding-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="sidenav">
    
    <div class="card">
      <div class="card-body">
        <div class="logo">
          <img src="images/prof.jpg" class="profile"/>
        </div> <!-- logo class -->

        <!-- medicine start -->
        <div id="third" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-shopping-bag"></i><span>Medicine</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="manage_medicine.php">Manage Medicine</a></li>
                <li class="treeview"><a href="manage_medicine_stock.php">Manage Medicine Stock</a></li>
            </ul>
        </div>
        <!-- medicine end -->

        <!-- manufacturer start -->
        <div id="fourth" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-group"></i><span>Supplier</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="add_supplier.php">Add Supplier</a></li>
                <li class="treeview"><a href="manage_supplier.php">Manage Supplier</a></li>
            </ul>
        </div>
        <!-- manufacturer end -->

        <!-- purchase start -->
        <div id="fifth" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-bar-chart"></i><span>Purchase</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="add_purchase.php">Add Purchase</a></li>
                <li class="treeview"><a href="manage_purchase.php">Manage Purchase</a></li>
            </ul>
        </div>
        <!-- purchase end -->

        <!-- search start -->
        <div id="seventh" class="main-menu-item" onclick="showhide(this.id);">
            <a href="#">
                <i class="fa fa-search"></i><span>Search</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li class="treeview"><a href="manage_medicine.php">Medicine</a></li>
                <li class="treeview"><a href="manage_supplier.php">Supplier</a></li>
                <li class="treeview"><a href="manage_purchase.php">Purchase</a></li>
                 
            </ul>
        </div>
        <!-- search end -->

      </div> <!-- card-body class -->
    </div> <!-- card  -->
  </div>
  <div class="sidenav">
    <?php include "sections/csidenav.html"; ?>
  </div>

  <div class="main">
    <div class="container-fluid">
      <div class="container">
        <!-- Header Section -->
        <?php
          require "php/header.php";
          createHeader('home', 'Cashier Dashboard', 'Home');
        ?>
        <!-- Header Section End -->

        <!-- Main Content -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <!-- Sections for Medicines and Suppliers -->
            <div class="row">
              <?php
                function createSection($location, $title, $table, $condition = '') {
                  require 'php/db_connection.php';

                  $query = "SELECT * FROM $table $condition";
                  $result = mysqli_query($conn, $query);
                  $count = mysqli_num_rows($result);

                  echo '
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 10px;">
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 10px;">
                  <div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href=\'' . $location . '\'">
                    <div class="text-center">
                      <span class="h1"><i class="fa fa-' . $icon . ' p-2"></i></span>
                      <div class="h5">' . $title . '</div>
                    </div>
                  </div>
                </div>
              ';
            }
            createLinkSection('address-card', 'cnew_invoice.php', 'Create New Invoice');
            createLinkSection('handshake', 'cadd_customer.php', 'Add New Customer');
          ?>
        </div>
        <!-- Main Content End -->

        <hr style="border-top: 2px solid #28a745;">
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var pid = "none";
    function showhide(id) {
      var elements = document.getElementById(id).childNodes;
      var menu = elements[3];
      var arrow = ((elements[1].childNodes)[4].childNodes)[1];
      if(menu.style.display == 'block') {
        menu.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
        elements[1].style.color = "#eeeeee";
      }
      else {
        menu.style.display = "block";
        arrow.style.transform = "rotate(270deg)";
        elements[1].style.color = "#28a745";
      }
      if(pid == id)
        pid = "none";
      if(pid != "none") {
        elements = document.getElementById(pid).childNodes;
        menu = (document.getElementById(pid).childNodes)[3];
        arrow = ((elements[1].childNodes)[4].childNodes)[1];
        if(menu.style.display == 'block') {
          menu.style.display = "none";
          arrow.style.transform = "rotate(0deg)";
          elements[1].style.color = "#eeeeee";
        }
      }
      pid = id;
    }

    function showOptions() {
      var flag = document.getElementById('options');
      if(flag.style.display == 'block') {
        flag.style.display = "none";
        document.getElementById('mark').style.display = "none";
      }
      else {
        flag.style.display = "block";
        document.getElementById('mark').style.display = "block";
      }
    }
  </script>
</body>
</html>
