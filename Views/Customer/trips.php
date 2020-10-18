<?php
session_start();
include_once '../../Includes/dbconnect.php';
if (!isset($_SESSION['Userid']) && empty($_SESSION['Userid']) || $_SESSION['role'] != 0) {
    header('Location: ../../index.php');
    exit();
}
$uid = $_SESSION['Userid'];

//select balance
$balanceQuery = "SELECT * FROM account_balance WHERE uid='$uid'";
$results = mysqli_query($con, $balanceQuery);
$row = mysqli_fetch_assoc($results);
$_SESSION['accountbalace'] = $row['amount'];

//select trip count
$tripCount = "SELECT * FROM trip_count WHERE uid='$uid'";
$resultset = mysqli_query($con, $tripCount);
$row = mysqli_fetch_assoc($resultset);
$count = $row['count'];

//get trips

$a = 0;
$sql = "SELECT * FROM customer_trips WHERE uid='$uid'";
$results = mysqli_query($con, $sql);


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
    <title>Trips</title>
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
                    <a class="nav-link " href="dashboard.php">DASHBOARD</a>
                </li>
                <li class="nav-item navbarsTop active">
                    <a class="nav-link" href="trips.php">TRIPS</a>
                </li>
                <li class="nav-item navbarsTop">
                    <a class="nav-link" href="payments.php">PAYMENTS</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <p class="amountTag">BALANCE | LKR<span class="amount"><?php echo $_SESSION['accountbalace'] ?></span></p>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary topUpBtn" data-toggle="modal" data-target="#exampleModal">TOPUP YOUR ACCOUNT</button>
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
            <div class="row bodyRow">
                <div class="col-sm-2 offset-sm-1 leftsideCardsColumn">
                    
                    <div class="card statisticsCard">
                        <div class="row">
                            <div class="col graphColumn">
                                <img src="../../Images/lineChart.png" class="graphImage" />
                            </div>
                        </div>
                        <div class="tripsDiv">
                            <p class="card-text tripAmount"><?php echo $count ?></p>
                            <p class="card-text trips">TRIPS</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 offset-sm-1">
                    <div class="card userRecentTripsCard">
                        <div class="card-header recentTripCardHeader">
                            RECENT TRIPS
                        </div>
                        <div class="card-body">
                            <?php
                            while ($row = mysqli_fetch_assoc($results)) {
                                $startTime = $row['trip_start_time'];
                                $date = $row['trip_date'];
                                $driverName = $row['name'];
                                $busRegNo = $row['bus_reg_number'];
                                $startLocation = $row['bus_start_location'];
                                $endLocation = $row['bus_end_location'];
                                $amount = $row['trip_amount'];
                                $tripID = $row['trip_auto_generate_id'];

                            ?>
                                <div class="row twoTripDetailsRow">
                                    <div class="col oneTripDetailsColumn">
                                        <div class="row oneTripDetailRow">
                                            <div class="col-sm-2 colPaddingRmv">
                                                <p class="card-text tripTime"><?php echo $startTime ?></p>
                                                <p class="card-text tripDate"><?php echo $date ?></p>
                                            </div>
                                            <div class="col driverDetailsColumn colPaddingRmv">
                                                <img src="../../Images/profile.png" class="recentTripsDriverImage roundedCircle" />
                                                <div>
                                                    <p class="card-text driverDetails"><?php echo $driverName ?> <span><?php echo $busRegNo ?></span></p>
                                                    <p class="card-text busRoute"><?php echo $startLocation ?> - <?php echo $endLocation ?></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 colPaddingRmv">
                                                <p class="card-text tripCost">LKR<span><?php echo $amount ?></span></p>
                                                <p class="card-text tripCode"><?php echo $tripID ?></p>
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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form2" action="../../Includes/topupaccount.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="container">
                                    <h4 class="topupHeader">TOP UP YOUR ACCOUNT</h3>

                                        <div class="form-group form-groupmt" controlId="formLoginEmailName">
                                            <div class="form-label label-text">Amount (LKR)</div>
                                            <input type="number" name="topupAmount" placeholder="00.00" name="amount" class="loginRegisterFormControl" data-validation="required " data-validation-error-msg="Amount Cannot be Empty" />
                                        </div>
                                        <div class="form-group form-groupmt" controlId="formLoginEmailName">
                                            <div class="form-label label-text">Card Number</div>
                                            <input type="number" name="cardNumber" placeholder="XXXX - XXXX - XXXX - XXXX" name="cardNumber" class="loginRegisterFormControl" data-validation="required " data-validation-error-msg="Card Number Cannot be Empty" />
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-5 form-groupmt" controlId="formLoginEmailName">
                                                <div class="form-label label-text">Expiry</div>
                                                <input type="text" placeholder="MM/YY" name="expiredate" class="loginRegisterFormControl" data-validation="required " data-validation-error-msg="Expire Cannot be Empty" />
                                            </div>
                                            <div class="form-group col-md-5 offset-md-2 form-groupmt" controlId="formLoginEmailName">
                                                <div class="form-label label-text">CVC</div>
                                                <input type="number" placeholder="XXX" name="cvcNumber" class="loginRegisterFormControl" data-validation="required" data-validation-error-msg="CVC Cannot be Empty" />
                                                <input type="hidden" name="userid" value="<?php echo $uid ?>">
                                            </div>
                                        </div>

                                        <div class="form-row cardLogos">
                                            <div>
                                                <img src="../../Images/master.png" class="card-logo" alt="masterCard">
                                            </div>
                                            <div>
                                                <img src="../../Images/visa.png" alt="visaCard">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="imagecolumn">
                                        <div class="topupBusImage">
                                            <img src="../../Images/Bus.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="buttonColumn">
                                            <div class="col-md-12 text-right buttonSet">
                                                <button type="button" class="btn btn-primary paymentCancel mr-3" data-dismiss="modal">CANCEL</button>
                                                <button type="submit" class="btn btn-primary paymentContinue" name="pay">CONTINUE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
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

    <script>
        $('#exampleModal').on('hidden.bs.modal', function(e) {
            $(this).find('#form2')[0].reset();
        });
    </script>
</body>

</html>