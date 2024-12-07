<?php require '../config/dbcon.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $MI = $_POST['MI'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // SQL query to insert data
    $sql = "INSERT INTO admins (name, surname, MI, position, username, password) 
            VALUES ('$name', '$surname', '$MI', '$position', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New admin added successfully";
        header("Location: ../admin.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}