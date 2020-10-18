<?php
session_start();
include_once '../../Includes/dbconnect.php';

if (!isset($_SESSION['Userid']) && empty($_SESSION['Userid']) || $_SESSION['role'] != 1) {
    header('Location: ../../index.php');
    exit();
}
$uid = $_SESSION['Userid'];

//get trip details
$query = "SELECT * FROM driver_trip_report WHERE uid='$uid'";
$resultSet = mysqli_query($con,$query);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css files -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/fontawesome-4.7/css/font-awesome.css">
    <link rel="stylesheet" href="../../node_modules/jquery-form-validator/form-validator/theme-default.min.css">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.all.min.css">
    <link rel="stylesheet" href="../../Css/styles.css">
    <script type="text/javascript" src="../../Js/instascan.min.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="../../Images/Logo.jpg" width="100" height="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item navbarsTop">
                    <a class="nav-link " href="./dashboard.php">DASHBOARD</a>
                </li>
                <li class="nav-item navbarsTop active">
                    <a class="nav-link" href="./trips.php">TRIPS</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="navBarBottom">
        <div class="row navBottomRow">
            <div class="col">
                <p><span class="userName">Hello <?php echo $_SESSION['currentUName'] ?>. </span>Welcome here.</p>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="backgroundStripe"></div>
    <div class="backgroundStripeBottom">
        <div>
            <div class="row bodyRowReports">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-table">
                            <div class="card-header">
                                <h6 class="card-title">Reports</h6>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>TripID</th>
                                            <th>Trip Date</th>
                                            <th>Trip Duration</th>
                                            <th>Passenger Count</th>
                                            <th>Earnings (LKR)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($resultSet)) {
                                            $tripID = $row['driver_trip_id'];
                                            $date = $row['trip_date'];
                                            $duration = $row['duration'];
                                            $count = $row['passenger_count'];
                                            $earnings = $row['earnings'];
                                        ?>
                                            <tr>
                                                <td><?php echo  $tripID ?></td>
                                                <td><?php echo $date ?></td>
                                                <td><?php echo $duration ?></td>
                                                <td> <?php echo $count ?></td>
                                                <td><?php echo $earnings ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="row footerRow">
            <div class="col">
                <p> &copy; 2020<span class="companyName"> SLTB. </span>All Rights Reserved</p>
            </div>
            <div class="col footerLinksColumn">
                <div class="footerLinks">
                    <a href="#">
                        <p class="aboutTag"><span>ABOUT</span></p>
                    </a>
                    <a href="#">
                        <p><span>TERMS AND CONDITIONS</span></p>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Js files -->
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/jquery-form-validator/form-validator/jquery.form-validator.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../../Js/js.js"></script>

    <?php
    include '../errors.php';
    ?>
</body>

</html>