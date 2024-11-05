<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'cashier') {
    header("Location: login.php");
    exit();
}

// Display cashier dashboard content
echo "<h1>Cashier Dashboard</h1>";
// Include invoice and customer sections
include('invoice.php');
include('customer.php');
?>
