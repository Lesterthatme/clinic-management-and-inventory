<?php require '../../config/dbcon.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>

    <?php include 'navbar.php' ?>;

    <!-- Admin Table -->
    <div class="container mt-5">
        <h1 class="text-center">Admin Management</h1>
        <div class="text-end mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add Admin</button>
        </div>
        <!-- Admin Table -->
        <table id="adminTable" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Middle Initial</th>
                    <th>Position</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch admin data from the database
                $sql = "SELECT * FROM admins";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["surname"] . "</td>";
                        echo "<td>" . $row["MI"] . "</td>";
                        echo "<td>" . $row["position"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>********</td>";
                        echo "<td>
                            <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editAdminModal' data-id='" . $row['adminID'] . "'>Edit</button>
                            <form action='functions/delete_admin.php' method='POST' style='display:inline-block;'>
                                <input type='hidden' name='adminID' value='" . $row["adminID"] . "'>
                                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                            </form>
                          </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No admins found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="functions/add_admin.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="addName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="addName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="addSurname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="addSurname" name="surname" required>
                        </div>
                        <div class="mb-3">
                            <label for="addMiddleInitial" class="form-label">Middle Initial</label>
                            <input type="text" class="form-control" id="addMiddleInitial" name="MI">
                        </div>
                        <div class="mb-3">
                            <label for="addPosition" class="form-label">Position</label>
                            <select class="form-select" id="addPosition" name="position" required>
                                <option value="Doctor">Doctor</option>
                                <option value="Nurse">Nurse</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="addUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="addUsername" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="addPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="addPassword" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTable JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#adminTable').DataTable();
        });
    </script>
</body>

</html>