<?php
session_start();
include_once '../../Includes/dbconnect.php';
include '../../Includes/getScannedUserDriver.php';
include '../../Includes/driverStartTrip.php';

if (!isset($_SESSION['Userid']) && empty($_SESSION['Userid']) || $_SESSION['role'] != 1) {
    header('Location: ../../index.php');
    exit();
}
$uid = $_SESSION['Userid'];

//Get User Details
$query = "SELECT name,email,bus_type,bus_reg_number,bus_start_location,bus_end_location from user_details WHERE uid  = '$uid'";
$resultSet = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($resultSet);
$userName = $row['name'];
$_SESSION['currentUName'] = $userName;
$userEmail = $row['email'];
$busType = $row['bus_type'];
$busRegNum = $row['bus_reg_number'];
$busStart = $row['bus_start_location'];
$busEnd = $row['bus_end_location'];

//Get Trip Count
$sql = "SELECT trip_count from driver_trip_count WHERE driver_id = '$uid'";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
$tripCount = $row['trip_count'];

if (isset($_SESSION['isTripStarted'])) {
    $isStarted = $_SESSION['isTripStarted'];
} else {
    $isStarted = 0;
}
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
                <li class="nav-item navbarsTop active">
                    <a class="nav-link " href="./dashboard.php">DASHBOARD</a>
                </li>
                <li class="nav-item navbarsTop">
                    <a class="nav-link" href="./trips.php">TRIPS</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="navBarBottom">
        <div class="row navBottomRow">
            <div class="col">
                <p><span class="userName">Hello <?php echo $userName ?>. </span>Welcome here.</p>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="backgroundStripe"></div>
    <div class="backgroundStripeBottom">
        <div>
            <div class="row bodyRow">
                <div class="col-sm-3 offset-sm-1 leftsideCardsColumn">
                    <div class="card userDetailsCard">
                        <div class="row">
                            <div class="col cardDetailsColumn">
                                <img src="../../Images/profile.png" class="profileImage roundedCircle" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col cardDetailsColumn">
                                <h5 class="card-title customerName"><?php echo $userName ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col cardEmailColumn">
                                <p class="card-text customerEmail"><?php echo $userEmail ?></p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col cardNumberColumn">
                                <p class="card-text customerNumber"><?php echo $busType ?></p>
                            </div>
                            <div class="col cardNumberColumn">
                                <p class="card-text customerNumber"><?php echo $busRegNum ?></p>
                            </div>
                        </div>
                        <div class="row locationRow">
                            <p class="card-text customerNumber offset-md-4 mt-2"><?php echo $busStart ?> - <?php echo $busEnd ?></p>
                        </div>
                        <div class="row">
                            <div class="col cardBtnColumn">
                                <a href="../../Includes/logout.inc.php"><button type="button" class="btn btn-primary logoutBtn">LOG OUT</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card statisticsCard">
                        <div class="row">
                            <div class="col graphColumn">
                                <img src="../../Images/lineChart.png" class="graphImage" />
                            </div>
                        </div>
                        <div class="tripsDiv">
                            <p class="card-text tripAmount"><?php echo $tripCount ?></p>
                            <p class="card-text trips">TRIPS</p>
                        </div>
                        <div>
                            <div class="row buttonRowJourney">
                                <form class="offset-md-3" action="" method="POST">
                                    <input type="hidden" name="driverid" value="<?php echo $uid ?>">
                                    <div class="form-group">
                                        <div class="form-label">Trip Amount</div>
                                        <input type="number" name="tripamount" class="form-control" value="100">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2 mr-1" name="startTrip">Start Trip</button>
                                    <a href="../../Includes/driverEndTrip.php?trpid=<?php if (isset($_SESSION['currenttripID'])) {echo $_SESSION['currenttripID'];} else {echo '0';} ?>"><button type="button" class="btn btn-danger mb-2">End Trip</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 offset-sm-1">
                    <div class="card userRecentTripsCard">
                        <div class="card-header recentTripCardHeader">
                            SCAN USERS
                        </div>
                        <div class="card-body">
                            <div class="card col-md-6 offset-md-3">
                                <video id="preview" class="QRScannerCam"></video>
                            </div>
                            <div class="col-md-12 text-center mt-3"><button type="button" class="btn btn-primary" onclick="startCam()" <?php if ($isStarted == 0) { ?> disabled <?php } ?>>Turn On Camera</button></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-5 offset-md-7 mt-5 viewMoreBtnColumn">
                                        <form action="" method="POST">
                                            <input type="text" id="userIdText" name="userID" placeholder="User Code" class="form-control" readonly>
                                            <button type="submit" class="btn btn-primary viewAllBtn mt-3" name="scanUser">LOAD USER</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($useridentityToken)) {
                        $_SESSION['status'] = 'userLoaded'
                    ?>
                        <div class="row bodyRowDriver">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">
                                            User Details
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="../../Includes/startTripCustomers.php" method="POST">
                                            <div class="form-group">
                                                <label>Customer ID<span class="requiredIcon" style="color:red;">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="customerID" value="<?php echo $useridentityToken ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group ml-1">
                                                    <label>Customer Name<span class="requiredIcon" style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="cname" value="<?php echo $cusname; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group ml-1">
                                                    <label>Account Balance<span class="requiredIcon" style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-bus"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="accountBalance" value="<?php echo $accountBalance; ?>" readonly>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="accountStatus" value="<?php echo $accountStatus ?>">
                                                <input type="hidden" name="uderid" value="<?php echo $usrid ?>">
                                                <input type="hidden" name="currenttripID" value="<?php echo $_SESSION['currenttripID'] ?>">
                                            </div>
                                            <div class="col text-center">
                                                <button type="submit" name="addPassenger" class="btn btn-info">Add User</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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
    <script type="text/javascript">
        function startCam() {
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);

            });

            scanner.addListener('scan', function(c) {
                document.getElementById('userIdText').value = c;
                scanner.stop()
            });
        }
    </script>

    <?php
    include '../errors.php';
    ?>
</body>

</html>