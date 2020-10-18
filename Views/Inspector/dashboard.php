<?php
session_start();
include_once '../../Includes/dbconnect.php';
include '../../Includes/getScannedUser.php';
if (!isset($_SESSION['Userid']) && empty($_SESSION['Userid']) || $_SESSION['role'] != 2) {
    header('Location: ../../index.php');
    exit();
}
$uid = $_SESSION['Userid'];

//Get User Details
$query = "SELECT name,email,working_city from user_details WHERE uid  = '$uid'";
$resultSet = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($resultSet);
$userName = $row['name'];
$userEmail = $row['email'];
$userCity = $row['working_city'];

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
                    <a class="nav-link" href="./reports.php">REPORTS</a>
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
                        <div class="row">
                            <div class="col cardNumberColumn">
                                <p class="card-text customerNumber"><?php echo $userCity ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col cardBtnColumn">
                                <a href="../../Includes/logout.inc.php"><button type="button" class="btn btn-primary logoutBtn">LOG OUT</button></a>
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
                            <div class="col-md-12 text-center mt-3"><button type="button" class="btn btn-primary" onclick="startCam()">Turn On Camera</button></div>
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
                </div>
            </div>
            <?php
            if (isset($useridentityToken)) {
                $_SESSION['status'] = 'userLoaded'
            ?>
                <div class="row bodyRow">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">
                                    User Details
                                </h6>
                            </div>
                            <div class="card-body">
                                <form action="../../Includes/reportpassenger.php" method="POST">
                                    <div class="form-group col-md-6">
                                        <label>Customer ID<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="customerID" value="<?php echo $useridentityToken ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row ml-1">
                                        <div class="form-group ml-2 col-md-6">
                                            <label>Customer Name<span class="requiredIcon" style="color:red;">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="cname" value="<?php echo $cusname; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group offset-md-2">
                                            <label>Customer Account Status</label>
                                            <div class="input-group">
                                                <div>
                                                    <?php
                                                    if ($accountStatus == 0) {
                                                        echo '<span class="badge badge-pill badge-success">Active Account</span>';
                                                    } else if ($accountStatus == 1) {
                                                        echo '<span class="badge badge-pill badge-warning">Hold Account</span>';
                                                    } else if ($accountStatus == 2) {
                                                        echo '<span class="badge badge-pill badge-danger">Banned Account</span>';
                                                    } else if ($accountStatus == 3) {
                                                        echo '<span class="badge badge-pill badge-dark">Deactivated Account</span>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row ml-2">
                                        <div class="form-group col-md-4">
                                            <label>Customer Trip Count<span class="requiredIcon" style="color:red;">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-bus"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="mnumber" value="<?php echo $tripCount; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ml-3">
                                        <label>Report Reason<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-flag"></i></span>
                                            </div>
                                            <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Please Fill Report Reason" name="reportReason">

                                        </div>
                                        <input type="hidden" name="uderid" value="<?php echo $usrid ?>">
                                        <input type="hidden" name="inspectoruid" value="<?php echo $uid ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="reportPassenger" class="btn btn-danger">Report User</button>
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