<?php
session_start();
include_once '../Includes/validateToken.php';



if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verify</title>
    <!-- css files -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/fontawesome-4.7/css/font-awesome.css">
    <link rel="stylesheet" href="../node_modules/jquery-form-validator/form-validator/theme-default.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.all.min.css">
    <link rel="stylesheet" href="../Css/styles.css">
</head>

<body class="email-verify-body">
    <div class="row email-verify-row">
        <div class="card col-md-4 offset-md-4 email-verify-card">
            <div class="card-body text-center">
                <h5 class="card-title">Welcome , <?php echo ($_SESSION['name']);  ?></h5>
                <p class="card-text">You need to verify your Account.Sign in to your email address and click on the verification link we just emailed you at <strong><?php echo ($_SESSION['email']); ?></strong></p>
                <a href="../Includes/logout.inc.php" class="btn btn-dark">Logout</a>
            </div>
        </div>
    </div>

    <!-- Js files -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/jquery-form-validator/form-validator/jquery.form-validator.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../Js/js.js"></script>

    <?php
    include 'errors.php';
    ?>
</body>

</html>