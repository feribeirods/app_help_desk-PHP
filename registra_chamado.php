<?php

   session_start();

    
    //MONTAGEM DO TEXTO
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);


    if(strlen($titulo) <= 0 || strlen($descricao) <= 0) {
    header('Location: abrir_chamado.php');

    } else {

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

    
    //CRIAÇÃO DO ARQUIVO E ESCRITA DO TEXTO
    $arquivo = fopen('../../app_help_desk/arquivo.txt', 'a');

    fwrite($arquivo, $texto);

    fclose($arquivo);
    
    header('Location: abrir_chamado.php');

    }

?>