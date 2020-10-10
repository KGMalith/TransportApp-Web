<?php
include_once 'dbconnect.php';
include_once 'emailController.php';
session_start();

if (isset($_POST['resetPass'])) {
    $email = mysqli_real_escape_string($con, $_POST['mail']);

    if (empty($email)) {
        $_SESSION['status'] = "emptyFields";
        header("Location: ../Views/recoverpassword.php");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email= '$email'";
        $resultset = mysqli_query($con, $sql);
        if ($resultset) {
            $count = mysqli_num_rows($resultset);
            if ($count > 0) {
                $colName = mysqli_fetch_assoc($resultset);
                $userID = $colName['uid'];
                $isVerified = $colName['verified'];

                if ($isVerified == false) {
                    $_SESSION['status'] = "notVerified";
                    header("Location: ../Views/recoverpassword.php");
                    exit();
                } else {
                    $token = bin2hex(random_bytes(50));
                    $verified = false;
                    $query = "UPDATE users SET token='$token' ,verified='$verified' WHERE uid='$userID'";
                    $results = mysqli_query($con, $query);

                    if ($results) {
                        sendResetPasswordEmail($email, $token);
                        $_SESSION['status'] = "emailSent";
                        header("Location: ../Views/resetmailsent.php");
                        exit();
                    } else {
                        $_SESSION['status'] = "sqlError";
                        header("Location: ../Views/recoverpassword.php");
                        exit();
                    }
                }
            } else {
                $_SESSION['status'] = "noUser";
                header("Location: ../Views/recoverpassword.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "sqlError";
            header("Location: ../Views/recoverpassword.php");
            exit();
        }
    }
}
