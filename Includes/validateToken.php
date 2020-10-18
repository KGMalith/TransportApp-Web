<?php

function verifyUser($token)
{
    require_once 'dbconnect.php';

    $sql = "SELECT * FROM users WHERE token = '$token'";
    $resultset = mysqli_query($con, $sql);
    $number = mysqli_num_rows($resultset);
    if($number > 0){
        if ($resultset) {
            $result = mysqli_fetch_assoc($resultset);
            $userid = $result['uid'];
            $email = $result['email'];
            $verify = $result['verified'];

            if($verify == 1){
                $_SESSION['status'] = "tokenError";
                header("Location: ../index.php");
                exit();

            }else{
                $sql = "SELECT name FROM user_details WHERE uid = '$userid'";
                $resultset = mysqli_query($con, $sql);
                $result = mysqli_fetch_assoc($resultset);
                $userName = $result['name'];
                $_SESSION['email'] = $userName;
                $_SESSION['email'] = $email;
                $status = 1;
                $update_sql = "UPDATE users SET verified = '$status' WHERE uid= {$userid}";
                $results = mysqli_query($con, $update_sql);
                if ($results) {

                    $_SESSION['status'] = "emailVerified";
                    header("Location: ../Views/emailVerified.php");
                    exit();
                } else {
                    $_SESSION['status'] = "sqlError";
                    header("Location: ../index.php");
                    exit();
                }
            }
        } else {
            $_SESSION['status'] = "sqlError";
            header("Location: ../index.php");
            exit();
        }

    }else{
        $_SESSION['status'] = "tokenError";
        header("Location: ../index.php");
        exit();
    }
}

function verifyResetToken($token){
    require_once 'dbconnect.php';

    $sql = "SELECT uid FROM users WHERE token = '$token'";
    $resultset = mysqli_query($con, $sql);

    if($resultset){
        $count = mysqli_num_rows($resultset);
        if($count > 0){
            $_SESSION['token'] = $token;
            header('Location: ../Views/resetpassword.php');
            exit();
        }else{
            $_SESSION['status'] = "tokenError";
            header('Location: ../Views/resetmailsent.php');
            exit();
        }    

    }else{
        $_SESSION['status'] = "sqlError";
        header('Location: ../Views/resetmailsent.php');
        exit();
    }

}
