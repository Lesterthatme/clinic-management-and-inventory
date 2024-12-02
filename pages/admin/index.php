<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic - Patients Overview</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet" />

    <style>
        body {
            background-color: #f6fff8;
        }

        .table-container {
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
        }

        table {
            background-color: white;
        }

        table thead {
            text-align: center;
            background-color: #97ce89;
            color: white;
        }

        table tbody tr:hover {
            background-color: #c8e6c9;
        }

        table tbody td {
            text-align: center;
        }

        .table-bordered {
            border: 2px solid #4caf50;
        }

        .container h2 {
            color: #2e7d32;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>

    <!-- Main Content -->
    <div class="container table-container">
        <h2 class="text-center mb-4">Patients Overview</h2>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" />
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
        </div>
        <table id="table table-hover" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Initial</th>
                    <th>Institute</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Merino</td>
                    <td>Lester Arjay</td>
                    <td>B</td>
                    <td>IEAT</td>
                    <td>
                        <button class="btn btn-success">View Records</button>
                        <button class="btn btn-primary">Edit Data</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <!-- Additional rows -->
                <tr>
                    <td>2</td>
                    <td>Tolentino</td>
                    <td>Vincent Dave</td>
                    <td>B</td>
                    <td>IEAT</td>
                    <td>
                        <button class="btn btn-success">View Records</button>
                        <button class="btn btn-primary">Edit Data</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>