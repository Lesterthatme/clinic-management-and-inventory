<?php require '../config/dbcon.php';

// Check if the form is submitted for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the admin adminID
    $adminID = $_POST['adminID'];

    // SQL query to delete the admin
    $sql = "DELETE FROM admins WHERE adminID = $adminID";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Admin deleted successfully";
        header("Location: ../admin.php"); // Redirect back to the admin page after deleting
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
