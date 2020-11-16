<?php

use PHPMailer\PHPMailer\PHPMailer;

$msg = '';

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

    require '../vendor/autoload.php';


    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 80;

    $mail->setFrom('from@example.com', 'First Last');
    
    $addresses = [
        'sales' => 'sales@example.com',
        'support' => 'support@example.com',
        'accounts' => 'accounts@example.com',
    ];
    
    if (array_key_exists('dept', $_POST) && array_key_exists($_POST['dept'], $addresses)) {
        $mail->addAddress($addresses[$_POST['dept']]);
    } else {
        $mail->addAddress('support@example.com');
    }
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
        Email: {$_POST['email']}
        Name: {$_POST['name']}
        Message: {$_POST['message']}
        EOT;
        if (!$mail->send()) {
            $msg = 'Desculpe sua mensagem não foi enviada. Tente Novamente';
        } else {
            $msg = 'Mensagem Enviada. Agradecemos o contato';
        }
    } else {
        $msg = 'Email inválido. Tente Novamente';
    }
}
?>