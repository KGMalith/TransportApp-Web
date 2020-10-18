<?php
if(isset($_GET['trpid'])){
    session_start();
    include_once 'dbconnect.php';
    $tripid = $_GET['trpid'];

    if($tripid == '0'){
        $_SESSION['status'] = "tripNotStarted";
        header("Location: ../Views/Driver/dashboard.php");
        exit();
    }else{
        $endTime = Date('H:i:s');
        $query = "UPDATE driver_trips SET trip_end_time ='$endTime' WHERE driver_trip_id = '$tripid'";
        $result = mysqli_query($con,$query);
        if($result){
            $query = "SELECT uid FROM driver_trips WHERE driver_trip_id = '$tripid'";
            $results= mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($results);
            $driverID = $row['uid'];
            $tripStatus =0;

            $sql = "UPDATE driver_trip_count SET trip_started = '$tripStatus' WHERE driver_id='$driverID'";
            mysqli_query($con,$sql);
            $_SESSION['isTripStarted'] = $tripStatus;

            $_SESSION['status'] = "tripEnded";
            header("Location: ../Views/Driver/dashboard.php");
            exit();
        }else{
            $_SESSION['status'] = "sqlError";
            header("Location: ../Views/Driver/dashboard.php");
            exit();
        }
    }
}
else{
    echo 'error';
}