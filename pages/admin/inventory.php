<?php require '../../config/dbcon.php';
if (!isset($_SESSION['userEmail'])) {
    header('Location: /index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic Inventory</title>
    <link rel="stylesheet" href="../../assets/style/inventoryStyle.css">
</head>

<body>

    <?php include 'navbar.php' ?>

    <main>
        <div>
            <div class="inventory-header">
                <h2>Inventory</h2>
                <div class="search-filter">
                    <input type="text" placeholder="Search">
                    <div class="dropdown">
                        <button class="filter-btn" onclick="toggleDropdown()">Filter</button>
                        <div class="dropdown-content" id="filter-dropdown">
                            <a href="#" onclick="sortTable(3)">Number of Stock</a>
                            <a href="#" onclick="sortRecentlyAdded()">Recently Added</a>
                            <a href="#" onclick="sortStatus('Out of Stock')">Out of Stock</a>
                            <a href="#" onclick="sortStatus('In Stock')">In Stock</a>
                            <a href="#" onclick="sortStatus('Expired')">Expired</a>
                        </div>
                    </div>
                    <button id="fullscreen-btn">Full Screen</button>
                </div>
            </div>

            <table id="inventory-table" style="height: 10rem; overflow: hidden;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Date of Purchased</th>
                        <th>Stock</th>
                        <th>Expiration</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $inventoryQuery = "SELECT * FROM inventory";
                    $inventoryResult = mysqli_query($conn, $inventoryQuery);

                    while ($row = mysqli_fetch_assoc($inventoryResult)) {
                        $status = '';
                        if ($row['stock'] <= 0) {
                            $status = "<td class='out-of-stock'>Out of Stock</td>";
                        } elseif (strtotime($row['expDate']) < time()) {
                            $status = "<td class='expired'>Expired</td>";
                        } else {
                            $status = "<td class='in-stock'>In Stock</td>";
                        }

                        $html = "<tr>";
                        $html .= "<td>{$row['supplyID']}</td>";
                        $html .= "<td>{$row['supplyName']}</td>";
                        $html .= "<td>{$row['startDate']}</td>";
                        $html .= "<td>{$row['stock']}</td>";
                        $html .= "<td>{$row['expDate']}</td>";
                        $html .= $status;
                        $html .= "</tr>";

                        echo $html;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="aside">
            <h3>Generate Report</h3>
            <form method="POST" action="/functions/inventoryFunctions.php">
                <label for="supplyName">Medicine Name:</label>
                <input name="supplyName" type="text" id="supplyName">
                <label for="stock">Stock/s:</label>
                <input name="stock" type="number" id="stock">
                <label for="startDate">Start Date:</label>
                <input name="startDate" type="date" id="startDate">
                <label for="expDate">Expiration Date:</label>
                <input name="expDate" type="date" id="expDate">
                <button type="submit" name="add_supply">Generate</button>
            </form>
        </div>
    </main>

    <script>
    function toggleDropdown() {
        const dropdown = document.getElementById("filter-dropdown");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    document.getElementById("fullscreen-btn").addEventListener("click", function() {
        const table = document.getElementById("inventory-table");
        if (!document.fullscreenElement) {
            table.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });

    function sortTable(columnIndex) {
        const table = document.getElementById("inventory-table");
        const rows = Array.from(table.rows).slice(1);
        rows.sort((a, b) => {
            return parseInt(a.cells[columnIndex].innerText) - parseInt(b.cells[columnIndex].innerText);
        });
        rows.forEach(row => table.appendChild(row));
    }

    function sortStatus(status) {
        const table = document.getElementById("inventory-table");
        const rows = Array.from(table.rows).slice(1);
        rows.sort((a, b) => {
            return a.cells[5].innerText === status ? -1 : 1;
        });
        rows.forEach(row => table.appendChild(row));
    }

    function sortRecentlyAdded() {
        console.log("Recently added sorting not implemented yet.");
    }
    </script>

</body>

</html>