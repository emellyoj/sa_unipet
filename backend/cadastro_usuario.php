<?php

    include("conexao.php");

    $nomecompleto = $_POST["nomecompleto"];
    $nomeusuario = $_POST["nomeusuario"];
    $email = $_POST["email"];
    $senha = MD5($_POST["senha"]);
    $confirmarsenha = MD5($_POST["confirmarsenha"]);

    if ($senha==$confirmarsenha) {
        $comando = $pdo -> prepare("INSERT INTO usuario (nomecompleto_usuario, username_usuario, email_usuario, senha_usuario) VALUES(:nomecompleto,:username,:email,:senha)");
        $comando->bindValue(":nomecompleto",$nomecompleto);                                     
        $comando->bindValue(":username",$nomeusuario); 
        $comando->bindValue(":email",$email);                                     
        $comando->bindValue(":senha",$senha);    
        $comando->execute();                               
    
        $id_usuario = $pdo -> lastInsertId();

        session_start();
        $_SESSION['id_usuario'] = $resultado['id_usuario'];
        $_SESSION['fk_tipousuario'] = 1;
        $_SESSION['loggedin'] = true;

        header("Location:/sa_unipet/src/pages/perfil_usuario.php");    
    }
    
?>
