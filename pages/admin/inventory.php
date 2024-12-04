<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic Inventory</title>
    <link rel="stylesheet" href="../../assets/style/inventoryStyle.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="logo.png" alt="BASC Logo">
        <h1>BASC CLINIC</h1>
    </div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Inventory</a>
        <a href="#">Patients Record</a>
    </nav>
</header>

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

        <table id="inventory-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Date of Purchased</th>
                    <th>Stock</th>
                    <th>Expiration</th>
                    <th>Dispense</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Biogesic</td>
                    <td>12/23/2023</td>
                    <td>103</td>
                    <td>12/23/2024</td>
                    <td>23</td>
                    <td class="expired">Expired</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Neozep</td>
                    <td>12/23/2023</td>
                    <td>52</td>
                    <td>12/23/2025</td>
                    <td>60</td>
                    <td class="in-stock">In Stock</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Alaxan Fr</td>
                    <td>12/23/2023</td>
                    <td>52</td>
                    <td>12/23/2025</td>
                    <td>0</td>
                    <td class="out-of-stock">Out of Stock</td>
                </tr>
            </tbody>
        </table>
    </div>

    <aside>
        <h3>Generate Report</h3>
        <form>
            <label for="medicine-name">Medicine Name:</label>
            <input type="text" id="medicine-name">
            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date">
            <label for="end-date">End Date:</label>
            <input type="date" id="end-date">
            <button type="button">Generate</button>
        </form>
    </aside>
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
        rows.sort((a, b) => a.cells[columnIndex].innerText - b.cells[columnIndex].innerText);
        rows.forEach(row => table.appendChild(row));
    }

    function sortStatus(status) {
        const table = document.getElementById("inventory-table");
        const rows = Array.from(table.rows).slice(1);
        rows.sort((a, b) => a.cells[6].innerText === status ? -1 : 1);
        rows.forEach(row => table.appendChild(row));
    }

    function sortRecentlyAdded() {
        console.log("Recently added sorting not implemented yet.");
    }
</script>

</body>
</html>