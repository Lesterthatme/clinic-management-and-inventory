<?php
session_start();
require './../config/dbcon.php';

if (isset($_POST['add_record'])) {
    $patient = $_POST['patient'];
    $date = $_POST['date'];
    $patientIllness = $_POST['patientIllness'];
    $treatment = $_POST['patientTreatment'];

    if (isset($_SESSION['user_id']) && !empty($patient) && !empty($date)) {
        $stmt = $conn->prepare("INSERT INTO patientRecords (patient, date, patientIllness, patientTreatment) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("isss", $patient, $date, $patientIllness, $treatment);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Patient record added successfully!";
                header("Location: add_patient_record.php"); 
                exit();
            } else {
                $_SESSION['error'] = "Failed to add patient record: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['error'] = "Failed to prepare the statement.";
        }
    } else {
        $_SESSION['error'] = "Invalid input or user not logged in.";
    }

    $conn->close();
} else {
    $_SESSION['error'] = "Invalid request method.";
    header("Location: add_patient_record.php");
    exit();
}
?>