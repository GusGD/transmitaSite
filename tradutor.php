<?php
    session_start();

    if(!isset($_SESSION['idioma'])){
        $_SESSION['idioma'] = 'pt-br.php';
    }
    else if(isset($_GET['idioma'])){
        include './assets/traducoes/'.$_GET['idioma'];
    };

?>