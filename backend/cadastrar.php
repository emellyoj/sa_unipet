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
    
        header("Location:/sa_unipet/src/pages/perfil_usuario.html");    
    }
    
?>
