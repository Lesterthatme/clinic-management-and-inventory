<?php
session_start();
require './../config/dbcon.php';

require '../PHPMailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function generateRandomPassword($length = 8)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $password = '';
    $maxIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $maxIndex)];
    }
    return $password;
}

function validator($conn, $student_id = null, $email = null, $accountType = null)
{
    if (!empty($student_id) && !empty($email) && !empty($accountType)) {
        $query0 = $conn->prepare("SELECT * FROM validation WHERE valNum = ? AND valEmail = ? AND valType = ?");
        $query0->bind_param("sss", $student_id, $email, $accountType);
        $query0->execute();
        $result = $query0->get_result();


        if ($result->num_rows == 0) {
            return true;
        } else {
            return false;
        }
    } else if (!empty($email) && !empty($accountType)) {
        $query0 = $conn->prepare("SELECT * FROM validation WHERE  valEmail = ? AND valType = ?");
        $query0->bind_param("ss", $email, $accountType);
        $query0->execute();
        $result = $query0->get_result();
        if ($result->num_rows == 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if (isset($_POST['register_user'])) {
    $userData = [
        'userType' => mysqli_real_escape_string($conn, $_POST['userType']),
        'userStudentID' => isset($_POST['userStudentID']) ? mysqli_real_escape_string($conn, $_POST['userStudentID']) : '',
        'userFName' => mysqli_real_escape_string($conn, $_POST['userFName']),
        'userMName' => mysqli_real_escape_string($conn, $_POST['userMName']),
        'userLName' => mysqli_real_escape_string($conn, $_POST['userLName']),
        'userEmail' => mysqli_real_escape_string($conn, $_POST['userEmail']),
        'userBirthday' => mysqli_real_escape_string($conn, $_POST['userBirthday']),
        'userInstitute' => isset($_POST['userInstitute']) ? mysqli_real_escape_string($conn, $_POST['userInstitute']) : '',
        'userSubject' => isset($_POST['userSubject']) ? mysqli_real_escape_string($conn, $_POST['userSubject']) : '',
        'userBarangay' => mysqli_real_escape_string($conn, $_POST['userBarangay']),
        'userTown' => mysqli_real_escape_string($conn, $_POST['userTown']),
        'userCity' => mysqli_real_escape_string($conn, $_POST['userCity']),
        'userProvince' => mysqli_real_escape_string($conn, $_POST['userProvince']),
        'userWorkPosition' => isset($_POST['userWorkPosition']) ? mysqli_real_escape_string($conn, $_POST['userWorkPosition']) : ''
    ];

    $requiredFields = ['userType', 'userFName', 'userLName', 'userEmail', 'userBirthday', 'userBarangay', 'userTown', 'userCity', 'userProvince'];
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
    function registerUser($query, $userData, $conn)
    {
        $conn->begin_transaction();
    
        $password = generateRandomPassword();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        try {
            if ($userData['userType'] != '4' || $userData['userType'] != '5') {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'lesterarjaymerino.basc@gmail.com';
                    $mail->Password = 'ncwn gsfj ormr vxgv';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    $mail->setFrom('lesterarjaymerino.basc@gmail.com', 'BASC CLINIC');
                    $mail->addAddress($userData['userEmail'], $userData['userLName']);
                    $mail->isHTML(true);
                    $mail->Subject = 'GoodDay BASCians!!!';
                    $mail->Body    = '<p>Your Email is: <b style="font-size: 25px;">' . $userData['userEmail'] . '</b></p>
                                      <br>
                                      <p>Your password is: <b style="font-size: 25px;">' . $password . '</b></p>
                                      <br>
                                      <p>Your account number is: <b style="font-size: 25px;">' . $userData['userStudentID'] . '</b></p>';
    
                    $mail->send();
                } catch (Exception $e) {
                    echo "<script>alert('Message could not be sent. Mailer Error.'); window.location.href = '/pages/user/register.php';</script>";
                    return; 
                }
            }
    
            if ($conn === false) {
                die("Database connection failed: " . mysqli_connect_error());
            }
    
            $stmt = $conn->prepare($query);
            if ($stmt === false) {
                die('MySQL prepare error: ' . $conn->error);
            }
    
            if ($userData['userType'] == 'student') {
                $accTypeID = "1";
                $stmt->bind_param(
                    "ssssssssssssss",
                    $userData['userStudentID'],
                    $userData['userFName'],
                    $userData['userMName'],
                    $userData['userLName'],
                    $accTypeID,
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
                $accTypeID = "2";
                $stmt->bind_param(
                    "ssssssssssss",
                    $userData['userFName'], 
                    $userData['userMName'],
                    $userData['userLName'],
                    $accTypeID,
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
                $accTypeID = "3";
                $stmt->bind_param(
                    "ssssssssssss",
                    $userData['userFName'],
                    $userData['userMName'],
                    $userData['userLName'],
                    $accTypeID,
                    $userData['userEmail'],
                    $hashed_password,
                    $userData['userBirthday'],
                    $userData['userWorkPosition'],
                    $userData['userBarangay'],
                    $userData['userTown'],
                    $userData['userCity'],
                    $userData['userProvince']
                );
            } elseif ($userData['userType'] == 'doctor') {
                $accTypeID = "4";
                $stmt->bind_param(
                    "ssssssssssss",
                    $userData['userFName'],
                    $userData['userMName'],
                    $userData['userLName'],
                    $accTypeID,
                    $userData['userEmail'],
                    $hashed_password,
                    $userData['userBirthday'],
                    $userData['userWorkPosition'],
                    $userData['userBarangay'],
                    $userData['userTown'],
                    $userData['userCity'],
                    $userData['userProvince']
                );
            }  elseif ($userData['userType'] == 'nurse') {
                $accTypeID = "5";
                $stmt->bind_param(
                    "ssssssssssss",
                    $userData['userFName'],
                    $userData['userMName'],
                    $userData['userLName'],
                    $accTypeID,
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
                $conn->commit();
                echo "<script>alert('Successfully added'); window.location.href = '../pages/user/register.php';</script>";
            } else {
                echo "<script>alert('Error.'); window.location.href = '../pages/user/register.php';</script>";
            }
    
        } catch (Exception $e) {
            $conn->rollback();
            echo "<script>alert('Transaction failed.'); window.location.href = '../pages/user/register.php';</script>";
        } finally {
            $conn->close();
        }
    }
    
    if ($userData['userType'] == 'student') {
        $validationResult = validator($conn, $userData['userStudentID'], $userData['userEmail'], "1");
    
            $query = "INSERT INTO users (userStudentID, userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userInstitute, userSubject, userBarangay, userTown, userCity, userProvince)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            registerUser($query, $userData, $conn);
    } elseif ($userData['userType'] == 'faculty') {
        $validationResult = validator($conn, null, $userData['userEmail'], "2");
      
            $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userInstitute, userBarangay, userTown, userCity, userProvince)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            registerUser($query, $userData, $conn);
    } elseif ($userData['userType'] == 'staff') {
        $validationResult = validator($conn, null, $userData['userEmail'], "3");
      
            $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userWorkPosition, userBarangay, userTown, userCity, userProvince)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            registerUser($query, $userData, $conn);
    } elseif ($userData['userType'] == 'doctor') {
            $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userWorkPosition, userBarangay, userTown, userCity, userProvince)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            registerUser($query, $userData, $conn);
    } elseif ($userData['userType'] == 'nurse') {
        $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userWorkPosition, userBarangay, userTown, userCity, userProvince)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        registerUser($query, $userData, $conn); 
    }  else {
        echo "<script>alert('Invalid user type.')
                        window.location.href = '../pages/user/register.php'
                </script>";
    }
} elseif (isset($_POST['login_user'])) {
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $userPassword = mysqli_real_escape_string($conn, $_POST['userPassword']);

    if (empty($userEmail) || empty($userPassword)) {
        $_SESSION['error'] = "Please enter both email and password.";
        header("Location: /pages/user/logIn.php");
        exit();
    }

    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT * FROM users WHERE userEmail = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("MySQL prepare error: " . $conn->error);
        }
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    } else {
        $query = "SELECT * FROM users WHERE userStudentID = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("MySQL prepare error: " . $conn->error);
        }

        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    }

    if (mysqli_num_rows($result) == 1) {
        $stored_password = $row['userPassword'];

        if (password_verify($userPassword, $stored_password)) {
            $_SESSION['userEmail'] = $userEmail;
            if ($row['userType'] == "1") {
                $_SESSION['accTypeID'] = "1";
                header("Location: /pages/admin/view-records.php");
                exit();
            } else if ($row['userType'] == "2") {
                $_SESSION['accTypeID'] = "2";
                header("Location: /pages/user/userDashboard.php");
                exit();
            } else if ($row['userType'] == "3") {
                $_SESSION['accTypeID'] = "3";
                header("Location: /pages/user/userDashboard.php");
                exit();
            } else if ($row['userType'] == "4") {
                $_SESSION['accTypeID'] = "4";
                header("Location: /pages/admin/dashboard.php");
                exit();
            } else if ($row['userType'] == "5") {
                $_SESSION['accTypeID'] = "5";
                header("Location: /pages/admin/dashboard.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Incorrect password, dine pumapasok si ate ko.";
            header("Location: /pages/user/logIn.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Incorrect Email or Account Number";
        header("Location: /pages/user/logIn.php");
        exit();
    }
} else if (isset($_POST['add-admin-btn'])) {
    $userData = [
        'userFName' => mysqli_real_escape_string($conn, $_POST['userFName']),
        'userMName' => mysqli_real_escape_string($conn, $_POST['userMName']),
        'userLName' => mysqli_real_escape_string($conn, $_POST['userLName']),
        'userType' => mysqli_real_escape_string($conn, $_POST['userType']),
        'userEmail' => mysqli_real_escape_string($conn, $_POST['userEmail']),
        'userBirthday' => mysqli_real_escape_string($conn, $_POST['userBirthday']),
        'userBarangay' => mysqli_real_escape_string($conn, $_POST['userBarangay']),
        'userTown' => mysqli_real_escape_string($conn, $_POST['userTown']),
        'userCity' => mysqli_real_escape_string($conn, $_POST['userCity']),
        'userProvince' => mysqli_real_escape_string($conn, $_POST['userProvince']),
        'userPassword' => mysqli_real_escape_string($conn, $_POST['userPassword']),
    ];

    function registerUser($query, $userData, $conn)
    {
        $conn->begin_transaction();

        $password = $userData['userPassword'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            if ($conn === false) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            $stmt = $conn->prepare($query);
            if ($stmt === false) {
                die('MySQL prepare error: ' . $conn->error);
            }

            if ($userData['userType'] == '4') {
                $accTypeID = "4";
                $Postion = "doctor";
                $stmt->bind_param(
                    "ssssssssssss",
                    $userData['userFName'],
                    $userData['userMName'],
                    $userData['userLName'],
                    $accTypeID,
                    $userData['userEmail'],
                    $hashed_password,
                    $userData['userBirthday'],
                    $Postion,
                    $userData['userBarangay'],
                    $userData['userTown'],
                    $userData['userCity'],
                    $userData['userProvince']
                );
            } elseif ($userData['userType'] == '5') {
                $accTypeID = "5";
                $Postion = "nurse";
                $stmt->bind_param(
                    "ssssssssssss",
                    $userData['userFName'],
                    $userData['userMName'],
                    $userData['userLName'],
                    $accTypeID,
                    $userData['userEmail'],
                    $hashed_password,
                    $userData['userBirthday'],
                    $Postion,
                    $userData['userBarangay'],
                    $userData['userTown'],
                    $userData['userCity'],
                    $userData['userProvince']
                );
            }

            if ($stmt->execute()) {
                $conn->commit();
                echo "<script>alert('Successfully added')
                    window.location.href = '/pages/admin/admin.php'
            </script>";
            } else {
                echo "<script>alert('Error.')
                    window.location.href = '/pages/admin/admin.php'
            </script>";
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo "<script>alert('Transaction failed.')
                        window.location.href = '/pages/admin/admin.php'
                </script>";
        } finally {
            $conn->close();
        }
    }



    if ($userData['userType'] == '4') {
        $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userWorkPosition, userBarangay, userTown, userCity, userProvince)
                      VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        registerUser($query, $userData, $conn);
    } elseif ($userData['userType'] == '5') {
        $query = "INSERT INTO users (userFName, userMName, userLName, userType, userEmail, userPassword, userBirthday, userWorkPosition, userBarangay, userTown, userCity, userProvince)
                      VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        registerUser($query, $userData, $conn);
    } else {
        echo "<script>alert('Invalid user type.')
                        window.location.href = '/pages/admin/admin.php'
                </script>";
    }
} else if(isset($_POST['update_user'])) {
    $userData = [
        'userID' => mysqli_real_escape_string($conn, $_POST['userID']),
        'userFName' => mysqli_real_escape_string($conn, $_POST['userFName']),
        'userMName' => mysqli_real_escape_string($conn, $_POST['userMName']),
        'userLName' => mysqli_real_escape_string($conn, $_POST['userLName']),
        'userInstitute' => mysqli_real_escape_string($conn, $_POST['userInstitute']),
    ];

    $requiredFields = ['userFName', 'userLName', 'userMName', 'userInstitute'];

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

    $query = "UPDATE users SET userFName = ?, userMName = ?, userLName = ?, userInstitute = ? WHERE userID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param(
        "ssssi",
        $userData['userFName'],
        $userData['userMName'],
        $userData['userLName'],
        $userData['userInstitute'],
        $userData['userID'] 
    );

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully.');
            window.location.href = '/pages/admin/records.php';
        </script>";
    } else {
        echo "<script>alert('Error updating user. Please try again.');
            window.location.href = '/pages/admin/records.php';
        </script>";
    }

    $stmt->close();
} 