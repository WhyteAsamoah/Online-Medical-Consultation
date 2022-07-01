<?php

require_once './vendor/autoload.php';

//create the Transport
$transport = (new Swift_SmtpTransport('smtp.mail.yahoo.com', 465, 'ssl'))
    ->setUsername('abduldoobia@yahoo.com')
    ->setPassword('qexcwvvhadtsggce');

    
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($email, $token){

    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>JUSTCARE</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
        <a href="http://localhost/online-doctor/verify_email.php?token=' . $token . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom(['abduldoobia@yahoo.com' => 'JustCare Health Center'])
        ->setTo($email)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }

}

?>