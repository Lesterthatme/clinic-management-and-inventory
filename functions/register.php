<?php
require '../config/dbcon.php';

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

if (isset($_POST['stud-submit'])) {
    $studNum = mysqli_real_escape_string($conn, $_POST['studNum']);
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $mName = mysqli_real_escape_string($conn, $_POST['mName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $eMail = mysqli_real_escape_string($conn, $_POST['eMail']);
    $bDay = mysqli_real_escape_string($conn, $_POST['bDay']);
    $insti = mysqli_real_escape_string($conn, $_POST['insti']);
    $subJect = mysqli_real_escape_string($conn, $_POST['subJect']);
    $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
    $town = mysqli_real_escape_string($conn, $_POST['town']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);

    $conn->begin_transaction();

    try {
        $password = generateRandomPassword(); //password
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $type = "1";

        //need muna i check sa validation if yung 
        $query = $conn->prepare("SELECT * FROM validation WHERE valNum = ? AND valEmail = ?");
        $query->bind_param("ss", $studNum, $eMail);
        $query->execute();
        // Get the result
        $result = $query->get_result();
        if ($result->num_rows == 0) {
            // Rollback the transaction as validation failed
            throw new Exception("<script>alert('Unable to register, no existing record in registrar.')
                    window.location.href = '../pages/user/register.php'
            </script>");
        } else {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'lesterarjaymerino.basc@gmail.com';   //papalitan
                $mail->Password = 'ncwn gsfj ormr vxgv';                //papalitan yung app password nyo
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->setFrom('lesterarjaymerino.basc@gmail.com', 'BASC CLINIC'); //papalitan
                $mail->addAddress($eMail, $lName);                //papalitan
                $mail->isHTML(true);
                $mail->Subject = 'GoodDay BASCians!!!'; //palitan nyo
                $mail->Body    = '<
                            
                            <p>Your Email is: <b style="font-size: 25px;">' . $eMail . '</b></p>
                            <br>
                            <p>Your password is: <b style="font-size: 25px;">' . $password . '</b></p>
                            <br>
                            <p>Your account number is: <b style="font-size: 25px;">' . $studNum . '</b></p>
                            
            '; //palitan if want
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            //last query para mapunta sa db yung laman
            $query01 = $conn->prepare("INSERT INTO accounts(studNumber, fName, mName, lName,
                                            eMail, bDay, institute, subEnrolled, addBarangay,
                                            addTown, addCity, addProvince, accPass, accType)
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $query01->bind_param(
                "ssssssssssssss",
                $studNum,
                $fName,
                $mName,
                $lName,
                $eMail,
                $bDay,
                $insti,
                $subJect,
                $barangay,
                $town,
                $city,
                $province,
                $hashPassword,
                $type
            );
            if (!$query01->execute()) {
                throw new Exception("Error inserting order: " . $query01->error);
            }

            if ($query01) {
                $conn->commit();
                echo "<script>alert('Successfully added')
                        window.location.href = '../pages/user/register.php'
                </script>";
            }
        }
    } catch (Exception $e) {

        $conn->rollback();
        echo "Transaction failed: " . $e->getMessage();
    } finally {
        $conn->close();
    }
}
