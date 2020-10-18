<?php

if(isset($_POST['startTrip'])){
    $tripAmount = $_POST['tripamount'];
    $driID = $_POST['driverid'];

    if(empty($tripAmount) || empty($driID)){
        $_SESSION['status'] = "emptyFields";
        header("Location: ./dashboard.php");
        exit();
    }else{
        $sql = "SELECT trip_started from driver_trip_count WHERE driver_id='$driID'";
        $results = mysqli_query($con, $sql);
        if ($results) {
            $row = mysqli_fetch_assoc($results);
            $isStarted = $row['trip_started'];
            if ($isStarted == 0) {
                $startTime = Date('H:i:s');
                $startDate = Date('Y-m-d');
                $query = "INSERT INTO driver_trips(uid,trip_amount,trip_start_time,trip_date)VALUES('$driID','$tripAmount','$startTime','$startDate')";
                mysqli_query($con,$query);
                $driver_trip_id = $con->insert_id;
                $_SESSION['currenttripID'] = $driver_trip_id;

                $tripStatus = 1;
                $query2 = "UPDATE driver_trip_count SET trip_started = '$tripStatus' WHERE driver_id='$driID'";
                mysqli_query($con, $query2);

                $sql = "SELECT trip_count FROM driver_trip_count WHERE driver_id='$driID'";
                $resultSet = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($resultSet);
                $count = $row['trip_count'];

                $newCount = (int)$count + 1;
                $sql2  = "UPDATE driver_trip_count SET trip_count = '$newCount' WHERE driver_id='$driID'";
                mysqli_query($con,$sql2);

                $_SESSION['isTripStarted'] = $tripStatus;
                $_SESSION['status'] = "tripStartedSuccess";
                header("Location: ./dashboard.php");
                exit();

            } else {
                $_SESSION['status'] = "alreadyStarted";
                header("Location: ./dashboard.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "sqlError";
            header("Location: ./dashboard.php");
            exit();
        }
    }
    
}