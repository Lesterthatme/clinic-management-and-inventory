<?php require '../config/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supplyName = $_POST['supplyName'];
    $stock = $_POST['stock'];
    $startDate = $_POST['startDate'];
    $expDate = $_POST['expDate'];

    // Insert into database
    $sql = "INSERT INTO inventory (supplyName, stock, startDate, expDate) VALUES ('$supplyName', '$stock', '$startDate', '$expDate')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Report generated successfully!";
        header('location:../pages/admin/inventory.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
