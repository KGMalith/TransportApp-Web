<?php
if(isset($_POST['pay'])){
    include_once 'dbconnect.php';
    session_start();

    $cardNumber = mysqli_real_escape_string($con,$_POST['cardNumber']);
    $amount = mysqli_real_escape_string($con, $_POST['topupAmount']);
    $userID = mysqli_real_escape_string($con, $_POST['userid']);
    $date = Date('Y-m-d');
    $time = Date('g:i a');

    if(empty($cardNumber) || empty($amount) || empty($userID) || empty($date) || empty($time)){
        $_SESSION['status'] = "emptyFields";
        header("Location: ../Views/Customer/dashboard.php");
        exit();
    }else{
        $sql = "INSERT INTO payment_details (uid,cardNumber,amount,topup_date,topup_time) VALUES('$userID','$cardNumber','$amount','$date','$time')";
        $result = mysqli_query($con,$sql);
        if($result){
            $query = "UPDATE account_balance SET amount='$amount' WHERE uid='$userID'";
            $res = mysqli_query($con,$query);
            if($res){
                $_SESSION['status'] = "topUpSuccess";
                header("Location: ../Views/Customer/dashboard.php");
                exit();
            }else{
                $_SESSION['status'] = "sqlError";
                header("Location: ../Views/Customer/dashboard.php");
                exit(); 
            }
        }else{
            $_SESSION['status'] = "sqlError";
            header("Location: ../Views/Customer/dashboard.php");
            exit();
        }
    }

}
