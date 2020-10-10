<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css files -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/fontawesome-4.7/css/font-awesome.css">
    <link rel="stylesheet" href="../node_modules/jquery-form-validator/form-validator/theme-default.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.all.min.css">
    <link rel="stylesheet" href="../Css/styles.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img src="../Images/Bus.png" class="busImage" />
            </div>
            <div class="col-sm-6 offset-sm-1">
                <div class="container formContainer">
                    <div class="card">
                        <div class="col-sm-10 offset-sm-1">
                            <form class="LoginForm" action="../Includes/register.inc.php" method="POST" id="registerCustomerForm">
                                <div class="row">
                                    <div class="col imageColumn">
                                        <img src="../Images/Logo.jpg" class="companyLogoLogReg" />
                                        <p class="imageTopic">Citizen's Portal</p>
                                    </div>
                                </div>
                                <div class="container">
                                    <p class="welcomePara">Welcome! Please complete following steps to apply smart card.</p>
                                    <div class="form-group form-groupmt">
                                        <input type="text" name="cusName" placeholder="CustomerName" class="loginRegisterFormControl" data-validation="required" data-validation-error-msg="Name Field cannot be Empty" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="mail" placeholder="Email" class="loginRegisterFormControl" data-validation="required email" data-validation-error-msg="Invalid Email" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mNumber" placeholder="Mobile Number" class="loginRegisterFormControl" data-validation="number length required" data-validation-length="10-10" data-validation-error-msg="The Mobile Number Must Be 10 Digits" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" placeholder="Password" class="loginRegisterFormControl" data-validation="required length" data-validation-length="min4" data-validation-error-msg="Password is Weak" />
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary loginRegisterBtn" name="Register">Register</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col loginRegisterLink">
                                            <a href="../index.php" class="linkText">
                                                <p>Already Have An Account?</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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