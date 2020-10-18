<?php

if (isset($_POST['resetPass'])) {
    include_once 'dbconnect.php';
    session_start();

    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $token = mysqli_real_escape_string($con, $_POST['token']);

    if (empty($password) || empty($token)) {
        $_SESSION['status'] = "emptyFields";
        header("Location: ../Views/resetpassword.php");
        exit();
    } else {
        $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
        $verified = 1;

        $sql = "UPDATE users SET password='$hashedpwd' ,verified='$verified' WHERE token='$token'";
        $results = mysqli_query($con, $sql);

        if ($results) {
            $_SESSION['status'] = "passwordReset";
            unset($_SESSION['token']);
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['status'] = "sqlError";
            header("Location: ../Views/resetpassword.php");
            exit();
        }
    }
}
