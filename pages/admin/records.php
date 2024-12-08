<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic - Patients Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

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

    <div class="container table-container">
        <h2 class="text-center mb-4">Patients Overview</h2>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" />
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
        </div>
        <table id="recordTable" class="table table-striped table-bordered">
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
                        <button class="btn btn-success view-btn">View Records</button>
                        <button class="btn btn-primary edit-btn">Edit Data</button>
                        <button class="btn btn-danger delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tolentino</td>
                    <td>Vincent Dave</td>
                    <td>B</td>
                    <td>IEAT</td>
                    <td>
                        <button class="btn btn-success view-btn">View Records</button>
                        <button class="btn btn-primary edit-btn">Edit Data</button>
                        <button class="btn btn-danger delete-btn">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Patient Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="editLastName">Last Name</label>
                            <input type="text" class="form-control" id="editLastName" />
                        </div>
                        <div class="form-group">
                            <label for="editFirstName">First Name</label>
                            <input type="text" class="form-control" id="editFirstName" />
                        </div>
                        <div class="form-group">
                            <label for="editMiddleInitial">Middle Initial</label>
                            <input type="text" class="form-control" id="editMiddleInitial" />
                        </div>
                        <div class="form-group">
                            <label for="editInstitute">Institute</label>
                            <input type="text" class="form-control" id="editInstitute" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#recordTable').DataTable();

            // Edit Button Click
            $(document).on('click', '.edit-btn', function() {
                const row = $(this).closest('tr');
                const lastName = row.find('td').eq(1).text();
                const firstName = row.find('td').eq(2).text();
                const middleInitial = row.find('td').eq(3).text();
                const institute = row.find('td').eq(4).text();

                $('#editLastName').val(lastName);
                $('#editFirstName').val(firstName);
                $('#editMiddleInitial').val(middleInitial);
                $('#editInstitute').val(institute);

                $('#editModal').modal('show');
            });

            // View Records Button Click
            $(document).on('click', '.view-btn', function() {
                const row = $(this).closest('tr');
                const lastName = row.find('td').eq(1).text();
                const firstName = row.find('td').eq(2).text();

                window.location.href = `view-records.php?lastName=${encodeURIComponent(lastName)}&firstName=${encodeURIComponent(firstName)}`;
            });

            // Delete Button Click
            $(document).on('click', '.delete-btn', function() {
                const row = $(this).closest('tr');
                const lastName = row.find('td').eq(1).text();
                const firstName = row.find('td').eq(2).text();

                if (confirm(`Are you sure you want to delete the record of ${firstName} ${lastName}?`)) {
                    $('#recordTable').DataTable().row(row).remove().draw();
                }
            });
        });
    </script>
</body>

</html>