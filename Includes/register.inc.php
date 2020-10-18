<?php

if(isset($_POST['Register'])){
    require_once 'dbconnect.php';
    require 'emailController.php';
    session_start();

    $cusname = mysqli_real_escape_string($con, $_POST['cusName']);
    $email = mysqli_real_escape_string($con, $_POST['mail']);
    $mobile = mysqli_real_escape_string($con, $_POST['mNumber']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $role = 0;

    if (empty($cusname) || empty($email) || empty($mobile) || empty($password)) {
        $_SESSION['status']="emptyFields";
        header("Location: ../Views/registercustomer.php");
        exit();
    }
    else{
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['status'] = "sqlError";
            header("Location: ../Views/registercustomer.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                $_SESSION['status'] = "emailTaken";
                header("Location: ../Views/registercustomer.php");
                exit();
            } else {

                $sql = "INSERT INTO users(user_identity_token,email,password,token,verified,role) VALUES(?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $_SESSION['status'] = "sqlError";
                    header("Location: ../Views/registercustomer.php");
                    exit();
                } else {

                    $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
                    $token = bin2hex(random_bytes(50));
                    $identity_token = bin2hex(random_bytes(10));
                    $verified = 0;

                    mysqli_stmt_bind_param($stmt, "ssssss", $identity_token, $email, $hashedpwd, $token, $verified, $role);
                    if(mysqli_stmt_execute($stmt)){
                        $user_id = $con->insert_id;
                        $_SESSION['Userid'] = $user_id;
                        $_SESSION['verified'] = $verified;
                        $_SESSION['role'] = $role;
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $cusname;


                        $sql2 = "INSERT INTO user_details(uid,name,email,mobileNumber) VALUES(?,?,?,?)";
                        $stmt = mysqli_stmt_init($con);

                        if(!mysqli_stmt_prepare($stmt, $sql2)){
                            $_SESSION['status'] = "sqlError";
                            header("Location: ../Views/registercustomer.php");
                            exit();
                        }
                        else{
                            $mob =  "+94"+ $mobile;
                            mysqli_stmt_bind_param($stmt, "ssss", $user_id, $cusname, $email, $mob);
                            mysqli_stmt_execute($stmt);

                            $amount = '0.00';
                            $query = "INSERT INTO account_balance (uid,amount) VALUES('$user_id',' $amount')";
                            mysqli_query($con,$query);

                            $tripCount = 0;
                            $query2 = "INSERT INTO trip_count (uid,count) VALUES('$user_id',' $tripCount')";
                            mysqli_query($con, $query2);
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
    header("Location: ../Views/registercustomer.php");
    exit();
}