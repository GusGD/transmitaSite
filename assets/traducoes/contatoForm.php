<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('UTC'); 
if(count($_POST) < 1){
    $result = array(
        'type' => 'Desculpe',
        'text' => 'Seu e-mail não foi enviado!'
    );
    echo(json_encode($result));
    exit;
}

$form_data = array();

$mailHeaders = "MIME-Version: 1.0" .PHP_EOL; 
$mailHeaders .= "Content-Type: text/html; charset=utf-8" . PHP_EOL; 
$mailHeaders .= "From: go_gustavo@outlook.com" . PHP_EOL;
$mailHeaders .= "Reply-To: go_gustavo@outlook.com" .  PHP_EOL;
$mailHeaders .= "X-Mailer: PHP/" . phpversion();

$_p = '';
$_p .=  '<b>Message sent</b>: ' . date('Y-m-d H:i:s') . '<br/>';
foreach ($_POST as $key => $value) {
    $_key = isset($form_data[$key ]) ? $form_data[$key ] : $key ;
    $_p .=  '<b>' . $_key . '</b>: ' . $value . '<br/>';
}

$mailMessage = '<html><head></head><body>' .$_p  . '</body></html>';


$mailTo = 'go_gustavo@outlook.com'; 
$mailSubject = 'Mensagem de teste'; 
$result = '';

$sendMail = mail($mailTo, $mailSubject, $mailMessage, $mailHeaders);
if($sendMail !== false ) {
    $result = array(
        'type' => 'Enviado',
        'text' => 'Obrigado pelo seu email!'
    );
    echo (json_encode($result));
    exit;
} 
$result = array(
    'type' => 'Desculpe',
    'text' => 'Não foi possível enviar e-mail! Tente novamente.'
);
echo(json_encode($result));
exit;
?>