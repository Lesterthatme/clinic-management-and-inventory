<?php require '../../config/dbcon.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
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

        .container h1 {
            color: #2e7d32;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>;
    <div class="container mt-5">
        <h1 class="text-center">Admin Management</h1>
        <div class="text-end mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add Admin</button>
        </div>

        <table id="adminTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Middle Initial</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users WHERE userType IN (4,5) ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["userLName"] . "</td>";
                        echo "<td>" . $row["userFName"] . "</td>";
                        echo "<td>" . $row["userMName"] . "</td>";
                        echo "<td>" . $row["userEmail"] . "</td>";
                        echo "<td>" . $row["userWorkPosition"] . "</td>";
                        echo "<td>********</td>";
                        echo "<td>
                            <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editAdminModal' data-id='" . $row['userID'] . "'>Edit</button>
                            <form action='functions/delete_admin.php' method='POST' style='display:inline-block;'>
                                <input type='hidden' name='adminID' value='" . $row["userID"] . "'>
                                <button type='submit' class='btn btn-danger btn-sm' disabled>Delete</button>
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

    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="../../functions/userFuctions.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="userFName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="userFName" name="userFName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userMName" class="form-label">Middle Initial</label>
                            <input type="text" class="form-control" id="userMName" name="userMName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userLName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="userLName" name="userLName">
                        </div>
                        <div class="mb-3">
                            <label for="userType" class="form-label">Position</label>
                            <select class="form-select" id="userType" name="userType" required>
                                <option value="" selected disabled>Select a position</option>
                                <option value="4">Doctor</option>
                                <option value="5">Nurse</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userBirthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="userBirthday" name="userBirthday" required>
                        </div>
                        <div class="mb-3">
                            <label for="userBarangay" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="userBarangay" name="userBarangay" required>
                        </div>
                        <div class="mb-3">
                            <label for="userTown" class="form-label">Town</label>
                            <input type="text" class="form-control" id="userTown" name="userTown" required>
                        </div>
                        <div class="mb-3">
                            <label for="userCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="userCity" name="userCity" required>
                        </div>
                        <div class="mb-3">
                            <label for="userProvince" class="form-label">Province</label>
                            <input type="text" class="form-control" id="userProvince" name="userProvince" required>
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add-admin-btn">Add Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#adminTable').DataTable();
        });
    </script>
</body>

</html>