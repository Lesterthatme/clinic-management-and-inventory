<?php require '../../config/dbcon.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">

        <div class="row">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover pt-2">
                    <thead class="table-success">
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
                    <tbody id="inventoryTable">

                        <?php
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $sql = "SELECT * FROM inventory";

                        if (!empty($search)) {
                            $sql .= " WHERE supplyName LIKE '%$search%'";
                        }

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter++ . "</td>";
                                echo "<td>" . $row['supplyName'] . "</td>";
                                echo "<td>" . $row['startDate'] . "</td>";
                                echo "<td>" . $row['stock'] . "</td>";
                                echo "<td>" . $row['expDate'] . "</td>";
                                echo "<td>" . $row['dispense'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4">
                <h3>Generate Report</h3>
                <form id="generateReportForm" action="backend.php" method="POST">
                    <div class="mb-3">
                        <label for="supplyName" class="form-label">Medicine Name</label>
                        <input type="text" class="form-control" id="supplyName" name="supplyName">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Number of Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Purchased Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                    <div class="mb-3">
                        <label for="expDate" class="form-label">Expiration Date</label>
                        <input type="date" class="form-control" id="expDate" name="expDate">
                    </div>
                    <button type="submit" class="btn btn-primary">Generate</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                searching: true,
                paging: true,
                info: true
            });
        });
    </script>

</body>

</html>