<?php
session_start();
include_once '../Includes/validateToken.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyResetToken($token);
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
                <h5 class="card-title">Email Sent!</h5>
                <p class="card-text">An email has been sent to your email address to with a link to reset your password.</p>
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