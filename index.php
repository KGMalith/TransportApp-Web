<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css files -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/fontawesome-4.7/css/font-awesome.css">
    <link rel="stylesheet" href="node_modules/jquery-form-validator/form-validator/theme-default.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.all.min.css">
    <link rel="stylesheet" href="Css/styles.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img src="Images/Bus.png" class="busImage" />
            </div>
            <div class="col-sm-6 offset-sm-1">
                <div class="container formContainer">
                    <div class="card">
                        <div class="col-sm-10 offset-sm-1">
                            <form class="LoginForm" action="Includes/login.inc.php" method="POST">
                                <div class="row">
                                    <div class="col imageColumn">
                                        <img src="Images/Logo.jpg" class="companyLogoLogReg" />
                                        <p class="imageTopic">Citizen's Portal</p>
                                    </div>
                                </div>
                                <div class="container">
                                    <p class="welcomePara">Welcome back! Please log in to your account</p>
                                    <div class="form-group form-groupmt" controlId="formLoginEmailName">
                                        <input type="email" placeholder="Email" name="email" class="loginRegisterFormControl" data-validation="required " data-validation-error-msg="Email Cannot be Empty" />
                                    </div>
                                    <div class="form-group" controlId="formLoginPassword">
                                        <input type="password" placeholder="Password" name="password" class="loginRegisterFormControl" data-validation="required " data-validation-error-msg="Password Cannot be Empty" />
                                    </div>
                                    <div class="row">
                                        <div class="col contentCheckBox">
                                            <div class="form-group" controlId="formBasicCheckbox">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
                                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col contentForgotPassword">
                                            <a href="Views/recoverpassword.php" class="linkText">
                                                <p>Forgot Password</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary loginRegisterBtn" name="signin">Login</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col loginRegisterLink">
                                            <a href="Views/registercustomer.php" class="linkText">
                                                <p>Apply for your smart card here</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a href="Views/registerdriver.php" class="linkText">
                                                <p>Are You Driver? Become member</p>
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
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/jquery-form-validator/form-validator/jquery.form-validator.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="Js/js.js"></script>

    <?php
    include 'Views/errors.php';
    ?>
</body>

</html>