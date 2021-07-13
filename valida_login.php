<?php

    session_start();

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');
    
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1, 'nome' => 'Admin'),
        array('id' => 2,'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 2, 'nome' => 'User'),
        array('id' => 3,'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2, 'nome' => 'José'),
        array('id' => 4,'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2, 'nome' => 'Maria'),
    );

   /* echo '<pre>';
    print_r($usuarios_app);
    echo '</pre>';*/

    foreach($usuarios_app as $user) {
        
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;    
            $usuario_id = $user['id'];  
            $usuario_perfil_id = $user['perfil_id'];  
            $usuario_nome = $user['nome'];    
        }
    } 

        if ($usuario_autenticado) {
            echo 'Usuário Autenticado';
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['id'] = $usuario_id;
            $_SESSION['perfil_id'] = $usuario_perfil_id;
            $_SESSION['nome'] = $usuario_nome;
            header('Location: home.php');
        } else {
            $_SESSION['autenticado'] = 'NÃO';
            header('Location: index.php?login=erro');
        }

        echo '<hr>';

       




?>