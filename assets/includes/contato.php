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

    $mail->setFrom('gustavooliveira506@gmail.com', 'Primeiro último');
    
    $addresses = [
        'Gustavo' => 'gustavooliveira506@gmail.com',
    ];
    
    if (array_key_exists('form_service', $_POST) && array_key_exists($_POST['form_service'], $addresses)) {
        $mail->addAddress($addresses[$_POST['form_service']]);
    } else {
        $mail->addAddress('gustavooliveira506@gmail.com');
    }
    if ($mail->addReplyTo($_POST['form_email'], $_POST['form_name'])) {
        $mail->Subject = 'PHPMailer contact form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
        Email: {$_POST['form_email']}
        Name: {$_POST['form_name']}
        Telephone: {$_POST['form_name']}
        Message: {$_POST['form_message']}
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

<div class="section-contacts tc" id="contacts">
    <hr class="divisor_class hr_footer">
    <div class="container">
        <div class="row">
            <div id="contato" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>CONTATO</h3>
                <ul class="circles circles--red">
                    <li>
                        <span></span>
                    </li>
                    <li>
                        <span></span>
                    </li>
                    <li>
                        <span></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <ul class="section-contacts-nav">
                    <li class="section-contacts-item">
                        <span class="icon_contato icon-whats section-contacts-image"></span>
                        <div class="section-contacts-info">
                            <span class="section-contacts-text">Telefone:</span>
                            <a href="#" class="section-contacts-link">+55 (11) 9 7538 - 6211</a>
                            <a href="#" class="section-contacts-link">+55 (11) 2312 - 7779 </a>
                        </div>
                    </li>
                    <li class="section-contacts-item">
                    <span class="icon_contato icon-location section-contacts-image"></span>
                        <div class="section-contacts-info">
                            <span class="section-contacts-text">Localização</span>
                            <a href="#" class="section-contacts-link">Rua José Malozze, 77 - Vila Mogilar</a>
                            <a href="#" class="section-contacts-link">Mogi das Cruzes - SP</a>
                        </div>
                    </li>
                    <li class="section-contacts-item">
                        <span class="icon_contato icon-email section-contacts-image"></span>
                        <div class="section-contacts-info">
                            <span class="section-contacts-text">Email</span>
                            <a href="#" class="section-contacts-link">vinicius@transmitadigital.com.br</a>
                            <a href="#" class="section-contacts-link">contato@transmitadigital.com.br</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="section-contacts-form">
                    <form method="POST" id="contactform" name="contactform">
                        <div class="section-contacts-form-row">
                            <div class="section-contacts-form-group mb-space">
                                <input type="text" class="section-contacts-form-field  form-control" id="form_name" name="form_name" placeholder="Nome">
                            </div>
                            <div class="section-contacts-form-group mb-space">
                                <input type="text" class="section-contacts-form-field form-control" id="form_email" name="form_email" placeholder="Email">
                            </div>
                        </div>
                        <div class="section-contacts-form-row">
                            <div class="section-contacts-form-group mb-space">
                                <input type="text" class="section-contacts-form-field  form-control" id="form_telephone" name="form_telephone" placeholder="Telefone">
                            </div>
                            <div class="section-contacts-form-group mb-space">
                                <select type="text" class="section-contacts-form-field  form-control" id="form_service" name="form_service" placeholder="Serviços">
                                    <option value="sales">Design Gráfico</option>
                                    <option value="support" selected>Site</option>
                                    <option value="accounts">Redes sociais</option>
                                </select>
                            </div>
                        </div>
                        <div class="section-contacts-form-row">
                            <div class="section-contacts-form-group mb-space">
                                <textarea class="section-contacts-form-field section-contacts-form-textarea  form-control" id="form_message" name="form_message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="result-success"></div>
                        <div class="result-error"></div>
                        <button type="submit" class="btn btn-lg btn-r">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>