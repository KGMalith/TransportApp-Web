<?php
if(isset($_POST['generateQR'])){
    $userid = $_POST['useridtoken'];

    $path = '../../Images/QRCodes/';
    $file = $path.$userid.".png";

    QRcode::png($userid,$file,'L',10);

    $sql = "UPDATE users SET qr_generated = 1 WHERE user_identity_token='$userid'";
    mysqli_query($con,$sql);
}