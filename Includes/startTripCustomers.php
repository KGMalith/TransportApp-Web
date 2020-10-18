<?php

if(isset($_POST['addPassenger'])){
    include_once 'dbconnect.php';
    session_start();

    $cusID = mysqli_real_escape_string($con,$_POST['customerID']);
    $cusName = mysqli_real_escape_string($con,$_POST['cname']);
    $accountBalance = mysqli_real_escape_string($con,$_POST['accountBalance']); 
    $accountStatus = mysqli_real_escape_string($con,$_POST['accountStatus']);
    $driverID = mysqli_real_escape_string($con,$_POST['uderid']);
    $currentTripID = mysqli_real_escape_string($con,$_POST['currenttripID']);

    if(empty($cusID) || empty($cusName) || empty($accountBalance) || empty($driverID) || empty($currentTripID)){
        $_SESSION['status'] = "emptyFields";
        header("Location: ../Views/Driver/dashboard.php");
        exit();
    }else{
        if($accountStatus != 0){
            $_SESSION['status'] = "notActive";
            header("Location: ../Views/Driver/dashboard.php");
            exit();
        }else{
            $queryUid = "SELECT uid FROM users WHERE user_identity_token='$cusID'";
            $results = mysqli_query($con, $queryUid);
            $row = mysqli_fetch_assoc($results);
            $customerID = $row['uid'];


            $sql = "SELECT * FROM trip_details WHERE driver_trip_id='$currentTripID' AND uid = '$customerID'";
            $resultSet = mysqli_query($con,$sql);
            $numCount = mysqli_num_rows($resultSet);
            if($numCount > 0){
                $_SESSION['status'] = "alreadyStarted";
                header("Location: ../Views/Driver/dashboard.php");
                exit();
            }else{
                $query = "SELECT trip_amount FROM driver_trips WHERE driver_trip_id='$currentTripID'";
                $result = mysqli_query($con, $query);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $tripAmount = $row['trip_amount'];

                    if ($tripAmount >= $accountBalance) {
                        $_SESSION['status'] = "noBalance";
                        header("Location: ../Views/Driver/dashboard.php");
                        exit();
                    } else {
                        $tripgeneratedID = bin2hex(random_bytes(10));
                        $startTime = Date('H:i:s');
                        $tripDate = Date('Y-m-d');

                        $sql = "INSERT INTO trip_details (trip_auto_generate_id,driver_trip_id,uid,trip_start_time,trip_date) VALUES('$tripgeneratedID','$currentTripID','$customerID','$startTime','$tripDate')";
                        mysqli_query($con, $sql);

                        $query = "SELECT count FROM trip_count WHERE uid='$customerID'";
                        $results  = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($results);
                        $tripCount = $row['count'];

                        $newCount = (int)$tripCount + 1;
                        $sql = "UPDATE trip_count SET count='$newCount' WHERE uid='$customerID'";
                        mysqli_query($con, $sql);

                        $currentAccountbalance = $accountBalance - $tripAmount;
                        $sqlAccountBalance = "UPDATE account_balance SET amount='$currentAccountbalance' WHERE uid='$customerID'";
                        mysqli_query($con,$sqlAccountBalance);

                        $_SESSION['status'] = "CustomerStartedTrip";
                        header("Location: ../Views/Driver/dashboard.php");
                        exit();
                    }
                } else {
                    $_SESSION['status'] = "sqlError";
                    header("Location: ../Views/Driver/dashboard.php");
                    exit();
                }

            }
        }
    }

}