<?php require '../../config/dbcon.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        body {
            font-size: 1.125rem;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        
        .card {
            border: none;
            background-color: #e8f5e9;
            color: #2e7d32;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h5 {
            font-size: 1.25rem;
        }

        .card h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        table {
            background-color: white;
        }

        table thead {
            background-color: #97ce89;
            color: white;
        }

        table tbody tr {
            background-color: #e8f5e9;
        }

        table tbody td {
            text-align: center;
        }

        table tbody tr:hover {
            background-color: #c8e6c9;
        }

        .table-bordered {
            border: 2px solid #4caf50;
        }

        .text-center h3 {
            color: #2e7d32;
            font-weight: bold;
        }

        .overview-content .row div{
            height: 18vh;
        }
        .overview-content .row div div{
            justify-content: center;
            align-items: center;
        }
        .overview-content .row div div > h5{
            font-size: 1.5rem;
            margin-bottom: 0;
        }
        .overview-content .row div div > h2{
            font-size: 4.5rem;
        }
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class=" mt-5 container-fluid overview-content">
        <h3 style="font-size: 4rem;"><STRONG>Overview</STRONG></h3>
        <div class="row my-4 text-center">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Monthly Patient</h5>
                    <h2>154</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Weekly Patient</h5>
                    <h2>54</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Daily Patient</h5>
                    <h2>23</h2>
                </div>
            </div>
        </div>
        <div class="row my-4 text-center">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Monthly Dispense</h5>
                    <h2>154</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Weekly Dispense</h5>
                    <h2>54</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Daily Dispense</h5>
                    <h2>23</h2>
                </div>
            </div>
        </div>

        <h3 class="text-center mt-5" style="font-size: 3rem;">Product Inventory</h3>
        <table id="productExpirationTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">Product Name</th>
                    <th style="text-align: center;">Pieces</th>
                    <th style="text-align: center;">Days Before Expiration</th>
                    <th style="text-align: center;">Expiration Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Neozep</td>
                    <td>23</td>
                    <td>23 day/s</td>
                    <td>2024-12-12</td>
                </tr>
                <tr>
                    <td>Bioflu</td>
                    <td>5</td>
                    <td>23 day/s</td>
                    <td>2024-12-12</td>
                </tr>
                <tr>
                    <td>Mefinamic</td>
                    <td>10</td>
                    <td>23 day/s</td>
                    <td>2024-12-12</td>
                </tr>
                <tr>
                    <td>Paracetamol</td>
                    <td>23</td>
                    <td>23 day/s</td>
                    <td>2024-12-12</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTable JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productExpirationTable').DataTable();
        });
    </script>
</body>

</html>