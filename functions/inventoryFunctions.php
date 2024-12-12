<?php
    require './../config/dbcon.php';

    if (isset($_POST['add_supply'])) {
        $supplyData = [
            'supplyName' => mysqli_real_escape_string($conn, $_POST['supplyName']),
            'stock' => mysqli_real_escape_string($conn, $_POST['stock']),
            'startDate' => mysqli_real_escape_string($conn, $_POST['startDate']),
            'expDate' => mysqli_real_escape_string($conn, $_POST['expDate']),
        ];

        $requiredFields = ['supplyName', 'stock', 'startDate', 'expDate'];
        $missingFields = [];
        foreach ($requiredFields as $field) {
            if (empty($supplyData[$field])) {
                $missingFields[] = $field;
            }
        }
    
        if (!empty($missingFields)) {
            echo "Please fill in all required fields: " . implode(', ', $missingFields);
            exit();
        }

        if (!is_numeric($supplyData['stock']) || $supplyData['stock'] < 0) {
            echo "Invalid stock value. Please provide a positive number.";
            exit();
        }

        $status = ($supplyData['stock'] > 0) ? 'In Stock' : 'Out of Stock';

        $query = "INSERT INTO inventory (supplyName, stock, startDate, expDate, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sisss', $supplyData['supplyName'], $supplyData['stock'], $supplyData['startDate'], $supplyData['expDate'], $status);
            if (mysqli_stmt_execute($stmt)) {
                header('Location: /pages/admin/inventory.php');
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