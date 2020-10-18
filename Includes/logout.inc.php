<?php
    session_start();
    if($_SESSION['role'] == 1){
        if($_SESSION['isTripStarted']==1){
            require_once 'dbconnect.php';
            $uid = $_SESSION['Userid'];
            $tripID = $_SESSION['currenttripID'];
            $status = 0;
            $endTime = Date('H:i:s');
            $sql = "UPDATE driver_trip_count SET trip_started ='$status' WHERE driver_id = '$uid'";
            mysqli_query($con,$sql);

            $query = "UPDATE driver_trips SET trip_end_time='$endTime' WHERE driver_trip_id='$tripID'";
            mysqli_query($con, $query);
        }
    }


    session_unset();
    session_destroy();


    header("Location: ../index.php");
