<?php
session_start();

if (!isset($_SESSION['token'])) {
    header('Location: recoverpassword.php');
    exit();
}else{
    $token = $_SESSION['token'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
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
                <h5 class="card-title">Reset Password</h5>
                <form action="../Includes/resetpassword.inc.php" method="POST">
                    <div class="form-group">
                        <input type="password" name="pass" id="pass1" placeholder="Password" class="loginRegisterFormControl" data-validation="required length" data-validation-length="min4" data-validation-error-msg="Password is Weak" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass2" placeholder="Confirm Password" class="loginRegisterFormControl" data-validation="required length" data-validation-length="min4" data-validation-error-msg="Password is Weak" />
                        <span id='message'></span>
                    </div>
                    <input type="hidden" name="token" class="loginRegisterFormControl" value="<?php echo $token; ?>" />
                    <button type="submit" name="resetPass" class="btn btn-dark">Recover your password </button>
                </form>
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