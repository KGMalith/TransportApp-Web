<?php

if (isset($_POST['RegisterDriver'])) {
    require_once 'dbconnect.php';
    require 'emailController.php';
    session_start();

    $drivername = mysqli_real_escape_string($con, $_POST['driverName']);
    $email = mysqli_real_escape_string($con, $_POST['mail']);
    $busType = mysqli_real_escape_string($con, $_POST['busType']);
    $regNumber = mysqli_real_escape_string($con, $_POST['regNum']);
    $busStart = mysqli_real_escape_string($con, $_POST['startLocation']);
    $busEnd = mysqli_real_escape_string($con, $_POST['endLocation']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $role = 1;
    
    if (empty($drivername) || empty($email) || empty($busType) || empty($regNumber)|| empty($busStart)|| empty($busEnd)|| empty($password)) {
        
        $_SESSION['status'] = "emptyFields";
        header("Location: ../Views/registerdriver.php");
        exit();
    } else {
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['status'] = "sqlError";
            header("Location: ../Views/registerdriver.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                $_SESSION['status'] = "emailTaken";
                header("Location: ../Views/registerdriver.php");
                exit();
            } else {

                $sql = "INSERT INTO users(user_identity_token,email,password,token,verified,role) VALUES(?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $_SESSION['status'] = "sqlError";
                    header("Location: ../Views/registerdriver.php");
                    exit();
                } else {

                    $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
                    $token = bin2hex(random_bytes(50));
                    $identity_token = bin2hex(random_bytes(10));
                    $verified = false;

                    mysqli_stmt_bind_param($stmt, "ssssbs", $identity_token ,$email, $hashedpwd, $token, $verified, $role);
                    if(mysqli_stmt_execute($stmt)){
                        $user_id = $con->insert_id;
                        $_SESSION['Userid'] = $user_id;
                        $_SESSION['verified'] = $verified;
                        $_SESSION['role'] = $role;
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $drivername;
                    

                        $sql2 = "INSERT INTO user_details(uid,name,email,bus_type,bus_reg_number,bus_start_location,bus_end_location) VALUES(?,?,?,?,?,?,?)";
                        $stmt = mysqli_stmt_init($con);

                        if (!mysqli_stmt_prepare($stmt, $sql2)) {
                            $_SESSION['status'] = "sqlError";
                            header("Location: ../Views/registerdriver.php");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssssss", $user_id, $drivername, $email, $busType, $regNumber, $busStart, $busEnd);
                            mysqli_stmt_execute($stmt);
                        }
                        sendVerificationEmail($email, $token);
                        $_SESSION['status'] = "registerSuccess";
                        header("Location: ../Views/email-verify.php");
                        exit();
                    }
                    
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    header("Location: ../Views/registerdriver.php");
    exit();
}
