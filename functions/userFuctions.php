<?php
require './../config/dbcon.php';

if (isset($_POST['register_user'])) {
    $userData = [
        'userType' => mysqli_real_escape_string($conn, $_POST['userType']),
        'userStudentID' => isset($_POST['userStudentID']) ? mysqli_real_escape_string($conn, $_POST['userStudentID']) : '',
        'userFName' => mysqli_real_escape_string($conn, $_POST['userFName']),
        'userMName' => mysqli_real_escape_string($conn, $_POST['userMName']),
        'userLName' => mysqli_real_escape_string($conn, $_POST['userLName']),
        'userEmail' => mysqli_real_escape_string($conn, $_POST['userEmail']),
        'userPassword' => mysqli_real_escape_string($conn, $_POST['userPassword']),
        'userBirthday' => mysqli_real_escape_string($conn, $_POST['userBirthday']),
        'userInstitute' => mysqli_real_escape_string($conn, $_POST['userInstitute']),
        'userSubject' => isset($_POST['userSubject']) ? mysqli_real_escape_string($conn, $_POST['userSubject']) : '',
        'userBarangay' => mysqli_real_escape_string($conn, $_POST['userBarangay']),
        'userTown' => mysqli_real_escape_string($conn, $_POST['userTown']),
        'userCity' => mysqli_real_escape_string($conn, $_POST['userCity']),
        'userProvince' => mysqli_real_escape_string($conn, $_POST['userProvince']),
        'userWorkPosition' => isset($_POST['userWorkPosition']) ? mysqli_real_escape_string($conn, $_POST['userWorkPosition']) : ''
    ];

    $requiredFields = ['userType', 'userFName', 'userLName', 'userEmail', 'userPassword', 'userBirthday', 'userInstitute', 'userBarangay', 'userTown', 'userCity', 'userProvince'];
    $missingFields = [];
    foreach ($requiredFields as $field) {
        if (empty($userData[$field])) {
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        echo "Please fill in all required fields: " . implode(', ', $missingFields);
        exit();
    }

    $hashed_password = password_hash($userData['userPassword'], PASSWORD_DEFAULT);

    function registerUser($query, $userData, $hashed_password, $conn) {
        if ($conn === false) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error);
        }

        if ($userData['userType'] == 'student') {
            $stmt->bind_param(
                "ssssssssssssss",
                $userData['userStudentID'],
                $userData['userFName'],
                $userData['userMName'],
                $userData['userLName'],
                $userData['userType'],
                $userData['userEmail'],
                $hashed_password,
                $userData['userBirthday'],
                $userData['userInstitute'],
                $userData['userSubject'],
                $userData['userBarangay'],
                $userData['userTown'],
                $userData['userCity'],
                $userData['userProvince']
            );
        } elseif ($userData['userType'] == 'faculty') {
            $stmt->bind_param(
                "ssssssssssss",
                $userData['userFName'],
                $userData['userMName'],
                $userData['userLName'],
                $userData['userType'],
                $userData['userEmail'],
                $hashed_password,
                $userData['userBirthday'],
                $userData['userInstitute'],
                $userData['userBarangay'],
                $userData['userTown'],
                $userData['userCity'],
                $userData['userProvince']
            );
        } elseif ($userData['userType'] == 'staff') {
            $stmt->bind_param(
                "ssssssssssss",
                $userData['userFName'],
                $userData['userMName'],
                $userData['userLName'],
                $userData['userType'],
                $userData['userEmail'],
                $hashed_password,
                $userData['userBirthday'],
                $userData['userWorkPosition'],
                $userData['userBarangay'],
                $userData['userTown'],
                $userData['userCity'],
                $userData['userProvince']
            );
        }

        if ($stmt->execute()) {
            header('Location: /pages/user/logIn.php');
            exit(0);
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if ($userData['userType'] == 'student') {
        $query = "INSERT INTO users (userStudentID, userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userInstitute, userSubject, userBarangay, userTown, userCity, userProvince)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        registerUser($query, $userData, $hashed_password, $conn);
    } elseif ($userData['userType'] == 'faculty') {
        $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userInstitute, userBarangay, userTown, userCity, userProvince)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        registerUser($query, $userData, $hashed_password, $conn);
    } elseif ($userData['userType'] == 'staff') {
        $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userWorkPosition, userBarangay, userTown, userCity, userProvince)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        registerUser($query, $userData, $hashed_password, $conn);
    } else {
        echo "Invalid user type.";
    }
} elseif (isset($_POST['login_user'])) {
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $userPassword = mysqli_real_escape_string($conn, $_POST['userPassword']);

    if(empty($userEmail) || empty($userPassword)) {
        $_SESSION['error'] = "Please enter both email and password.";
        header("Location: /pages/user/logIn.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE userEmail = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("MySQL prepare error: " . $conn->error);
    }

    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['userPassword'];

        if(password_verify($userPassword, $stored_password)){
            $_SESSION['userEmail'] = $userEmail; 
            header("Location: /pages/user/schedule.php");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect username or password.";
            header("Location: /pages/user/logIn.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Incorrect username or password.";
        header("Location: /pages/user/logIn.php");
        exit();
    }
}
?>