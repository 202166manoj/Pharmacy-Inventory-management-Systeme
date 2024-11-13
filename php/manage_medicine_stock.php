<?php
require "db_connection.php";

if ($conn) {
    if (isset($_GET["action"]) && $_GET["action"] == "delete") {
        $id = $_GET["id"];
        $query = "DELETE FROM medicines WHERE ID = $id";
        $result = mysqli_query($conn, $query);
        if (!empty($result))
            showMedicinesStock("0");
    }

    if (isset($_GET["action"]) && $_GET["action"] == "cancel")
        showMedicinesStock("0");

    if (isset($_GET["action"]) && $_GET["action"] == "search")
        searchMedicineStock(strtoupper($_GET["text"]), $_GET["tag"]);
}

function showMedicinesStock($id) {
    require "db_connection.php";
    if ($conn) {
        $seq_no = 0;
        $query = "SELECT * FROM medicines INNER JOIN medicines_stock ON medicines.NAME = medicines_stock.NAME";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $seq_no++;
            showMedicineStockRow($seq_no, $row);
        }
    }
}

function showMedicineStockRow($seq_no, $row) {
    ?>
    <tr>
        <td><?php echo $seq_no; ?></td>
        <td><?php echo $row['NAME']; ?></td>
        <td><?php echo $row['PACKING']; ?></td>
        <td><?php echo $row['GENERIC_NAME']; ?></td>
        <td><?php echo $row['BATCH_ID']; ?></td>
        <td><?php echo $row['EXPIRY_DATE']; ?></td>
        <td><?php echo $row['SUPPLIER_NAME']; ?></td>
        <td><?php echo $row['QUANTITY']; ?></td>
        <td><?php echo $row['MRP']; ?></td>
        <td><?php echo $row['RATE']; ?></td>
        <td>
            <!-- Removed edit button -->
            <!--
            <button class="btn btn-info btn-sm" onclick="editMedicineStock('<?php echo $row['BATCH_ID']; ?>');">
                <i class="fa fa-pencil"></i>
            </button>
            -->
            <!--
            <button class="btn btn-danger btn-sm" onclick="deleteMedicineStock(<?php echo $row['ID']; ?>);">
                <i class="fa fa-trash"></i>
            </button>
            -->
        </td>
    </tr>
    <?php
}

function searchMedicineStock($text, $column) {
    require "db_connection.php";
    if ($conn) {
        $seq_no = 0;

        if ($column == "EXPIRY_DATE")
            $query = "SELECT * FROM medicines INNER JOIN medicines_stock ON medicines.NAME = medicines_stock.NAME";
        else if ($column == 'QUANTITY')
            $query = "SELECT * FROM medicines INNER JOIN medicines_stock ON medicines.NAME = medicines_stock.NAME WHERE medicines_stock.$column = 0";
        else
            $query = "SELECT * FROM medicines INNER JOIN medicines_stock ON medicines.NAME = medicines_stock.NAME WHERE UPPER(medicines.$column) LIKE '%$text%'";

        $result = mysqli_query($conn, $query);

        if ($column == 'EXPIRY_DATE') {
            while ($row = mysqli_fetch_array($result)) {
                $expiry_date = $row['EXPIRY_DATE'];
                if (substr($expiry_date, 3) < date('y'))
                    showMedicineStockRow($seq_no, $row);
                else if (substr($expiry_date, 3) == date('y')) {
                    if (substr($expiry_date, 0, 2) < date('m'))
                        showMedicineStockRow($seq_no, $row);
                }
            }
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $seq_no++;
                showMedicineStockRow($seq_no, $row);
            }
        }
    }
}
?>
