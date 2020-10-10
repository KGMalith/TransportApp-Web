<?php

require_once ('../vendor/autoload.php');

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
    ->setUsername('riyasewanatestapp@gmail.com')
    ->setPassword('tWx#J4RG');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($userEmail,$userToken)
{
    global $mailer;
    $body =
    '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>
        </head>
        <body>
            <div class="wrapper">
                <p>
                    Thank You for Signing Up for website. Please click on the link below to verify your Email.
                    <a href="http://localhost:8080/transport/Views/email-verify.php?token='. $userToken .'">Verify Your Email Address</a>
                </p>
            </div>
        </body>
        </html>
    ';
    // Create a message
    $message = (new Swift_Message('Verify Your Email Address'))
        ->setFrom(['riyasewanatestapp@gmail.com' => 'Admin'])
        ->setTo($userEmail)
        ->setBody($body,'text/html');

    // Send the message
    $result = $mailer->send($message);
}

function sendResetPasswordEmail($userEmail, $userToken){
    global $mailer;

    $body =
    '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>
        </head>
        <body>
            <div class="wrapper">
                <p>Hello There,</p>
                <p>Click on the link below to reset Your Password.</p>
                <p>
                    <a href="http://localhost:8080/transport/Views/resetmailsent.php?token=' . $userToken . '">Reset Your Password</a>
                </p>
            </div>
        </body>
        </html>
    ';


    // Create a message
    $message = (new Swift_Message('Reset Your Password'))
        ->setFrom(['riyasewanatestapp@gmail.com' => 'Admin'])
        ->setTo([$userEmail])
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);
}