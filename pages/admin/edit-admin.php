<?php require '../../config/dbcon.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-admin Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <style>
        .container-content {
            padding: 2rem 10rem;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>;

    <div class="container-fluid">
        <div class="container-content">
            <form method="POST" action="../../functions/userFuctions.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userFName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="userFName" name="userFName" required>
                            </div>
                            <div class="mb-3">
                                <label for="userLName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="userLName" name="userLName">
                            </div>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="userBarangay" class="form-label">Barangay</label>
                                <input type="text" class="form-control" id="userBarangay" name="userBarangay" required>
                            </div>
                            <div class="mb-3">
                                <label for="userCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="userCity" name="userCity" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="userMName" class="form-label">Middle Initial</label>
                                <input type="text" class="form-control" id="userMName" name="userMName" required>
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
                                <label for="userBirthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="userBirthday" name="userBirthday" required>
                            </div>
                            <div class="mb-3">
                                <label for="userTown" class="form-label">Town</label>
                                <input type="text" class="form-control" id="userTown" name="userTown" required>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-2">
                        <a href="./admin.php" class="text-decoration-none text-white">Close</a>
                    </button>
                    <button type="submit" class="btn btn-primary" name="add-admin-btn">Add Admin</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>