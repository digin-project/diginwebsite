<?php

if ( ! $_POST || strlen($_POST['hammertime']) > 0) {
    echo 'Oups : quelque chose d\'horrible a empêcher le mail d\'être envoyé';
    exit;
}

$form_data = array(
    'fullname' => $_POST['first-name'] . ' ' . $_POST['last-name'],
    'email' => $_POST['email'],
    'message' => htmlspecialchars($_POST['message'])
);

require 'config.php';
require '../libs/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

if ($smtp['enabled']) {
    $mail->isSMTP();
    $mail->Host = $smtp['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $smtp['username'];
    $mail->Password = $smtp['password'];
    $mail->Port = $smtp['port'];

    if ($smtp['tls']) {
        $mail->SMTPSecure = "tls";
    }
} else {
    $mail->isHTML(true);
}

$mail->From = $form_data['email'];
$mail->FromName = $me['fullname'];

$mail->addAddress($me['email']);

$template = file_get_contents('mail.template.html');
$parsed_template = sprintf($template, $form_data['message'], $form_data['fullname'], $form_data['email'], $form_data['email']);

$mail->Subject = 'Message depuis le site de Digin';
$mail->Body = $parsed_template;

$mail->AltBody = $form_data['fullname'] . " (" . $form_data['email'] . ") a utilisé le formulaire de contact du site de Digin pour envoyer ce message : " . $form_data['message'];

if ( ! $mail->send())
{
    echo $mail->ErrorInfo;
}
else
{
    echo 'success';
}