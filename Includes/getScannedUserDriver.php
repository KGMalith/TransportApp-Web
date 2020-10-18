<?php
if (isset($_POST['scanUser'])) {
    $userID = $_POST['userID'];
    if (empty($userID)) {
        $_SESSION['status'] = "noqrdata";
        header('Location: ./dashboard.php');
        exit();
    } else {
        $query = "SELECT user_identity_token FROM users WHERE user_identity_token='$userID'";
        $results = mysqli_query($con, $query);
        $resultsCount = mysqli_num_rows($results);


        if ($resultsCount > 0) {
            $sql = "SELECT * FROM driver_view_details WHERE user_identity_token = '$userID'";
            $results = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($results);
            $useridentityToken = $row['user_identity_token'];
            $cusname = $row['name'];
            $accountStatus = $row['account_status'];
            $accountBalance = $row['amount'];
            $usrid = $row['uid'];
        } else {
            $_SESSION['status'] = "invalidQR";
            header('Location: ./dashboard.php');
            exit();
        }
    }
}
