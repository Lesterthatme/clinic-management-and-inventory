<?php
    require './../config/dbcon.php';


    if(isset($_POST['add_record'])) {
        $patientData = [
            'patientEmail' => mysqli_real_escape_string($conn, $_POST['patientEmail']),
            'patientIllnessType' => mysqli_real_escape_string($conn, $_POST['patientIllnessType']),
            'patientDescription' => mysqli_real_escape_string($conn, $_POST['patientDescription']),
            'patientDate' => mysqli_real_escape_string($conn, $_POST['patientDate']),
            'patientSupplyID' => mysqli_real_escape_string($conn, $_POST['patientSupplyID']),
            'patientType' => mysqli_real_escape_string($conn, $_POST['patientType']),
        ];

        $requiredFields = ['patientEmail', 'patientIllnessType', 'patientDescription', 'patientDate', 'patientSupplyID', 'patientType'];
        $missingFields = [];
        foreach ($requiredFields as $field) {
            if (empty($patientData[$field])) {
                $missingFields[] = $field;
            }
        }

        if (!empty($missingFields)) {
            echo "Please fill in all required fields: " . implode(', ', $missingFields);
            exit();
        }

        $query = "INSERT INTO audittrails (patientEmail, patientIllnessType, patientDescription, patientDate, patientSupplyID, patientType) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sissii', $patientData['patientEmail'], $patientData['patientIllnessType'], $patientData['patientDescription'], $patientData['patientDate'], $patientData['patientSupplyID'], $patientData['patientType']);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: /pages/admin/add-record.php');
                exit();
            } else {
                echo "Error executing query: " . mysqli_error($conn);
            }
    
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing query: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
?>