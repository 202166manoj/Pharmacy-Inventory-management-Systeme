<?php
  require "db_connection.php";

  if($conn) {
    if(isset($_GET['action']) && $_GET['action'] == "supplier")
      showSuggestions($conn, "suppliers", "supplier");

    if(isset($_GET['action']) && $_GET['action'] == "customer")
      showSuggestions($conn, "customers", "customer");

    if(isset($_GET['action']) && $_GET['action'] == "medicine")
      showSuggestions($conn, "medicines", "medicine");

    if(isset($_GET['action']) && $_GET['action'] == "customers_address")
      getValue($conn, $_GET['action'], "ADDRESS");

    if(isset($_GET['action']) && $_GET['action'] == "customers_contact_number")
      getValue($conn, $_GET['action'], "CONTACT_NUMBER");
  }

  function showSuggestions($conn, $table, $action) {
    $text = strtoupper($_GET["text"]);
    $query = "SELECT * FROM $table WHERE UPPER(NAME) LIKE '%$text%'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0)
      echo '<div class="list-group-item list-group-item-action font-italic" style="padding: 5px;" disabled>No suggestions...</div>';
    while($row = mysqli_fetch_array($result))
      echo '<input type="button" class="list-group-item list-group-item-action" value="'.$row['NAME'].'" style="padding: 5px; outline: none;" onclick="suggestionClick(this.value, \''.$action.'\');">';
    //echo '<input type="button" class="list-group-item list-group-item-action bg-danger text-center text-light" style="padding: 5px;" value="Close" onclick="clearSuggestions(\''.$action.'\');">';
  }

  function getValue($conn, $action, $column) {
    $name = $_GET['name'];
    $query = "SELECT * FROM customers WHERE NAME = '$name'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
      echo $row[$column];
  }
?>
