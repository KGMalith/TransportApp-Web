<?php
if(isset($_GET['rid'])){
    include_once 'dbconnect.php';
    session_start();
    $reportID = $_GET['rid'];

    $sql = "SELECT actionFromAdmin FROM user_reports WHERE report_id='$reportID'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $action = $row['actionFromAdmin'];

    if($action == 1){
        $_SESSION['status'] = "admintookAction";
        header('Location: ../Views/Inspector/reports.php');
        exit();

    }else{
        $query = "DELETE FROM user_reports WHERE report_id = '$reportID'";
        $result = mysqli_query($con,$query);

        if($result){
            $_SESSION['status'] = "reportDelete";
            header('Location: ../Views/Inspector/reports.php');
            exit();
        }else{
            $_SESSION['status'] = "sqlError";
            header('Location: ../Views/Inspector/reports.php');
            exit();
        }
    }
}