<?php
require_once("module/model/koneksi/koneksi.php");
require 'assets/phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSendmail();
set_time_limit(120); // set the time limit to 120 seconds

$mail->setFrom('no-reply@megamarinepride.com','Testing Email');
$mail->addAddress("emhusni77@gmail.com");
$mail->Subject = "PTK Closed";
$message = file_get_contents("mail_template.html");
$message = str_replace('%username%', "Username", $message);
$message = str_replace('%ptk_name%', "PTK Tes", $message);
$message = str_replace('%link%', "", $message);
$mail->MsgHTML($message);


if($mail->send())
{
    echo "Message has been";
    ?><script>document.location.href='ptk';</script><?php
}
else
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>