<?php 
session_start();
require '../../config/dbcon.php';
if (!isset($_SESSION['userEmail'])) {
    header('Location: /index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Health Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
    body {
        background-color: #f1f8e9;
        font-family: Arial, sans-serif;
    }

    .add .container {
        margin: 15px auto;
        padding: 20px;
        width: 350px;
        background-color: #ffffff;
        border: 2px solid #c8e6c9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
        font-weight: bold;
        color: #2e7d32;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #c8e6c9;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #2e7d32;
    }

    .btn-primary {
        width: 100%;
        background-color: #2e7d32;
        border: none;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #1b5e20;
    }

    .form-header {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: #2e7d32;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>

    <?php include 'navbar.php' ?>;
    <div class="add">
        <div class="container">
            <div class="form-header">Student Health Form</div>
            <form action="/functions/recordsFunctions.php" method="post">
                <div class="form-group">
                    <label for="patientEmail">Patient Email</label>
                    <input type="text" class="form-control" id="patientEmail" name="patientEmail" required>
                </div>
                <div class="form-group">
                    <label for="patientType">Patient Type</label>
                    <select name="patientType" id="patientType" class="form-select">
                        <?php
                        $query = "SELECT valType, valDescription FROM usertype";
                        $stmt = $conn->prepare($query);

                        if ($stmt === false) {
                            die('MySQL prepare error: ' . $conn->error);
                        }

                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['valType']) . '">' . htmlspecialchars($row['valDescription']) . '</option>';
                            }
                        } else {
                            echo '<option value="">No user types available</option>';
                        }

                        $stmt->close();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="patientIllnessType">Illness Type</label>
                    <select name="patientIllnessType" id="patientIllnessType" class="form-select">
                        <?php
                        $query = "SELECT * FROM illnesstypes";
                        $stmt = $conn->prepare($query);

                        if ($stmt === false) {
                            die('MySQL prepare error: ' . $conn->error);
                        }

                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['illID']) . '">' . htmlspecialchars($row['illDescription']) . '</option>';
                            }
                        } else {
                            echo "<script>alert('Illness not found.'); window.location.href = 'records.php';</script>";
                            exit();
                        }

                        $stmt->close();
                        ?>


                    </select>
                </div>

                <div class="form-group">
                    <label for="patientDate">Illness Date</label>
                    <input type="date" class="form-control" id="patientDate" name="patientDate">
                </div>

                <div class="form-group">
                    <label for="patientSupplyID" class="">Medicine</label>
                    <select name="patientSupplyID" id="patientSupplyID" class="form-select">
                        <?php
                        $query = "SELECT supplyID, supplyName FROM inventory";
                        $stmt = $conn->prepare($query);

                        if ($stmt === false) {
                            die('MySQL prepare error: ' . $conn->error);
                        }

                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['supplyID']) . '">' . htmlspecialchars($row['supplyName']) . '</option>';
                            }
                        } else {
                            echo '<option value="">No medicines available</option>';
                        }

                        $stmt->close();
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="patientDescription">Findings</label>
                    <textarea class="form-control" id="patientDescription" name="patientDescription" rows="4"
                        required></textarea>
                </div>


                <button type="submit" name="add_record" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
    // Automatically set today's date in the Illness Date field
    document.addEventListener("DOMContentLoaded", () => {
        const today = new Date().toISOString().split("T")[0]; // Format: YYYY-MM-DD
        document.getElementById("illnessDate").value = today;
    });
    </script>
</body>

</html>