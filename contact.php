<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer/src/SMTP.php';

// require '.env';


// mail instance
$email = new PHPMailer(TRUE);

$message = $_REQUEST['message'];
$name = $_REQUEST['name'];
$html_message = '<html>
<head></head>
<body> 
<h1 style="color:blue"> This message is from: </h1> 
</body></html>'; 
$html_message_body = '<html>
<head></head>
<body> 
<h2 style="color:red"> The message they sent reads as: </h2> 
</body></html>';
$name_in_color = '<html>
<head></head>
<body> 
<h2 style="color:purple">' . $name . '</h2> 
</body></html>';
$message_in_color = '<html>
<head></head>
<body> 
<h2 style="color:orange">' . $message . '</h2> 
</body></html>';

try {
/* Tells PHPMailer to use SMTP. */
   $email->isSMTP();
   
   /* SMTP server address. */
   $email->Host = 'smtp.gmail.com';

   /* Use SMTP authentication. */
   $email->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $email->SMTPSecure = 'tls';
   
   /* SMTP authentication username. */
   $email->Username = 'unlockphpemail@gmail.com';
   
   /* SMTP authentication password. */
   $email->Password = 'iyzfwbvwwmbuggfe';
   
   /* Set the SMTP port. */
   $email->Port = 587;

    /* Set the mail sender. */
    $email->setFrom($_POST['email']);
 
    /* Add a recipient. */
    $email->addAddress('unlockphpemail@gmail.com', 'Emperor');
   $email->isHTML(TRUE);
    /* Set the subject. */
    $email->Subject = $_POST['subject'];
 
    /* Set the mail message body. */
    
    $email->Body = $html_message . ' ' . $name_in_color . ' ' . $html_message_body . ' ' . $message_in_color;
 
    /* Finally send the mail. */
    $email->send();

   echo "message sent";
    // SMTP SETTINGS
    
}

// app password iyzfwbvwwmbuggfe


 catch (Exception $e)
{
   /* PHPMailer exception. */
   echo "testing";
   echo $e->errorMessage();
}

'<div> testing the html </div>';