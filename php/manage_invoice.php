<?php

  if(isset($_GET["action"]) && $_GET["action"] == "delete") {
    require "db_connection.php";
    $invoice_number = $_GET["invoice_number"];
    $query = "DELETE FROM invoices WHERE INVOICE_ID = $invoice_number";
    $result = mysqli_query($conn, $query);
    if(!empty($result))
  		showInvoices();
  }

  if(isset($_GET["action"]) && $_GET["action"] == "refresh")
    showInvoices();

  if(isset($_GET["action"]) && $_GET["action"] == "search")
    searchInvoice(strtoupper($_GET["text"]), $_GET["tag"]);

  if(isset($_GET["action"]) && $_GET["action"] == "print_invoice")
    printInvoice($_GET["invoice_number"]);

  function showInvoices() {
    require "db_connection.php";
    if($conn) {
      $seq_no = 0;
      $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        showInvoiceRow($seq_no, $row);
      }
    }
  }

  function showInvoiceRow($seq_no, $row) {
    ?>
    <tr>
      <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['INVOICE_ID']; ?></td>
      <td><?php echo $row['NAME']; ?></td>
      <td><?php echo $row['INVOICE_DATE']; ?></td>
      <td><?php echo $row['TOTAL_AMOUNT']; ?></td>
      <td><?php echo $row['TOTAL_DISCOUNT']; ?></td>
      <td><?php echo $row['NET_TOTAL']; ?></td>
      <td>
        <button class="btn btn-warning btn-sm" onclick="printInvoice(<?php echo $row['INVOICE_ID']; ?>);">
          <i class="fa fa-fax"></i>
        </button>
        <button class="btn btn-danger btn-sm" onclick="deleteInvoice(<?php echo $row['INVOICE_ID']; ?>);">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    <?php
  }

  function searchInvoice($text, $column) {
    require "db_connection.php";
    if($conn) {
      $seq_no = 0;
      if($column == 'INVOICE_ID')
        $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID WHERE CAST(invoices.$column AS VARCHAR(9)) LIKE '%$text%'";
      else if($column == "INVOICE_DATE")
        $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID WHERE invoices.$column = '$text'";
      else
        $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID WHERE UPPER(customers.$column) LIKE '%$text%'";

      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        showInvoiceRow($seq_no, $row);
      }
    }
  }

  function printInvoice($invoice_number) {
    require "db_connection.php";


    if ($conn) {
      // Use prepared statements to prevent SQL injection
      $invoice_number = intval($invoice_number);  // Ensure $invoice_number is an integer
  
      // Fetch customer details
      $stmt = $conn->prepare("SELECT customers.NAME, customers.ADDRESS, customers.CONTACT_NUMBER, customers.DOCTOR_NAME, customers.DOCTOR_ADDRESS 
                             FROM customers 
                             INNER JOIN sales ON customers.ID = sales.CUSTOMER_ID 
                             WHERE sales.INVOICE_ID = ?");
      $stmt->bind_param("i", $invoice_number);
      $stmt->execute();
      $result = $stmt->get_result();
      $customer_details = $result->fetch_assoc();
  
      if ($customer_details) {
          $customer_name = $customer_details['NAME'] ?? 'N/A';
          $address = $customer_details['ADDRESS'] ?? 'N/A';
          $contact_number = $customer_details['CONTACT_NUMBER'] ?? 'N/A';
          $doctor_name = $customer_details['DOCTOR_NAME'] ?? 'N/A';
          $doctor_address = $customer_details['DOCTOR_ADDRESS'] ?? 'N/A';
      } else {
          $customer_name = $address = $contact_number = $doctor_name = $doctor_address = 'N/A';
      }
  
      $stmt->close();
  
      // Fetch invoice details
      $stmt = $conn->prepare("SELECT INVOICE_DATE, TOTAL_AMOUNT, TOTAL_DISCOUNT, NET_TOTAL 
                             FROM invoices 
                             WHERE INVOICE_ID = ?");
      $stmt->bind_param("i", $invoice_number);
      $stmt->execute();
      $result = $stmt->get_result();
      $invoice_details = $result->fetch_assoc();
  
      if ($invoice_details) {
          $invoice_date = $invoice_details['INVOICE_DATE'] ?? 'N/A';
          $total_amount = $invoice_details['TOTAL_AMOUNT'] ?? 'N/A';
          $total_discount = $invoice_details['TOTAL_DISCOUNT'] ?? 'N/A';
          $net_total = $invoice_details['NET_TOTAL'] ?? 'N/A';
      } else {
          $invoice_date = $total_amount = $total_discount = $net_total = 'N/A';
      }
  
      $stmt->close();
  } else {
      // Handle the case where the database connection is not available
      echo "Database connection failed.";
  }
  


   

    ?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 h3" style="color: #ff5252;">Customer Invoice<span class="float-right">Invoice Number : <?php echo $invoice_number; ?></span></div>
    </div>
    <div class="row font-weight-bold">
      <div class="col-md-1"></div>
      <div class="col-md-10"><span class="h4 float-right">Invoice Date. : <?php echo $invoice_date; ?></span></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #ff5252;">
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-4">
        <span class="h4">Customer Details : </span><br><br>
        <span class="font-weight-bold">Name : </span><?php echo $customer_name; ?><br>
        <span class="font-weight-bold">Address : </span><?php echo $address; ?><br>
        <span class="font-weight-bold">Contact Number : </span><?php echo $contact_number; ?><br>
        <span class="font-weight-bold">Doctor's Name : </span><?php echo $doctor_name; ?><br>
        <span class="font-weight-bold">Doctor's Address : </span><?php echo $doctor_address; ?><br>
      </div>
      <div class="col-md-3"></div>

      <?php

      $query = "SELECT * FROM users";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      $p_name = $row['PHARMACY_NAME']?? 'N/A';
      $p_address = $row['ADDRESS']?? 'N/A';
      $p_email = $row['EMAIL']?? 'N/A';
      $p_contact_number = $row['CONTACT_NUMBER']?? 'N/A';
      ?>

      <div class="col-md-4">
        <span class="h4">Shop Details : </span><br><br>
        <span class="font-weight-bold">Pharmacy Name :Koswatta Pharmacy(pvt) Ltd<?php echo $p_name; ?></span><br>
        <span class="font-weight-bold">Address       :Koswatta Pharmacy,Bandarakoswatta<?php echo $p_address; ?></span><br>
        <span class="font-weight-bold">Email         :Koswattaph@gmail.com<?php echo $p_email; ?></span><br>
        <span class="font-weight-bold">Mob. No.      :071558629<?php echo $p_contact_number; ?></span>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #ff5252;">
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 table-responsive">
        <table class="table table-bordered table-striped table-hover" id="purchase_report_div">
          <thead>
            <tr>
              <th>SL</th>
              <th>Medicine Name</th>
              <th>Expiry Date</th>
              <th>Quantity</th>
              <th>MRP</th>
              <th>Discount</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $seq_no = 0;
              $total = 0;
              $query = "SELECT * FROM sales WHERE INVOICE_ID = $invoice_number";
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($result)) {
                $seq_no++;
                ?>
                <tr>
                  <td><?php echo $seq_no; ?></td>
                  <td><?php echo $row['MEDICINE_NAME']; ?></td>
                  
                  <td><?php echo $row['QUANTITY']; ?></td>
                  <td><?php echo $row['MRP']; ?></td>
                  <td><?php echo $row['DISCOUNT']."%"; ?></td>
                  <td><?php echo $row['TOTAL']; ?></td>
                </tr>
                <?php
              }
            ?>
          </tbody>
          <tfoot class="font-weight-bold">
            <tr style="text-align: right; font-size: 18px;">
              <td colspan="6">&nbsp;Total Amount</td>
              <td><?php echo $total_amount; ?></td>
            </tr>
            <tr style="text-align: right; font-size: 18px;">
              <td colspan="6">&nbsp;Total Discount</td>
              <td><?php echo $total_discount; ?></td>
            </tr>
            <tr style="text-align: right; font-size: 22px;">
              <td colspan="6" style="color: green;">&nbsp;Net Amount</td>
              <td class="text-primary"><?php echo $net_total; ?></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #ff5252;">
    </div>
    <?php
  }

?>
