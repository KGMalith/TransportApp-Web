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