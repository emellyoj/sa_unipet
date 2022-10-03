<?php
include("conexao.php");

$entrada = $_POST["entrada"];
$set_senha = $_POST["senha"];

$comando = $pdo->prepare("SELECT id_usuario, senha_usuario, fk_tipousuario FROM usuario WHERE email_usuario = :entrada or username_usuario = :entrada");

$comando->bindValue(":entrada",$entrada);  

$comando->execute();

if ($comando->rowCount() == 1)
{
    $resultado = $comando->fetch();
    if($resultado['senha_usuario'] == MD5($set_senha)){
        header("location:/sa_unipet/src/pages/perfil_usuario.html");

        session_start();
        $_SESSION['id_usuario'] = $resultado['id_usuario'];
        $_SESSION['fk_tipousuario'] = $resultado['fk_tipousuario'];
        $_SESSION['loggedin'] = true;

    }
    else{
        echo("Email ou senha incorreto!");
    }
}
        else {
            echo("Email ou senha incorreto!");
        }

        unset($comando);
        unset($pdo);
?>