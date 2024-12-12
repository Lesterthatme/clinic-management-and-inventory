<?php 
    require '../../config/dbcon.php';

    $patientID = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($patientID == 0) {
        header("Location: records.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE userID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param("i", $patientID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $patient = $result->fetch_assoc();
    } else {
        echo "<script>alert('Patient not found.'); window.location.href = 'records.php';</script>";
        exit();
    }

    $stmt->close();

    $medicalQuery = "SELECT audittrails.*, illnesstypes.illDescription FROM audittrails LEFT JOIN illnesstypes ON illnesstypes.illID = audittrails.patientIllnessType LEFT JOIN users ON users.userEmail = audittrails.patientEmail WHERE users.userID = ?";
    $medicalStmt = $conn->prepare($medicalQuery);

    if ($medicalStmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $medicalStmt->bind_param("i", $patientID);
    $medicalStmt->execute();
    $medicalResult = $medicalStmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f6fff8;
    }

    .record-container {
        margin: 30px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header {
        background-color: #97ce89;
        color: white;
        padding: 15px;
        border-radius: 10px 10px 0 0;
    }

    .table-container {
        background-color: #ffffff;
        margin-top: 20px;
        border: 2px solid #4caf50;
        border-radius: 10px;
    }

    .table th {
        background-color: #97ce89;
        text-align: center;
    }

    .table td {
        text-align: center;
    }

    .back-button {
        margin-top: 15px;
    }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <div class="record-container">
            <div class="header text-center">
                <h2>Patient Record</h2>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h5><strong>Name:</strong>
                        <span><?php echo $patient['userLName'] . ", " . $patient['userFName']; ?></span>
                    </h5>
                    <h5><strong>ID:</strong>
                        <span><?php echo $patient['userID']; ?></span>
                    </h5>
                </div>
                <div class="col-md-6">
                    <h5><strong>Institute:</strong>
                        <span><?php echo $patient['userInstitute']; ?></span>
                    </h5>
                </div>
            </div>

            <div class="table-container mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Illness</th>
                            <th>Treatment</th>
                        </tr>
                    </thead>
                    <tbody id="recordBody">
                        <?php while($row = $medicalResult->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $formattedDate = date("F j, Y", strtotime($row['patientDate']));; ?></td>
                            <td><?php echo $row['illDescription']; ?></td>
                            <td><?php echo $row['patientDescription']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center back-button">
                <a href="records.php" class="btn btn-success">Back to Patients Overview</a>
            </div>
        </div>
    </div>
</body>

</html>