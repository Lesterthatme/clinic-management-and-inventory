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
            /* Slightly larger font for better readability */
        }

        .container-custom {
            max-width: 1400px;
            /* Wider container */
            padding: 0 15px;
        }

        .card h5,
        .card h2 {
            font-size: 1.25rem;
            /* Scaled font size for better zoom compatibility */
        }

        @media (max-width: 768px) {

            .card h5,
            .card h2 {
                font-size: 1rem;
                /* Adjust for smaller screens */
            }
        }
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>
    <div class="container-custom mt-5">
        <div class="row my-4 text-center">
            <div class="col-md-3">
                <div class="card bg-light p-3">
                    <h5>Total Patients</h5>
                    <h2>154</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light p-3">
                    <h5>Students</h5>
                    <h2>54</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light p-3">
                    <h5>Staff and Faculty</h5>
                    <h2>23</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light p-3">
                    <h5>Dispense</h5>
                    <h2>27</h2>
                </div>
            </div>
        </div>

        <h3 class="text-center mt-4">Product Expiration</h3>
        <table id="productExpirationTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Pieces</th>
                    <th>Days Before Expiration</th>
                    <th>Expiration Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Neozep</td>
                    <td>23</td>
                    <td>23</td>
                    <td>23</td>
                </tr>
                <tr>
                    <td>Bioflu</td>
                    <td>5</td>
                    <td>23</td>
                    <td>23</td>
                </tr>
                <tr>
                    <td>Mefinamic</td>
                    <td>10</td>
                    <td>23</td>
                    <td>23</td>
                </tr>
                <tr>
                    <td>Paracetamol</td>
                    <td>23</td>
                    <td>23</td>
                    <td>23</td>
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
            $('#dispenseTable').DataTable();
        });
    </script>
</body>

</html>