<?php require '../config/dbcon.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $MI = $_POST['MI'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // SQL query to insert data
    $sql = "INSERT INTO admins (name, surname, MI, position, username, password) 
            VALUES ('$name', '$surname', '$MI', '$position', '$username', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New admin added successfully";
        header("Location: ../admin.php"); // Redirect back to the admin page after inserting
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
