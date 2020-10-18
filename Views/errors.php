<!-- validations -->


<!-- Empty Fields -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "emptyFields") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Empty Fields!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- SQL Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "sqlError") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'SQL Error!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Email taken Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "emailTaken") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email Already Taken!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Register Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "registerSuccess") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'You Registered to System Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Invalid Password -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "invalidPassword") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Invalid Password!'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Login Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "loginSuccess") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'You Login to System Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Invalid User -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "invalidUser") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Invalid User!'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Invalid Token -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "tokenError") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Invalid Token!'
        })
    </script>

<?php
    unset($_SESSION['status']);
    session_unset();
}
?>


<!-- Email Verification Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "emailVerified") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'You Verified Your Email Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- User Doesn't Exists -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "noUser") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "User Doesn't Exists!"
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Email Not Verified -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "notVerified") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Not a Verified Email. Please Verify Your Email First!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Email Sent -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "emailSent") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Password Reset Email Sent!'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Password Reset Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "passwordReset") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Password Reset Successful'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Camera Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "cameraNotFound") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Camera Not Found!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Invalid QR Code -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "invalidQR") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: 'Invalid QR Code!'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- QR Code Didn't Read -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "noqrdata") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "QR Code Does't Read Properly!"
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- User Loading Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "userLoaded") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'User Data Loaded Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- User Report Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "reported") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'User Reported Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>


<!-- Action Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "admintookAction") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Admin Already Taken Action!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Delete Report Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "reportDelete") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Delete Report Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- TopUp Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "topUpSuccess") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'You TopUp to System Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!--already in trip Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "alreadyStarted") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Already In a Trip!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>

<!-- Trip Started Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "tripStartedSuccess") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Trip Started Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>
<!--trip Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "tripNotStarted") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Trip not Stated!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>
<!-- Trip Ended Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "tripEnded") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Driver Trip Ended Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>
<!--Not Active Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "notActive") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Not a Valid Account!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>
<!--Not Active Error -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "noBalance") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'User Doesnt Have Sufficent Credit To Start Trip!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>
<!-- Trip Started Success -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "CustomerStartedTrip") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Customer Trip Started Successfully'
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>
<!--Already Started -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == "alreadyStarted") {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Customer Already Started Trip!',
        })
    </script>

<?php
    unset($_SESSION['status']);
}
?>