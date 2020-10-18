<?php

    if(isset($_POST['reportPassenger'])){
        require_once 'dbconnect.php';
        session_start();

        $userid = mysqli_real_escape_string($con,$_POST['uderid']);
        $reportReason = mysqli_real_escape_string($con, $_POST['reportReason']);
        $inspectorUiduid = mysqli_real_escape_string($con, $_POST['inspectoruid']);
        $date = date('Y-m-d');

        $query = "INSERT INTO user_reports (passengerUid,inspectorUid,reportReason,reportDate) VALUES('$userid','$inspectorUiduid','$reportReason','$date')";
        $result = mysqli_query($con,$query);
        if($result){
            $_SESSION['status'] = "reported";
            header("Location: ../Views/Inspector/dashboard.php");
            exit();

        }else{
            $_SESSION['status'] = "sqlError";
            header("Location: ../Views/Inspector/dashboard.php");
            exit();
        }
    }