<?php
require './../config/dbcon.php';

if (isset($_POST['patientIDToDelete'])) {
    $patientIDToDelete = $_POST['patientIDToDelete'];

    if (!is_numeric($patientIDToDelete)) {
        echo 'error';
        exit();
    }

    $query = "UPDATE clinic.users SET deleted = 1 WHERE userID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param('i', $patientIDToDelete);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
} else {
    echo 'error';
}

$conn->close();
?>