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
    <title>Register</title>
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
                            <form class="LoginForm" action="../Includes/driverregister.inc.php" method="POST">
                                <div class="row">
                                    <div class="col imageColumn">
                                        <img src="../Images/Logo.jpg" class="companyLogoLogReg" />
                                        <p class="imageTopic">Citizen's Portal</p>
                                    </div>
                                </div>
                                <div class="container">
                                    <p class="welcomePara">Welcome! Please complete following steps to register as a Driver.</p>
                                    <div class="form-group form-groupmt">
                                        <input type="text" placeholder="Name" name="driverName" class="loginRegisterFormControl" data-validation="required" data-validation-error-msg="Name Field cannot be Empty" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" name="mail" class="loginRegisterFormControl" data-validation="required email" data-validation-error-msg="Invalid Email" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Bus Type" name="busType" class="loginRegisterFormControl" data-validation="required" data-validation-error-msg="Bus Type Field cannot be Empty" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Bus Registration Number" name="regNum" class="loginRegisterFormControl" data-validation="required" data-validation-error-msg="Registration Field cannot be Empty" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Bus Start Location" name="startLocation" class="loginRegisterFormControl" data-validation="required" data-validation-error-msg="Start Location Field cannot be Empty" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Bus End Location" name="endLocation" class="loginRegisterFormControl" data-validation="required" data-validation-error-msg="End Location Field cannot be Empty" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password" name="pass" class="loginRegisterFormControl" data-validation="required length" data-validation-length="min4" data-validation-error-msg="Password is Weak" />
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary loginRegisterBtn" name="RegisterDriver">Register</button>
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