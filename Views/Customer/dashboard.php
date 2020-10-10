<?php
session_start();

if(!isset($_SESSION['Userid']) && empty($_SESSION['Userid'])){
    header('Location: ../../index.php');
    exit();
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
    <title>Document</title>
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
                    <a class="nav-link " href="#">DASHBOARD</a>
                </li>
                <li class="nav-item navbarsTop">
                    <a class="nav-link" href="#">TRIPS</a>
                </li>
                <li class="nav-item navbarsTop">
                    <a class="nav-link" href="#">PAYMENTS</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <p class="amountTag">BALANCE | LKR<span class="amount">1200.00</span></p>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary topUpBtn">TOPUP YOUR ACCOUNT</button>
                </li>
            </ul>
        </div>

    </nav>
    <div class="navBarBottom">
        <div class="row navBottomRow">
            <div class="col">
                <p><span class="userName">Hello Saman. </span>Welcome here.</p>
            </div>
            <div class="col columnReport">
                <p class="reports">REPORTS : <span> 01.04.2019 to 30.04.2019</span></p>
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
                                <h5 class="card-title customerName">Emily Watson</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col cardEmailColumn">
                                <p class="card-text customerEmail">emily.w@gmail.com</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col cardNumberColumn">
                                <p class="card-text customerNumber">+94 0776358579</p>
                            </div>
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
                            <p class="card-text tripAmount">124</p>
                            <p class="card-text trips">TRIPS</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 offset-sm-1">
                    <div class="card userRecentTripsCard">
                        <div class="card-header recentTripCardHeader">
                            RECENT TRIPS
                        </div>
                        <div class="card-body">
                            <div class="row twoTripDetailsRow">
                                <div class="col oneTripDetailsColumn">
                                    <div class="row oneTripDetailRow">
                                        <div class="col-sm-2 colPaddingRmv">
                                            <p class="card-text tripTime">08:34AM</p>
                                            <p class="card-text tripDate">02 AUG 2020</p>
                                        </div>
                                        <div class="col driverDetailsColumn colPaddingRmv">
                                            <img src="../../Images/profile.png" class="recentTripsDriverImage roundedCircle" />
                                            <div>
                                                <p class="card-text driverDetails">P.G. Herath <span>(SP HA-2355)</span></p>
                                                <p class="card-text busRoute">HAMBANTHOTA - GALLE</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 colPaddingRmv">
                                            <p class="card-text tripCost">LKR<span>58.00</span></p>
                                            <p class="card-text tripCode">SL2020Yhh502</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col oneTripDetailsColumn">
                                    <div class="row oneTripDetailRow">
                                        <div class="col-sm-2 colPaddingRmv">
                                            <p class="card-text tripTime">08:34AM</p>
                                            <p class="card-text tripDate">02 AUG 2020</p>
                                        </div>
                                        <div class="col driverDetailsColumn colPaddingRmv">
                                            <img src="../../Images/profile.png" class="recentTripsDriverImage roundedCircle" />
                                            <div>
                                                <p class="card-text driverDetails">P.G. Herath <span>(SP HA-2355)</span></p>
                                                <p class="card-text busRoute">HAMBANTHOTA - GALLE</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 colPaddingRmv">
                                            <p class="card-text tripCost">LKR<span>58.00</span></p>
                                            <p class="card-text tripCode">SL2020Yhh502</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col viewMoreBtnColumn">
                                    <button type="button" class="btn btn-primary viewAllBtn">VIEW ALL</button>
                                </div>
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